<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\PostResource;
use App\Http\Resources\CommentResource;
use Exception;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function show($id)
    {
        return new UserResource(User::find($id));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'], //need to pass password_confirmation also in request
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        $token = $user->createToken('app-token')->plainTextToken;

        $user->token = $token;
        $response = ['data' => new UserResource($user)];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['errors' => 'The provided credentials are incorrect.'], 404);
        }

        $token = $user->createToken('app-token')->plainTextToken;

        $user->token = $token;
        $response = ['data' => new UserResource($user)];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $response = ['data' => 'Logout successful.'];
        return response()->json($response, 201);
    }

    /*
    /* Consumer of this API will request for password reset link by providing email id registered.
    /* This reset link will be sent to the provided email id, if it exists.
    /* After clicking the password reset link in the email, user is redirected to web interface.
    /* And there user is able to reset the password using Laravel's default auth views.
    */
    public function forgotPassword(Request $request)
    {
        $rules = ['email' => "required|email",];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            try {
                $mail = Password::sendResetLink($request->only('email'));
                switch ($mail) {
                    case Password::RESET_LINK_SENT:
                        return response()->json(['errors' => 'Reset password link sent on your email id.'], 201);
                    case Password::INVALID_USER:
                        return response()->json(['errors' => 'We can\'t find a user with that email address.'], 404);
                }
            } catch (\Swift_TransportException $ex) {
                return response()->json(['errors' => $ex->getMessage(), 500]);
            } catch (Exception $ex) {
                return response()->json(['errors' => $ex->getMessage(), 500]);
            }
        }
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'current_password' => ['required', 'min:6'],
            'password' => ['required', 'min:6', 'confirmed'], //need to pass password_confirmation also in request
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Hash::check($request->get('current_password'), $request->user()->password)) {
            return response()->json(['errors' => 'The provided password does not match your current password.'], 404);
        }

        $request->user()->forceFill([
            'password' => Hash::make($request->get('password')),
        ])->save();

        return response(['data' => 'Password set successfully.'], 201);
    }

    public function posts($id)
    {
        $author = User::find($id);
        $posts = $author->posts()->with('category', 'author', 'tags', 'images', 'videos', 'comments')->paginate();
        return PostResource::collection($posts);
    }

    public function comments($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->with('post')->paginate();
        return CommentResource::collection($comments);
    }
}

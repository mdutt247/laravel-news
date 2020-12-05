<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post as PostModel;
use Livewire\Component;

class Post extends Component
{

    public $post;

    public function mount($id)
    {
        $this->post = PostModel::with(['author', 'comments', 'category', 'images', 'videos', 'tags'])->find($id);
    }

    public function render()
    {
        return view('livewire.posts.post');
    }
}

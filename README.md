# Laravel News API with Admin Panel
Laravel 8 Admin Panel with API using Jetstream, Livewire, Sanctum, and Tailwind.

1. `git clone https://github.com/mdutt247/laravel-news.git`
2. `cd laravel-news`
3. `composer install`
4. Rename or copy `.env.example` file to `.env`
5. `php artisan key:generate`
6. Set your database credentials in `.env` file
7. `php artisan migrate:fresh --seed`
8. `npm install`
9. `npm run dev`
10. `php artisan serve`
11. Visit `localhost:8000/login` in your browser
12. Choose one `email` id from `users` table. Password is `password`.

### Screenshots

Response from API to be consumed by mobile apps etc.
![api response](https://miro.medium.com/max/3000/1*yttnGhlogAK_ZtY4sBUqMQ.png "API Response") 

Admin Dashboard - Category Managment Page
![category managment page](https://miro.medium.com/max/875/1*stzLGcvrR15TmokZZIrsRQ.png "Category Managment Page")

Admin Dashboard - Create Category
![create category](https://miro.medium.com/max/875/1*dOZ1DSehN-5SYbv9_aSh_Q.png "Create Category")

Admin Dashboard - Edit Category
![edit category](https://miro.medium.com/max/875/1*iWv3ujBXhOpIJV-NiOA-gg.png "Edit Category")

Admin Dashboard - Post Managment Page
![post managment page](https://miro.medium.com/max/678/1*4pUX8N43eYjdmenGyFJ3nA.png "Post Management Page")

Admin Dashboard - Create Post
![create post](https://miro.medium.com/max/875/1*IDLWBhGNB3KHEiYi6N1czA.png "Create Post")

Admin Dashboard - Edit Post
![edit post](https://miro.medium.com/max/875/1*5SBQT9TRSL140saVh1Hl7Q.png "Edit Post")

### Code explanation


**All tutorial links**
* [Visit mditech.net](https://mditech.net/laravel-tutorial/)

*Part 1:* **Create Migration, Model, and Factory to start with the project**
* [Read on medium.com](https://madhavendra-dutt.medium.com/how-to-seed-test-data-into-a-database-in-laravel-ec1b7defe552)

*Part 2:* **Establish Relationships**
* [Read on medium.com](https://madhavendra-dutt.medium.com/database-relationship-6780f4eab72a)

*Part 3:* **API Resources, API Controllers, and API Routes**
* [Read on medium.com](https://madhavendra-dutt.medium.com/creating-and-consuming-restful-api-in-laravel-7dc116430b3)

*Part 4:* **Front End for Admin Dashboard on Web inteface**
* [Read on medium.com](https://madhavendra-dutt.medium.com/creating-the-front-end-in-laravel-using-jetstream-livewire-72d140c6c946)

Do check [Laravel Documentation](https://laravel.com/docs/8.x) if you have any doubt.

Twitter: [kotagin](https://twitter.com/kotagin)
E-mail: [m.dutt@mditech.net](mailto:m.dutt@mditech.net)

# How To Run Laravel Project

1. Clone this repository to your local
2. Find `.env.example` file int the root folder and then copy the entire contents of the file
3. Create a new file and name it `.env` in the root folder
4. Paste the file from `.env.example` to `.env`
5. Install `xampp` and `composer`
6. Turn on your `xampp`
7. Go to `phpmyadmin` and create a new database named `todolist`
8. In the project directory open terminal or you can use VS Code terminal
    1. run `composer install`
    2. run `php artisan migrate`
    3. run `php artisan key:generate`
    4. lastly run `php artisan serve`
9. Now you can access the web app through `http://127.0.0.1:8000`
 

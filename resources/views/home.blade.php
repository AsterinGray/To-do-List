<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>
    <section class="container min-vh-100 d-flex align-items-center justify-content-center flex-column">
        <h1>Welcome to ToDoList!</h1>
        <p>This an app for you to create your to-do list for your productivity and better management for your task and jobs.</p>
        <div>
            <button type="button" class="btn btn-primary"><a href="{{ url("/register") }}" class="text-white">Register</a></button>
            <button type="button" class="btn btn-secondary"><a href="{{ url("/login") }}" class="text-white">Log In</a></button>
        </div>
    </section>
</body>
</html>
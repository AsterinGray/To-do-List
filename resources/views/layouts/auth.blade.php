<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To do List</title>
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">

    <link
      href="https://fonts.googleapis.com/css?family=Patua One"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Passero One"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Simonetta"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Quantico"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Sirin Stencil"
      rel="stylesheet"
    />
    <link
      href="http://fonts.cdnfonts.com/css/yaldevi-colombo"
      rel="stylesheet"
    />
    <link href="http://fonts.cdnfonts.com/css/yinmar" rel="stylesheet" />
  </head>
  <body>
    <section class="login">
      <div class="kiri">
        <h2>Glad to see you!</h2>
        <div>
          <p>.... is much better when you have an account.</p>
          <p>Get yourself one.</p>
        </div>
        <img src="{{asset('img/Welcome to do list.png')}}" alt="" />
      </div>
      <div class="kanan">
        <header class="header">
            <p id="logo"></p>
            <div class="header-right">
                @yield('header')
            </div>
        </header>
        @yield('main')
      </div>
    </section>
  </body>
</html>

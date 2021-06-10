<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>To Do List</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    <div class="header">
        <div class="logo">
            <div class="navigation-item navigation-link" style="font-size: 2rem">
                To-do List
            </div>
        </div>
        <div class="navigation-bar">        
            <div class="navigation-item">
                <div id="notification">
                    <div id="notif-icon">
                        <img class="bell-icon" src="{{asset('img/notificationBell.png')}}" alt="" width="30px">
                    </div>
                    <div id="dropdown">
                        <div class="drop notif-title">
                            Notifications
                        </div>
                        @foreach($notifs as $notif)
                        @if ($notif->status == 'Todo')  
                        <div class="drop notif-detail">
                            <div class="text-message">
                                <label for=""> {{$notif->title}} </label>
                            </div>
                            <div class="time-message time-font">
                                <label for="">{{$notif->enddate}} </label>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <div class="navigation-item">
                       <label class="username-text" for="username"> {{ Auth::user()->name }} </label>
                    </div>
                    
                    <div class="navigation-item">
                        <a class="navigation-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> LOGOUT </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </div>
    <div class="content">
        <!-- Banner -->
        <div class="banner">
            <h1 class="title">
                Follow your list today!!!
            </h1>
        </div>
        <!-- To Do List -->
        @if(session("status"))
            <div style="background-color: forestgreen; color: white; font-size: 2rem; padding: 1rem 5rem">
                {{ session('status') }}
            </div>
        @endif
        <div class="container">
            <div class="menu">
                <div class="container-title">
                    My To Do List
                </div>
                <div class="sorting">
                    <form action={{ url('/dashboard') }} method="GET">
                        <button type="submit">
                            <img src="{{asset('img/sort-down.png')}}" alt="" width="30px">
                            <input type="hidden" value="desc" name="sort">
                            <div class="btn-text">
                                Descending
                            </div>
                        </button>    
                    </form>      
                    <form action={{ url('/dashboard') }} method="GET">              
                        <button type="submit">
                            <input type="hidden" value="asc" name="sort">
                            <img src="{{asset('img/sort-up.png')}}" alt="" width="30px">
                            <div class="btn-text">
                                Ascending
                            </div>
                        </button>
                    </form>
                    <div class="add-to-list">
                        <a href="{{ url('/dashboard/create') }}" class="btn btn-primary">
                            <img src="{{asset('img/add.png')}}" alt="" width="50px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="list-containers">
                @foreach($todos as $todo)
                @if ($todo->status == 'Todo')  
                <div class="single-list">
                    <form method="POST" action="{{ url("/dashboard/$todo->id/comp") }}">
                        @method('patch')
                        @csrf
                        <div class="checkbox-area">
                            <input type="checkbox" onclick="submit()">
                        </div>
                    </form>
                    <div class="to-do-item">
                        <div class="item-title">
                            <label for="note">{{ $todo->title }}</label>
                        </div>
                        <div class="item-date">
                            <label for="date">{{ $todo->enddate }}</label>
                        </div>
                        <div class="item-description">
                            <label for="description">{{ $todo->description }}</label>
                        </div>
                    </div>
                    <div class="to-do-navigation">
                        <a href="{{ url("/dashboard/$todo->id/edit") }}">
                            <button class="control-item" type="submit">
                                <img src="{{asset('img/pencil.png')}}" alt=""  width="40px">
                            </button>
                        </a>
                        <form method="POST" action="{{ url("/dashboard/$todo->id") }}">
                            @method('delete')
                            @csrf
                            <button class="control-item" type="submit">
                                <img src="{{asset('img/delete.png')}}" alt=""  width="40px">
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
                
            </div>
        </div>
        <!-- Completed -->
        <div class="container">
            <div class="menu">
                <div class="container-title">
                    Completed List
                </div>
            </div>
            <div class="list-containers">
                @foreach($todos as $todo)
                @if ($todo->status == 'Completed')
                <div class="single-done-list">
                    <div class="to-do-item">
                        <div class="item-title">
                            <label for="note">{{ $todo->title }}</label>
                        </div>
                        <div class="item-date">
                            <label for="date">{{ $todo->enddate }}</label>
                        </div>
                        <div class="item-description">
                            <label for="description">{{ $todo->description }}</label>
                        </div>
                    </div>
                    <div class="to-do-navigation">
                        <div class="control-item">
                            <form method="POST" action="{{ url("/dashboard/$todo->id") }}">
                                @method('delete')
                                @csrf
                                <button type="submit">
                                    <img src="{{asset('img/delete.png')}}" alt=""  width="40px">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            Copyright 2021. All right Reserved
        </div>
        <div class="logo-img">
            <a href="../Agile/homepageLogged.html">
                <img src="../Agile/Asset/Logo.png" alt="" width="50px">
            </a>
        </div>
    </div>
</body>
</html>

@section('content')
    
    <div class="container">
        <div class="d-flex align-items-center my-3">
            <h1>To-do List</h1>
            <div class="ml-auto">
                <a href="{{ url('/dashboard/create') }}" class="btn btn-primary">Add To-do</a>
            </div>
        </div>
        <div class="row flex-column">
            <h2 class="text-center">To-do</h2>
            <form action={{ url('/dashboard') }} method="GET">
                <input type="hidden" value="asc" name="sort">
                <button type="submit">Ascending</button>
            </form>
            <form action={{ url('/dashboard') }} method="GET">
                <input type="hidden" value="desc" name="sort">
                <button type="submit">Descending</button>
            </form>
            @foreach($todos as $todo)
            @if ($todo->status == 'Todo')
            <div class="card">
                <div class="card-body">
                    <h3>{{ $todo->title }}</h3>
                    <p>{{ $todo->description }}</p>
                    <p>{{ $todo->enddate }}</p>
                    <a href="{{ url("/dashboard/$todo->id/edit") }}" class="btn btn-primary">Edit</a>
                    <div class="btn-group">
                        <form method="POST" action="{{ url("/dashboard/$todo->id/comp") }}">
                            @method('patch')
                            @csrf
                            <button class="dropdown-item" type="submit">Completed</button>
                        </form>
                        <form method="POST" action="{{ url("/dashboard/$todo->id") }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row flex-column">
            <h2 class="text-center">Completed</h2>
            @foreach($todos as $todo)
            @if ($todo->status == 'Completed')
            <div class="card">
                <div class="card-body">
                    <h3>{{ $todo->title }}</h3>
                    <p>{{ $todo->description }}</p>
                    <p>{{ $todo->enddate }}</p>
                    <div class="btn-group">
                        <form method="POST" action="{{ url("/dashboard/$todo->id") }}">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection
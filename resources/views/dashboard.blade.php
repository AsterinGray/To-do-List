@extends('layouts.app')

@section('content')
    @if(session("status"))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="container">
        <div class="d-flex align-items-center my-3">
            <h1>To-do List</h1>
            <a href="{{ url('/dashboard/create') }}" class="btn btn-primary ml-auto">Add To-do</a>
        </div>
        <div class="row">
            <div class="col-4">
                <h2 class="text-center">To-do</h2>
                @foreach($todos as $todo)
                    @if ($todo->status == 'Todo')
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $todo->title }}</h3>
                            <p>{{ $todo->description }}</p>
                            <p>{{ $todo->enddate }}</p>
                            <p class="text-danger">{{ $todo->status }}</p>
                            <a href="{{ url("/dashboard/$todo->id/edit") }}" class="btn btn-primary">Edit</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Change Status
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/onprog") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">On Progress</button>
                                    </form>
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/comp") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">Completed</button>
                                    </form>
                                </div>
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
            <div class="col-4">
                <h2 class="text-center">On Progress</h2>
                @foreach($todos as $todo)
                    @if ($todo->status == 'On Progress')
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $todo->title }}</h3>
                            <p>{{ $todo->description }}</p>
                            <p>{{ $todo->enddate }}</p>
                            <p class="text-warning">{{ $todo->status }}</p>
                            <a href="{{ url("/dashboard/$todo->id/edit") }}" class="btn btn-primary">Edit</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Change Status
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/comp") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">Completed</button>
                                    </form>
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/todo") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">To-Do</button>
                                    </form>
                                </div>
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
            <div class="col-4">
                <h2 class="text-center">Completed</h2>
                @foreach($todos as $todo)
                    @if ($todo->status == 'Completed')
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $todo->title }}</h3>
                            <p>{{ $todo->description }}</p>
                            <p>{{ $todo->enddate }}</p>
                            <p class="text-success">{{ $todo->status }}</p>
                            <a href="{{ url("/dashboard/$todo->id/edit") }}" class="btn btn-primary">Edit</a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Change Status
                                </button>
                                <div class="dropdown-menu">
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/onprog") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">On Progress</button>
                                    </form>
                                    <form method="POST" action="{{ url("/dashboard/$todo->id/todo") }}">
                                        @method('patch')
                                        @csrf
                                        <button class="dropdown-item" type="submit">To-Do</button>
                                    </form>
                                </div>
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
    </div>
@endsection
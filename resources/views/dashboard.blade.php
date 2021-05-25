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
            <div class="ml-auto">
                <a href="{{ url('/dashboard/create') }}" class="btn btn-primary">Add To-do</a>
            </div>
        </div>
        <div class="row flex-column">
            <h2 class="text-center">To-do</h2>
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
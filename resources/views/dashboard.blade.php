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
                <button class="btn btn-primary">
                    <a href="{{ url('/dashboard-create') }}" class="text-white">Add To-do</a>
                </button>
            </div>
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
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-secondary">Change Status</button>
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
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-secondary">Change Status</button>
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
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-secondary">Change Status</button>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
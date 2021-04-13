@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="/dashboard">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Insert Title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="desc" class="form-control @error('desc') is-invalid @enderror"   id="description" rows="2" placeholder="Insert Description" value="{{ old('desc') }}"></textarea>
            </div>
            <div class="form-group">
                <label for="date">End Date</label>
                <input name="end" class="form-control" type="date" id="date" value="{{ old('end') }}">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
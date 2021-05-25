@extends('layouts.create-edit')

@section('form')
    <form method="POST" action="/dashboard">
        @csrf
        <div class="inputNoteClass">
            <div class="inputNote">
                <img src="{{asset('img/note image.png')}}">
                <input id="note" name="title" type="text" placeholder="input note..." value="{{ old('title') }}">
            </div>
            <div class="inputNote">
                <img src="{{asset('img/dialogue image.png')}}">
                <textarea id="description" name="desc" placeholder="input description...">{{ old('desc') }}</textarea>
            </div>
            <div class="inputNote">
                <img src="{{asset('img/deadline image.png')}}">
                <input id="deadline" name="end" type="date" value="{{ old('end') }}">
            </div>
        </div>
        <button type="submit" onclick="" id="addButton">
            A D D
        </button>
    </form>
@endsection
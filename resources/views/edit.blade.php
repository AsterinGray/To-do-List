@extends('layouts.create-edit')

@section('form')
    <form method="POST" action="/dashboard/{{ $todo->id }}">
        @method('patch')
        @csrf
        <div class="inputNoteClass">
            <div class="inputNote">
                <img src="{{asset('img/note image.png')}}">
                <input id="note" name="title" type="text" placeholder="input note..." value="{{ $todo->title }}">
            </div>
            <div class="inputNote">
                <img src="{{asset('img/dialogue image.png')}}">
                <textarea id="description" name="desc" placeholder="input description...">{{ $todo->description }}</textarea>
            </div>
            <div class="inputNote">
                <img src="{{asset('img/deadline image.png')}}">
                <input id="deadline" name="end" type="date" value="{{ $todo->enddate }}">
            </div>
        </div>
        <button type="submit" onclick="" id="addButton">
            U P D A T E
        </button>
    </form>
@endsection
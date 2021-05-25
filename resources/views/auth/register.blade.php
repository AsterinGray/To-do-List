@extends('layouts.auth')

@section('header')
<p id="newHere">Already have an Account?</p>
<div id="create-account">
    <a href="/login">Log In</a>
</div>
@endsection

@section('main')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h6>Register</h6>
    <div class="input-group">
      <label for="name">Name</label>
      <input type="name" id="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
      @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus/>
      @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    
    <div class="input-group">
      <label for="">Password</label>
      <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password"/>
      @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group">
      <label for="">Confirm Password</label>
      <input type="password" name="password_confirmation" required autocomplete="new-password"/>
      @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="button">
      <input type="submit" value="Register" />
    </div>
  </form>
@endsection

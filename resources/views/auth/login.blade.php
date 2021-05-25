@extends('layouts.auth')

@section('header')
<p id="newHere">New Here?</p>
<div id="create-account">
    <a href="/register">Create an account</a>
</div>
@endsection

@section('main')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h6>Sign in</h6>
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
      <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password"/>
      @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="input-group" id="checkbox">
      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
      <label for="remember">Remember me</label>
    </div>
    <div class="button">
      <input type="submit" value="Sign in" />
    </div>
  </form>
@endsection
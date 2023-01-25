@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Login Form -->
      {!! Form::open(['url' => 'foo/bar']) !!}
         <input type="text" id="login" class="fadeIn second" name="login" placeholder="email">
         <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
         <input type="submit" class="fadeIn fourth" value="Log In">
      {!! Form::close() !!}
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a href="#">Forgot Password?</a>
      </div>
  
    </div>
  </div>
  @include('layout.footer')
  @endsection
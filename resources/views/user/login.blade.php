@extends('layout.common')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
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
  {{-- <div class="w3-container w3-center w3-animate-top">
    <div id="formContent">
      <!-- Login Form -->
      <form>
        <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
        <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
  
    </div>
  </div> --}}
  {{-- <div class="w3-container w3-center w3-animate-top">
    <h1>Animation is Fun!</h1>
    <p>The w3-animate-top class slides in an element from the top.</p>
  </div> --}}
  @endsection
@extends('layout.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
<div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Login Form -->
      <form>
        {!! Form::open(['url' => 'foo/bar']) !!}
            <input type="text" id="login" class="" name="login" placeholder="email">
            <input type="text" id="password" class="" name="login" placeholder="password">
            <input type="text" id="password" class="" name="login" placeholder="confirm password">
            <input type="submit" class="" value="Register">
        {!! Form::close() !!}
        
      </form>
    </div>
  </div>
  @endsection
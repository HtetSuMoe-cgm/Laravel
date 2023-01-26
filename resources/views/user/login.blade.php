@extends('layout.header')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <div class="wrapper fadeInDown">
        <div class="formContent">
            {{ Form::open(['method' => 'post']) }}
            {{ Form::email ('email',null,['class' => 'login fadeIn','placeholder' => 'email'])}}
            {{ Form::password ('password',['class' => 'login fadeIn','placeholder' => 'password'])}}
            {{ Form::submit('Login',['class' => 'btnLogin fadeIn']) }}
            {{ Form::close() }}
            <!-- Remind Passowrd -->
            <div class="formFooter">
                <a href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
    @include('layout.footer')
@endsection

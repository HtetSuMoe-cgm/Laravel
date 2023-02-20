@extends('layout.app')
@section('main-content')
    <div class="wrapper fadeInDown">
        <div class="formContent">
            {{ Form::open(['method' => 'post', 'route' => 'login.perform']) }}
            {{ Form::email('email', '', ['class' => 'login fadeIn', 'placeholder' => 'email']) }}
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            {{ Form::password('password', ['class' => 'login fadeIn', 'placeholder' => 'password']) }}
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            {{ Form::submit('Login', ['class' => 'btnLogin fadeIn']) }}
            {{ Form::close() }}
            <div class="formFooter">
                <a class="text-decoration-none" href="{{ route('user.forgotPassword.show') }}">Forgot Password?</a>
            </div>
        </div>
    </div>
@endsection

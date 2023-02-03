@extends('layout.app')
@section('main-content')
    <div class="wrapper fadeInDown">
        <div class="formContent">
            {{ Form::open(['method' => 'post', 'route' => 'login.perform']) }}
            {{ Form::email('email', '', ['class' => 'login fadeIn'.($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }}
            @if ($errors->has('email'))
                @error('email')
                    <span class="error invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::password('password', ['class' => 'login fadeIn'.($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'password']) }}
            @if ($errors->has('password'))
                @error('password')
                    <span class="error invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::submit('Login', ['class' => 'btnLogin fadeIn']) }}
            {{ Form::close() }}
            <div class="formFooter">
                <a href="{{ route('user.forgotPassword.show') }}">Forgot Password?</a>
            </div>

        </div>
    </div>
@endsection

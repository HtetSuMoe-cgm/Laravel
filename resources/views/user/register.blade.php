@extends('layout.app')
@section('main-content')
    <div class="wrapper fadeInDown">
        <div class="formContent">
            {{ Form::open(['method' => 'post', 'route' => 'register.perform']) }}
            {{ Form::text('username', '', ['class' => 'login fadeIn required' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'username']) }}
            @if ($errors->has('username'))
                @error('username')
                    <span class="error invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::email('email', '', ['class' => 'login fadeIn' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }}
            @if ($errors->has('email'))
                @error('email')
                    <span class="error invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::password('password', ['class' => 'login fadeIn' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'password']) }}
            @if ($errors->has('password'))
                @error('password')
                    <span class="error invalid-feedback" role="alert">{{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::password('password_confirmation', ['class' => 'login fadeIn' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'confirm password']) }}
            <div class="login fadeIn">
                {{ Form::radio('gender', 'male', '', ['class' => 'form-check-input', 'id' => 'inlineRadio1']) }}
                {{ Form::label('inlineRadio1', 'Male', ['class' => 'form-check-label mr-5']) }}
                {{ Form::radio('gender', 'female', '', ['class' => 'form-check-input', 'id' => 'inlineRadio2']) }}
                {{ Form::label('inlineRadio2', 'Female', ['class' => 'form-check-label']) }}
            </div>
            @if ($errors->has('gender'))
                @error('gender')
                    <span class="error invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            @endif
            {{ Form::hidden('type', 0) }}
            {{ Form::submit('Register', ['class' => 'btnLogin fadeIn']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

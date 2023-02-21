@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    @if (session('changed_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('changed_success') }}
                        </div>
                    @endif
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        {{ Form::open(['method' => 'post', 'route' => ['user.resetPassword']]) }}
                        @csrf
                        {{ Form::hidden('token', $token) }}
                        <div class="form-group row">
                            {{ Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control']) }}
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', 'Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control']) }}
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', 'Confirm Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

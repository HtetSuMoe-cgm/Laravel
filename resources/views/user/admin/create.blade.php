@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Create User</div>
                    <div class="card-body">
                        {{ Form::open(['method' => 'post', 'route' => 'createUser.perform']) }}
                        <div class="form-group row">
                            {{ Form::label('username', 'User Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('username', '', ['class' => 'form-control' . ($errors->has('username') ? 'is-invalid' : '')]) }}
                                @if ($errors->has('username'))
                                    @error('username')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? 'is-invalid' : '')]) }}
                                @if ($errors->has('email'))
                                    @error('email')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', 'Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? 'is-invalid' : '')]) }}
                                @if ($errors->has('password'))
                                    @error('password')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', 'Confirm Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password') ? 'is-invalid' : '')]) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('type', 'User Type', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('type', [1 => 'Admin', 0 => 'User']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 text-right">
                                {{ Form::radio('gender', 'male', '', ['class' => 'form-check-input', 'id' => 'inlineRadio1']) }}
                                {{ Form::label('inlineRadio1', 'Male', ['class' => 'form-check-label mr-5']) }}
                                {{ Form::radio('gender', 'female', '', ['class' => 'form-check-input', 'id' => 'inlineRadio2']) }}
                                {{ Form::label('inlineRadio2', 'Female', ['class' => 'form-check-label']) }}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    @if (session('changed_success'))
                        <div class="alert alert-success">
                            {{ session('changed_success') }}
                        </div>
                    @endif
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        {{ Form::model(['method' => 'post', 'route' => ['changePassword.perform']]) }}

                        <div class="form-group row">
                            {{ Form::label('current_password', 'Current Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('current_password', ['class' => 'form-control']) }}
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('new_password', 'New Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('new_password', ['class' => 'form-control']) }}
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('new_confirm_password', 'New Confirm Password', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::password('new_confirm_password', ['class' => 'form-control']) }}
                                @error('new_confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Update Password', ['class' => 'btn btn-outline-primary']) }}
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('userList.show') }}" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Update User</div>
                    <div class="card-body">
                        {{ Form::model($user, ['method' => 'post', 'route' => ['editUser.perform', $user->id]]) }}
                        <div class="form-group row">
                            {{ Form::label('username', 'User Name', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::email('email', $user->email, ['class' => 'form-control']) }}
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('type', 'User Type', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::select('type', ['1' => 'Admin', '0' => 'User'], $user->type, ['class' => 'form-control']) }}
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
                        <div class="row">
                            <div class="col-md-12 common-btn">
                                {{ Form::hidden('hidden_id', $user->id) }}
                                {{ Form::submit('Update User', ['class' => 'btn btn-outline-primary mr-2']) }}
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

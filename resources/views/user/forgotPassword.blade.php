@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    @if (session('send_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('send_success') }}
                        </div>
                    @endif
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        {{ Form::open(['method' => 'post', 'route' => 'user.sendEmail']) }}
                        <div class="form-group row">
                            {{ Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('email', '', ['class' => 'form-control']) }}
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-md-12 common-btn">
                                {{ Form::submit('Send Password Reset Link', ['class' => 'btn btn-outline-primary mr-2']) }}
                                <a href="{{ route('login.show') }}" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

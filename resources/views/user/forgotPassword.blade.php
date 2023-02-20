@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']) }}
                            </div>
                            <button class="btn btn-primary">Back</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection

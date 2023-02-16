@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        {{ Form::open(['method' => 'post', 'route' => 'createPost.perform','files' => true]) }}

                        <div class="form-group row">
                            {!! Form::label('post_img', 'Image') !!}
                            {!! Form::file('post_img', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('title', '', ['class' => 'form-control' . ($errors->has('title') ? 'is-invalid' : '')]) }}
                                @if ($errors->has('title'))
                                    @error('title')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('description', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => 3 . ($errors->has('description') ? 'is-invalid' : '')]) }}
                                @if ($errors->has('description'))
                                    @error('description')
                                        <span class="error invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 text-right">
                                {{ Form::radio('public_flag', 0, '', ['class' => 'form-check-input', 'id' => 'inlineRadio1']) }}
                                {{ Form::label('inlineRadio1', 'Public', ['class' => 'form-check-label mr-5']) }}
                                {{ Form::radio('public_flag', 1, '', ['class' => 'form-check-input', 'id' => 'inlineRadio2']) }}
                                {{ Form::label('inlineRadio2', 'Private', ['class' => 'form-check-label']) }}
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

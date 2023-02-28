@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        {{ Form::model($post, ['method' => 'post', 'route' => ['editPost.perform', $post->id], 'files' => true]) }}
                        <div class="form-group row">
                            <div class="col-md-4 mx-auto">
                            <img src="{{ asset('images/' . $post->post_img) }}" width="100" class="img-thumbnail" />
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('post_img', 'Image', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::file('post_img', ['class' => 'form-control']) }}
                            </div>
                            {{ Form::hidden('hidden_post_img', $post->post_img) }}
                        </div>
                        <div class="form-group row">
                            {{ Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('title', $post->title, ['class' => 'form-control']) }}
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('description', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('description', $post->description, ['class' => 'form-control', 'rows' => 3]) }}
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-5">
                                {{ Form::radio('public_flag', 0, '', ['class' => 'form-check-input', 'id' => 'inlineRadio1']) }}
                                {{ Form::label('inlineRadio1', 'Public', ['class' => 'form-check-label mr-5']) }}
                                {{ Form::radio('public_flag', 1, '', ['class' => 'form-check-input', 'id' => 'inlineRadio2']) }}
                                {{ Form::label('inlineRadio2', 'Private', ['class' => 'form-check-label']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 common-btn">
                                {{ Form::hidden('hidden_id', $post->id) }}
                                {{ Form::submit('Update Post', ['class' => 'btn btn-outline-primary mr-2']) }}
                                <a href="{{ route('postList.show') }}" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

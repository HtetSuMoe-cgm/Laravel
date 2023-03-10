@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        {{ Form::open(['method' => 'post', 'route' => 'createPost.perform', 'files' => true]) }}
                        <div class="form-group row">
                            <div class="col-md-4 mx-auto">
                                <div id="divImageMediaPreview">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('post_img', 'Image', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::file('post_img', ['class' => 'form-control file-input']) !!}
                                @error('post_img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::text('title', '', ['class' => 'form-control']) }}
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('description', 'Description', ['class' => 'col-md-4 col-form-label text-md-right']) }}
                            <div class="col-md-6">
                                {{ Form::textarea('description', '', ['class' => 'form-control', 'rows' => 3]) }}
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
                                @error('public_flag')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 common-btn">
                                {{ Form::submit('Create Post', ['class' => 'btn btn-outline-primary mr-2']) }}
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

@section('script')
    <script type="text/javascript" src="{{ asset('js/createPost.js') }}"></script>
@endsection

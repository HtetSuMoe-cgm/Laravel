@extends('layout.app')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><b>Post Detail</b></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-6">
                                @if ($postData->post_img == '')
                                    <img src="{{ url('/img/img_default_post.png') }}" width="100px" height="100px"
                                        alt="post_img">
                                @else
                                    <img src="/images/{{ $postData->post_img }}" width="100px" alt="post_img">
                                @endif
                            </div>
                            <div class="col col-md-6">
                                <h4 class="card-title">{{ $postData->title }}</h4>
                                <p class="card-text">{{ $postData->description }}</p>
                            </div>
                        </div>
                        <div class="container d-flex">
                            <div class="ml-auto">
                                <a href="{{ route('home') }}" class="text-decoration-none"><i
                                        class="fa-solid fa-circle-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

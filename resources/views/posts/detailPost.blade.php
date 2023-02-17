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
                                <img class="card-img-top" src="/images/{{ $postData->post_img }}" alt="post_img"
                                    style="width:100px">
                            </div>
                            <div class="col col-md-6">
                                <h4 class="card-title">{{ $postData->title }}</h4>
                                <p class="card-text">{{ $postData->description }}</p>
                            </div>
                        </div>
                        <div class="container d-flex">
                            <div class="ml-auto">
                                <a href="{{ route('home') }}" class="text-decoration-none"><i class="fa-solid fa-circle-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

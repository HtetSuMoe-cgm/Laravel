@extends('layout.header')
@section('content')

    <div class="card justify-content-center m-5" style="width:400px">
        <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
        <div class="card-body">
          <h4 class="card-title">{{ $postData->title }}</h4>
          <p class="card-text">{{ $postData->description }}</p>
          <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

@include('layout.footer')
@endsection
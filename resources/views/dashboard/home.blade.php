@extends('layout.header')
@section('content')
    <main class="dashboard">
        <div class="cotainer">
          <h3 class="m-3">Bulletin Board</h3>

			@foreach($postList as $row)
            <div class="list-group ml-5 mr-5">
                <div href="#" class="list-group-item m-3">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $row->title }}</h5>
                        <small>3 days ago</small>
                    </div>
                    {{-- <p class="mb-1">{{ $row->description }}</p> --}}
                    <a href="">detail</a>
                </div>
            </div>
            {{-- <div class="card m-5">
                <div class="card-body">{{ $row->title }}</div>
                <a href="">detail</a>
            </div> --}}
            @endforeach
        </div>
    </main>
    @include('layout.footer')
@endsection

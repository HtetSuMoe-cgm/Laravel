@extends('layout.header')
@section('content')
    <main class="dashboard">
        <div class="cotainer">
            <h3 class="m-3">Bulletin Board</h3>
            @foreach ($postList as $row)
            <div class="media d-block d-md-flex m-4">
                {{-- <img class="d-flex mb-3 mx-auto media-image z-depth-1" src="https://mdbootstrap.com/img/Others/documentation/img (1)-mini.webp" alt="Generic placeholder image"> --}}
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <h5 class="mt-0 font-weight-bold">{{ $row->title }}</h5>
                    {{ $row->description }}
                </div>
                <a class="" href="{{ route('detailPost') }}">detail</a>
            </div>
            @endforeach   
        </div>
    </main>
    @include('layout.footer')
@endsection

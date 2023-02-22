@extends('layout.app')
@section('main-content')
    <main class="dashboard">
        <div class="cotainer">
            <h3 class="m-3">Bulletin Board</h3>
            @foreach ($publicPost as $posts)
                <div class="media d-block d-md-flex m-4">
                    @if ($posts->post_img == '')
                        <img src="{{ url('/img/img_default_post.png') }}" width="100px" height="100px" alt="post_img">
                    @else
                        <img src="/images/{{ $posts->post_img }}" width="100px" alt="post_img">
                    @endif
                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                        <h5 class="mt-0 font-weight-bold">{{ $posts->title }}</h5>
                        <p class="text-truncate" style="max-width: 150px;">{{ $posts->description }}</p>
                        
                    </div>
                    <a class="text-decoration-none" href="{{ route('detailPost', $posts->id) }}">detail <i
                            class="fa-solid fa-circle-right"></i></a>
                </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">
            {{ $publicPost->links() }}
        </div>
    </main>
@endsection

@extends('layout.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Post List</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('createPost.show') }}" class="btn btn-success btn-sm float-right">Add Post</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Post Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Flag</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($postList) > 0)
                        @foreach ($postList as $posts)
                            <tr>
                                <td>
                                    @if ($posts->post_img == '')
                                        <img src="{{ url('/img/img_default_post.png') }}" width="100px" height="100px"
                                        alt="post_img">
                                    @else
                                        <img src="/images/{{ $posts->post_img }}" width="100px" alt="post_img">
                                    @endif
                                </td>
                                <td>{{ $posts->title }}</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $posts->description }}</td>
                                <td>{{ $posts->public_flag == 1 ? 'Private' : 'Public' }}</td>
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('editPost.show', $posts->id) }}" class="btn btn-sm rounded-0"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form method="POST" action="{{ route('deletePost.perform', $posts->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm rounded-0 show-alert-delete-box btn-sm"
                                                    data-toggle="tooltip" title='Delete'><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ route('postDetail.show', $posts->id) }}" class="btn btn-sm rounded-0"
                                                type="button" data-toggle="tooltip" data-placement="top" title="detail"><i class="fa-sharp fa-solid fa-circle-info"></i></a>
                                            
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No Data Found</td>
                        </tr>
                    @endif
            </table>
            <a class="btn btn-success mt-3" href="{{ route('export-posts') }}">Export Posts</a>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/deleteConfirm.js') }}"></script>
@endsection

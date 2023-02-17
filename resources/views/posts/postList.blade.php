@extends('layout.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Post List</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('createPost.show') }}" class="btn btn-success btn-sm float-right">Add</a>
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
                                <td><img src="/images/{{ $posts->post_img }}" width="100px"></td>
                                <td>{{ $posts->title }}</td>
                                <td>{{ $posts->description }}</td>
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
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                // icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

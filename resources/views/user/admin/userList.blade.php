@extends('layout.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="ml-3"><b>User Lists</b></h3>
            </div>
            <div class="row">
                <div class="col col-md-6">
                    <div class="row">
                        <div class="col col-md-6">
                            {{ Form::open(['method' => 'post', 'route' => 'importUsers.perform', 'files' => true]) }}
                            {{ Form::label('file', 'Choose file', ['class' => 'custom-file-label', 'id' => 'customFile']) }}
                            <div class="custom-file text-left">
                                {{ Form::file('file', ['class' => 'custom-file-input', 'for' => 'customFile']) }}
                            </div>
                        </div>
                        <div class="col col-md-6">
                            {{ Form::submit('Import Users', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                        @if (count($errors) > 0)
                            <div class="col-md-12">
                                <div class="alert alert-danger mt-5">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }} <br>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col col-md-6">
                    <a href="{{ route('createUser.show') }}" class="btn btn-success btn-sm float-right">Add User</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($userList) > 0)
                        @foreach ($userList as $data)
                            <tr>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->type == 1 ? 'Admin' : 'User' }}</td>
                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{ route('editUser.show', $data->id) }}" class="btn btn-sm rounded-0"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <form method="POST" action="{{ route('deleteUser.perform', $data->id) }}">
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
            <a class="btn btn-success mt-3" href="{{ route('exportUsers.perform') }}">Export Users</a>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/deleteConfirm.js') }}"></script>
@endsection

@extends('layout.app')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>User List</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('createUser.show') }}" class="btn btn-success btn-sm float-right">Add</a>
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
                                <td>{{ $data->type }}</td>
                                <td>
                                    <ul class="list-inline m-0">
                                        {{-- <li class="list-inline-item">
                                            <a href="{{ route('editUser.show', $data->id) }}" class="btn btn-sm rounded-0"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-sm rounded-0" type="button" data-toggle="modal"
                                                data-target="#my-modal" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </li> --}}

                                        {!! Form::model($data, ['method' => 'delete', 'route' => ['deleteUser.show', $data->id], 'class' =>'form-inline form-delete']) !!}
                                        {!! Form::hidden('id', $data->id) !!}
                                        <li class="list-inline-item">
                                            <a href="{{ route('editUser.show', $data->id) }}" class="btn btn-sm rounded-0"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                        {!! Form::submit(trans('delete'), ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                                        </li>
                                        {!! Form::close() !!}

                                        {{-- <form method="post" action="{{ route('deleteUser.perform', $data->id) }}">
                                            @csrf
                                            @method('POST')
                                            <a href="{{ route('editUser.show', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                                        </form> --}}
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

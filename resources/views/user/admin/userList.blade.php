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
        <table id="dtable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Type</th>
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
                                    <li class="list-inline-item">
                                        <button class="btn btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button class="btn btn-sm rounded-0" type="button" data-toggle="modal" data-target="#my-modal" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                        <div id="" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content border-0">   
                                                    <div class="modal-body p-0">
                                                        <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                            <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                                                            <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> This change will reflect in your portal after an hour.</p>     </div>
                                                            <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                                                                <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button></div><div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div></div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->

@endsection
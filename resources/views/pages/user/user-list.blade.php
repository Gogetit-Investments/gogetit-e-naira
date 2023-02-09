@extends('layouts.simple.master')
@section('title', 'HTML 5 Data Export')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection
<br/>
{{-- @section('breadcrumb-title')

<h3>Users</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Users List</li>
@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Users List</h5>
				</div>
				<div class="card-body">
					<div class="dt-ext table-responsive">
						<table class="display" id="export-button">
							
							@if(session('success'))
							<div class="alert alert-success dark" role="alert">
							  {{ @session('success') }}  
							</div>
							@endif
							@if(session('error'))
							<div class="alert alert-danger dark" role="alert">
							  {{ @session('error') }}  
							</div>
							@endif			
						
							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Name</th>
									<th>Phone Number</th>
									
									<th>Added By</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($users as $user)
								<div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									   <div class="modal-content">
										  <div class="modal-header">
											 <h5 class="modal-title" id="exampleModalLabel">Delete User {{$user->username}}</h5>
											 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <div class="modal-body"><h2>You are about to delete: <br/>{{$user->first_name}} {{$user->last_name}}?</h2>
										<br/><h4>Are you sure?</h4>
										</div>
										  <div class="modal-footer">
											{{-- <form method="DELETE" action="delete_user/{{$user->id}}"> --}}
											{{-- <input name="id" value="{{$user->id}}"/> --}}
											 <a href="delete_user/{{$user->id}}"> <button class="btn btn-secondary" type="submit">Delete User</button></a>
											  {{-- </form> --}}
											 <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
										  </div>
									   </div>
									</div>
								 </div>
								<tr>
									<td>{{$user->username}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->first_name}} {{$user->last_name}} {{$user->other_names}}</td>
									<td>{{$user->phone_number}}</td>
									<td>{{$user->first_name}}</td>
									<td>{{$user->created_at}}</td>
									<td><button class="btn btn-square btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal-{{$user->id}}">Delete User</button></td>
								</tr>


								{{-- <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Simple</button> --}}
							

								@empty
								<tr>
									<td colspan="5" style="color:red">Oops! No users registered yet</td>
								  </tr>
								@endforelse
				
							</tbody>
		
						</table>
					</div>
				</div>
			</div>
		</div>
		
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
@endsection
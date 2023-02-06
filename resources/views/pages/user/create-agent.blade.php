@extends('layouts.simple.master')
@section('title', 'Default Forms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection
<br/>
{{-- @section('breadcrumb-title')
<h3>Agents</h3>
@endsection --}}

{{-- @section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">New Agent Upload Form</li>
@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>New Agent Upload Form</h5>
							<span>Only an authorized Coordinator is permitted to do this</span>
						</div>
						<div class="card-body">
							<form class="theme-form" action="{{route('register_agent.perform')}}" method="POST">
								@csrf
								{{-- <div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputEmail1">Username</label>
									<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
								</div> --}}
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
						
								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputEmail1">Email address</label>
									<input class="form-control " id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
									@if ($errors->has('email'))
									<i style="color:coral">
										{{ $errors->first('email') }}
									</i>
									@endif
								</div>

								{{-- <input class="form-control" id="exampleInputPassword1" type="hidden" name="password" value="<?php echo $string ?>">
								<input class="form-control" id="exampleInputPassword1" type="hidden" name="password_confirmation" value="<?php echo $string ?>"> --}}
								{{-- <div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputPassword1">Password</label>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputPassword1">Confirm Password</label>
								</div> --}}

								{{-- <small class="form-text text-muted" id="emailHelp">                                 
									<!-- Error -->
									@if ($errors->has('email'))
									<div class="error">
										{{ $errors->first('email') }}
									</div>
									@endif
								</small> --}}

								<div class="mb-3">
									<label class="col-form-label pt-0" for="first_name">Firstname</label>
									<input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter Firstname">
									@if ($errors->has('first_name'))
									<i style="color:coral">
										{{ $errors->first('first_name') }}
									</i>
									@endif
								</div>

																{{-- <div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputPassword1">Password</label>
									<input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
								</div> --}}
								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Lastname</label>
									<input class="form-control " id="last_name" type="text" name="last_name"  placeholder="Enter Lastname">
									@if ($errors->has('last_name'))
									<i style="color:coral">
										{{ $errors->first('last_name') }}
									</i>
									@endif
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Othernames</label>
									<input class="form-control" id="other_names" type="text" name="other_names"  placeholder="Enter Othernames">
									@if ($errors->has('other_names'))
									<i style="color:coral">
										{{ $errors->first('other_names') }}
									</i>
									@endif
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="phone_number">Phone Number</label>
									<input class="form-control" id="phone_number" type="text" name="phone_number"  placeholder="Phone Number ">
									@if ($errors->has('phone_number'))
									<i style="color:coral">
										{{ $errors->first('phone_number') }}
									</i>
									@endif
								</div>
								{{-- <div class="mb-2">
									<div class="col-form-label">Assign Role</div>
									<select class="js-example-basic-single col-sm-12" name="role_id">
										<optgroup label="Roles">
											{{$roles =  App\Models\Role::select('role_name', 'id')->get();}}
											@forelse($roles as $item)
											<option value="{{$item->id}}" >{{$item->role_name}}</option>
											@empty
											@endforelse
										</optgroup>

									</select>
								</div>

								<div class="mb-2">
									<div class="col-form-label">Assign Coordinator</div>
									<select class="js-example-basic-single col-sm-12" name="coordinator_id">
										<optgroup label="Coordinators">
											{{$coordinators =  App\Models\User::select('first_name', 'last_name', 'id')->where('role_id', '2')->get();}}
											@forelse($coordinators as $item)
											<option value="{{$item->id}}" >{{$item->first_name}} {{$item->last_name}}</option>
											@empty
											@endforelse
										</optgroup>

									</select>
								</div> --}}

								{{-- <div class="checkbox p-0">
									<input id="dafault-checkbox" type="checkbox">
									<label class="mb-0" for="dafault-checkbox">Remember my preference</label>
								</div> --}}

								<div class="card-footer">
									<button class="btn btn-primary" type="submit">Submit</button>
									{{-- <button class="btn btn-secondary">Cancel</button> --}}
								</div>

							</form>
						</div>
	
					</div>
				</div>
				{{-- <div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Horizontal Form Layout</h5>
							<span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
						</div>
						<div class="card-body">
							<form class="theme-form">
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="inputEmail3">Email</label>
									<div class="col-sm-9">
										<input class="form-control" id="inputEmail3" type="email" placeholder="Email">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="inputPassword3">Password</label>
									<div class="col-sm-9">
										<input class="form-control" id="inputPassword3" type="password" placeholder="Password">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="inputPassword3">Contact Number</label>
									<div class="col-sm-9">
										<input class="form-control" id="inputnumber" type="number" placeholder="Contact">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="inputPassword3">Company name</label>
									<div class="col-sm-9">
										<input class="form-control" id="url" type="text" placeholder="Company name">
									</div>
								</div>
								<div class="mb-3 row">
									<label class="col-sm-3 col-form-label" for="inputPassword3">Website</label>
									<div class="col-sm-9">
										<input class="form-control" id="Website" type="url" placeholder="Website">
									</div>
								</div>
								<fieldset class="mb-3">
									<div class="row">
										<label class="col-form-label col-sm-3 pt-0">Radios</label>
										<div class="col-sm-9">
											<div class="form-check radio radio-primary">
												<input class="form-check-input" id="radio11" type="radio" name="radio1" value="option1">
												<label class="form-check-label" for="radio11">Option 1</label>
											</div>
											<div class="form-check radio radio-primary">
												<input class="form-check-input" id="radio22" type="radio" name="radio1" value="option1">
												<label class="form-check-label" for="radio22">Option 2</label>
											</div>
											<div class="form-check radio radio-primary">
												<input class="form-check-input" id="radio33" type="radio" name="radio1" value="option1" disabled="">
												<label class="form-check-label" for="radio33">Disabled</label>
											</div>
											<div class="form-check radio radio-primary">
												<input class="form-check-input" id="radio44" type="radio" name="radio1" value="option1" checked="">
												<label class="form-check-label" for="radio44">Option 3</label>
											</div>
											<div class="form-check radio radio-primary">
												<input class="form-check-input" id="radio55" type="radio" name="radio1" value="option1" checked="">
												<label class="form-check-label" for="radio44">Option 4</label>
											</div>
										</div>
									</div>
								</fieldset>
								<div class="row mb-0">
									<label class="col-sm-3 col-form-label pb-0">Checkboxes</label>
									<div class="col-sm-9">
										<div class="mb-0">
											<div class="form-check form-check-inline checkbox checkbox-primary">
												<input class="form-check-input" id="inline-form-1" type="checkbox">
												<label class="form-check-label" for="inline-form-1">Option 1</label>
											</div>
											<div class="form-check form-check-inline checkbox checkbox-primary">
												<input class="form-check-input" id="inline-form-2" type="checkbox">
												<label class="form-check-label" for="inline-form-2">Option 1</label>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary">Submit</button>
							<button class="btn btn-secondary">Cancel</button>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
		{{-- <div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>Mega form</h5>
						</div>
						<div class="card-body">
							<form class="theme-form mega-form">
								<h6>Account Information</h6>
								<div class="mb-3">
									<label class="col-form-label">Your Name</label>
									<input class="form-control" type="text" placeholder="your Name">
								</div>
								<div class="mb-3">
									<label class="col-form-label">Email Address</label>
									<input class="form-control" type="email" placeholder="Enter email">
								</div>
								<div class="mb-3">
									<label class="col-form-label">Contact Number</label>
									<input class="form-control" type="Number" placeholder="Enter contact number">
								</div>
								<hr class="mt-4 mb-4">
								<h6>Company Information</h6>
								<div class="mb-3">
									<label class="col-form-label">Company Name</label>
									<input class="form-control" type="text" placeholder="Company Name">
								</div>
								<div class="mb-3">
									<label class="col-form-label">Website</label>
									<input class="form-control" type="text" placeholder="Website">
								</div>
							</form>
							<hr class="mt-4 mb-4">
							<h6 class="pb-3 mb-0">Billing Information</h6>
							<form class="form-space theme-form row">
								<div class="col-auto">
									<input class="form-control" type="text" placeholder="Name On Card">
								</div>
								<div class="col-auto">
									<input class="form-control" type="text" name="inputPassword" placeholder="Card Number">
								</div>
								<div class="col-auto">
									<input class="form-control" type="text" name="inputPassword" placeholder="Zip Code">
								</div>
							</form>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary">Submit</button>
							<button class="btn btn-secondary">Cancel</button>
						</div>
					</div>
				</div>
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							<h5>Inline Form</h5>
							<span>Use<code>.form-inline</code>class in the form to style with inline fields.</span>
						</div>
						<div class="card-body">
							<h6>Inline Form with Label</h6>
							<form class="row theme-form mt-3">
								<div class="col-xxl-4 mb-3 d-flex">
									<label class="col-form-label pe-2" for="inputInlineUsername">Username</label>
									<input class="form-control" id="inputInlineUsername" type="text" name="inputUsername" placeholder="Username" autocomplete="off">
								</div>
								<div class="col-xxl-4 mb-3 d-flex">
									<label class="col-form-label pe-2" for="inputInlinePassword">Password</label>
									<input class="form-control" id="inputInlinePassword" type="password" name="inputPassword" placeholder="Password" autocomplete="off">
								</div>
								<div class="col-xxl-4 mb-3 d-flex">
									<button class="btn btn-primary">Login</button>
								</div>
							</form>
							<h6>Inline Form without Label</h6>
							<form class="row row-cols-sm-3 theme-form mt-3 form-bottom">
								<div class="mb-3 d-flex">
									<input class="form-control" type="text" name="inputUnlabelUsername" placeholder="Username" autocomplete="off">
								</div>
								<div class="mb-3 d-flex">
									<input class="form-control" id="inputUnlabelPassword" type="password" name="inputPassword" placeholder="Password" autocomplete="off">
								</div>
								<div class="mb-3 d-flex">
									<button class="btn btn-secondary">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection

@extends('layouts.simple.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection
<br/>
@section('breadcrumb-title')

<h3>Welcome <b>{{Auth::user()->first_name ?? null}}!</b> <br/>You're logged in as a <b>{{Auth::user()->role_info->role_name ?? null}}</b></h3>

@endsection

{{-- @section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		{{-- Data Agent Analytics --}}
		@if (Auth::user()->role_id=="1" ?? null)
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments Today</span>


						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count();}}
							
						</h4>


						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>

		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments This Week</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments This Month</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>

		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-secondary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Total Enrolments</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>


{{-- Coordinator Analytics --}}
@elseif (Auth::user()->role_id=="2" ?? null)
<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget"> --}}
			 {{-- <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments Today</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereDay('consumer_data.created_at', Carbon\Carbon::now()->day)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments Today</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">My Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				{{DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				->where('user.coordinator_id', '=', Auth::user()->id)
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>



 {{-- Admin Analytics --}}
 @elseif (Auth::user()->role_id=="3" ?? null)
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget"> --}}
			 {{-- <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments Today</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereDay('consumer_data.created_at', Carbon\Carbon::now()->day)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments Today</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
		  {{-- <div class="media static-top-widget">
			 <div class="align-self-center text-center"><i data-feather="calendar"></i></div> --}}
			 <div class="media-body">
				<span class="m-0">All Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				{{DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				// ->where('user.coordinator_id', '=', Auth::user()->id)
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}</h4>
				{{-- <i class="icon-bg" data-feather="calendar"></i> --}}
			 </div>
		  {{-- </div> --}}
	   </div>
	</div>
 </div>
 @endif
		{{-- <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
			<div class="card o-hidden profile-greeting">
				<div class="card-body">
					<div class="media">
						<div class="badge-groups w-100">
							<div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
							<div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
						</div>
					</div>
					<div class="greeting-user text-center">
						<div class="profile-vector"><img class="img-fluid" src="{{asset('assets/images/dashboard/welcome.png')}}" alt=""></div>
						<h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
						<p><span> Today's earrning is $405 & your sales increase rate is 3.7 over the last 24 hours</span></p>
						<div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div>
						<div class="left-icon"><i class="fa fa-bell"> </i></div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
			<div class="card earning-card">
				<div class="card-body p-0">
					<div class="row m-0">
						<div class="col-xl-3 earning-content p-0">
							<div class="row m-0 chart-left">
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>Dashboard</h5>
									<p class="font-roboto">Overview of last month</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>$4055.56 </h5>
									<p class="font-roboto">This Month Earning</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>$1004.11</h5>
									<p class="font-roboto">This Month Profit</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>90%</h5>
									<p class="font-roboto">This Month Sale</p>
								</div>
								<div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
							</div>
						</div>
						<div class="col-xl-9 p-0">
							<div class="chart-right">
								<div class="row m-0 p-tb">
									<div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
										<div class="inner-top-left">
											<ul class="d-flex list-unstyled">
												<li>Daily</li>
												<li class="active">Weekly</li>
												<li>Monthly</li>
												<li>Yearly</li>
											</ul>
										</div>
									</div>
									<div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
										<div class="inner-top-right">
											<ul class="d-flex list-unstyled justify-content-end">
												<li>Online</li>
												<li>Store</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="card-body p-0">
											<div class="current-sale-container">
												<div id="chart-currently"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row border-top m-0">
								<div class="col-xl-4 ps-0 col-md-6 col-sm-6">
									<div class="media p-0">
										<div class="media-left"><i class="icofont icofont-crown"></i></div>
										<div class="media-body">
											<h6>Referral Earning</h6>
											<p>$5,000.20</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-6 col-sm-6">
									<div class="media p-0">
										<div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
										<div class="media-body">
											<h6>Cash Balance</h6>
											<p>$2,657.21</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-12 pe-0">
									<div class="media p-0">
										<div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
										<div class="media-body">
											<h6>Sales forcasting</h6>
											<p>$9,478.50     </p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-9 xl-100 chart_data_left box-col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="row m-0 chart-main">
						<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
							<div class="media align-items-center">
								<div class="hospital-small-chart">
									<div class="small-bar">
										<div class="small-chart flot-chart-container"></div>
									</div>
								</div>
								<div class="media-body">
									<div class="right-chart-content">
										<h4>1001</h4>
										<span>purchase </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
							<div class="media align-items-center">
								<div class="hospital-small-chart">
									<div class="small-bar">
										<div class="small-chart1 flot-chart-container"></div>
									</div>
								</div>
								<div class="media-body">
									<div class="right-chart-content">
										<h4>1005</h4>
										<span>Sales</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
							<div class="media align-items-center">
								<div class="hospital-small-chart">
									<div class="small-bar">
										<div class="small-chart2 flot-chart-container"></div>
									</div>
								</div>
								<div class="media-body">
									<div class="right-chart-content">
										<h4>100</h4>
										<span>Sales return</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
							<div class="media border-none align-items-center">
								<div class="hospital-small-chart">
									<div class="small-bar">
										<div class="small-chart3 flot-chart-container"></div>
									</div>
								</div>
								<div class="media-body">
									<div class="right-chart-content">
										<h4>101</h4>
										<span>Purchase ret</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-1 xl-40 chart_data_right box-col-6"> --}}

			{{-- Data Agents Income Statistics --}}
			@if (Auth::user()->role_id=="1" ?? null)
			<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings Today</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings This Week</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings This Month</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; {{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div>



		{{-- Coordinators Income Statistics --}}
		@elseif (Auth::user()->role_id=="2" ?? null)
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								{{-- {{number_format(DB::table('consumer_data')
								->select('select consumer_data.* from consumer_data')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}} --}}
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								
							<span class="new-box"></span></h4>
							<span>My Agents' Earnings Today</span>
						</div>
					</div>
				</div>
<hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings Today</span>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
							</h4>
							<span>My Agents' Earnings This Week</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings This Week</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								</h4>
							<span>My Agents' Earnings This Month</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings This Month</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; 
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								// ->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								</h4>
							<span>My Agents' Total Earnings </span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; {{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div>



{{-- Admin Income Statistics --}}

@elseif(Auth::user()->role_id=="3" ?? null)

<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card">
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;
						{{number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2);
						}}
						
					<span class="new-box"></span></h4>
					<span>My Agents' Earnings Today</span>
				</div>
			</div>
		</div>
<hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
					<span>My Earnings Today</span>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card">
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;
						{{number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2);
						}}
					</h4>
					<span>My Agents' Earnings This Week</span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
					<span>My Earnings This Week</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card">
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;
						{{number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2);
						}}
						</h4>
					<span>My Agents' Earnings This Month</span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
					<span>My Earnings This Month</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card">
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358; 
						{{number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						// ->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2);
						}}
						</h4>
					<span>My Agents' Total Earnings </span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358; {{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
					<span>My Total Earnings </span>
				</div>
			</div>
		</div>
	</div>
</div>

@endif
		{{-- <div class="col-xl-4 xl-50 news box-col-6">
			<div class="card">
				<div class="card-header">
					<div class="header-top">
						<h5 class="m-0">News & Update</h5>
						<div class="card-header-right-icon">
							<select class="button btn btn-primary">
								<option>Today</option>
								<option>Tomorrow</option>
								<option>Yesterday</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-body p-0">
					<div class="news-update">
						<h6>36% off For pixel lights Couslations Types.</h6>
						<span>Lorem Ipsum is simply dummy...</span>
					</div>
					<div class="news-update">
						<h6>We are produce new product this</h6>
						<span> Lorem Ipsum is simply text of the printing... </span>
					</div>
					<div class="news-update">
						<h6>50% off For COVID Couslations Types.</h6>
						<span>Lorem Ipsum is simply dummy...</span>
					</div>
				</div>
				<div class="card-footer">
					<div class="bottom-btn"><a href="#">More...</a></div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-4 xl-50 appointment-sec box-col-6">
			<div class="row">
				<div class="col-xl-12 appointment">
					<div class="card">
						<div class="card-header card-no-border">
							<div class="header-top">
								<h5 class="m-0">appointment</h5>
								<div class="card-header-right-icon">
									<select class="button btn btn-primary">
										<option>Today</option>
										<option>Tomorrow</option>
										<option>Yesterday</option>
									</select>
								</div>
							</div>
						</div>
						<div class="card-body pt-0">
							<div class="appointment-table table-responsive">
								<table class="table table-bordernone">
									<tbody>
										<tr>
											<td>
												<img class="img-fluid img-40 rounded-circle mb-3" src="{{asset('assets/images/appointment/app-ent.jpg')}}" alt="Image description">
												<div class="status-circle bg-primary"></div>
											</td>
											<td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
											<td>
												<p class="m-0 font-primary">28 Sept</p>
											</td>
											<td class="text-end">
												<div class="button btn btn-primary">Done<i class="fa fa-check-circle ms-2"></i></div>
											</td>
										</tr>
										<tr>
											<td>
												<img class="img-fluid img-40 rounded-circle" src="{{asset('assets/images/appointment/app-ent.jpg')}}" alt="Image description">
												<div class="status-circle bg-primary"></div>
											</td>
											<td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
											<td>
												<p class="m-0 font-primary">22 Sept</p>
											</td>
											<td class="text-end">
												<div class="button btn btn-danger">Pending<i class="fa fa-check-circle ms-2"></i></div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-12 alert-sec">
					<div class="card bg-img">
						<div class="card-header">
							<div class="header-top">
								<h5 class="m-0">Alert  </h5>
								<div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
							</div>
						</div>
						<div class="card-body">
							<div class="body-bottom">
								<h6>  10% off For drama lights Couslations...</h6>
								<span class="font-roboto">Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by  </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-4 xl-50 notification box-col-6">
			<div class="card">
				<div class="card-header card-no-border">
					<div class="header-top">
						<h5 class="m-0">notification</h5>
						<div class="card-header-right-icon">
							<select class="button btn btn-primary">
								<option>Today</option>
								<option>Tomorrow</option>
								<option>Yesterday</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-body pt-0">
					<div class="media">
						<div class="media-body">
							<p>20-04-2020 <span>10:10</span></p>
							<h6>Updated Product<span class="dot-notification"></span></h6>
							<span>Quisque a consequat ante sit amet magna...</span>
						</div>
					</div>
					<div class="media">
						<div class="media-body">
							<p>20-04-2020<span class="ps-1">Today</span><span class="badge badge-secondary">New</span></p>
							<h6>Tello just like your product<span class="dot-notification"></span></h6>
							<span>Quisque a consequat ante sit amet magna... </span>
						</div>
					</div>
					<div class="media">
						<div class="media-body">
							<div class="d-flex mb-3">
								<div class="inner-img"><img class="img-fluid" src="{{asset('assets/images/notification/1.jpg')}}" alt="Product-1"></div>
								<div class="inner-img"><img class="img-fluid" src="{{asset('assets/images/notification/2.jpg')}}" alt="Product-2"></div>
							</div>
							<span class="mt-3">Quisque a consequat ante sit amet magna...</span>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-4 xl-50 appointment box-col-6">
			<div class="card">
				<div class="card-header">
					<div class="header-top">
						<h5 class="m-0">Market Value</h5>
						<div class="card-header-right-icon">
							<select class="button btn btn-primary">
								<option>Year</option>
								<option>Month</option>
								<option>Day</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-Body">
					<div class="radar-chart">
						<div id="marketchart">       </div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-4 xl-100 chat-sec box-col-6">
			<div class="card chat-default">
				<div class="card-header card-no-border">
					<div class="media media-dashboard">
						<div class="media-body">
							<h5 class="mb-0">Live Chat</h5>
						</div>
						<div class="icon-box"><i class="fa fa-ellipsis-h"></i></div>
					</div>
				</div>
				<div class="card-body chat-box">
					<div class="chat">
						<div class="media left-side-chat">
							<div class="media-body d-flex">
								<div class="img-profile"> <img class="img-fluid" src="{{asset('assets/images/user.jpg')}}" alt="Profile"></div>
								<div class="main-chat">
									<div class="message-main"><span class="mb-0">Hi deo, Please send me link.</span></div>
									<div class="sub-message message-main"><span class="mb-0">Right Now</span></div>
								</div>
							</div>
							<p class="f-w-400">7:28 PM</p>
						</div>
						<div class="media right-side-chat">
							<p class="f-w-400">7:28 PM</p>
							<div class="media-body text-end">
								<div class="message-main pull-right">
									<span class="mb-0 text-start">How can do for you</span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="media left-side-chat">
							<div class="media-body d-flex">
								<div class="img-profile"> <img class="img-fluid" src="{{asset('assets/images/user.jpg')}}" alt="Profile"></div>
								<div class="main-chat">
									<div class="sub-message message-main mt-0"><span>It's argenty</span></div>
								</div>
							</div>
							<p class="f-w-400">7:28 PM</p>
						</div>
						<div class="media right-side-chat">
							<div class="media-body text-end">
								<div class="message-main pull-right"><span class="loader-span mb-0 text-start" id="wave"><span class="dot"></span><span class="dot"></span><span class="dot"></span></span></div>
							</div>
						</div>
						<div class="input-group">
							<input class="form-control" id="mail" type="text" placeholder="Type Your Message..." name="text">
							<div class="send-msg"><i data-feather="send"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		{{-- <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
			<div class="card gradient-primary o-hidden">
				<div class="card-body">
					<div class="setting-dot">
						<div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
					</div>
					<div class="default-datepicker">
						<div class="datepicker-here" data-language="en"></div>
					</div>
					<span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
				</div>
			</div>
		</div> --}}
	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>
@endsection

@section('script')
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>

<h3>Welcome <b><?php echo e(Auth::user()->first_name ?? null); ?>!</b> <br/>You're logged in as a <b><?php echo e(Auth::user()->role_info->role_name ?? null); ?></b></h3>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		
		<?php if(Auth::user()->role_id=="1" ?? null): ?>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments Today</span>


						<h4 class="mb-0 counter">
							<?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()); ?>

							
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
							<?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()); ?>

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
							<?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()); ?>

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
							<?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()); ?>

						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>



<?php elseif(Auth::user()->role_id=="2" ?? null): ?>
<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments Today</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereDay('consumer_data.created_at', Carbon\Carbon::now()->day)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments Today</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">My Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				<?php echo e(DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				->where('user.coordinator_id', '=', Auth::user()->id)
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count()); ?></h4>
				
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>



 
 <?php elseif(Auth::user()->role_id=="3" ?? null): ?>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments Today</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereDay('consumer_data.created_at', Carbon\Carbon::now()->day)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments Today</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					<?php echo e(DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					// ->where('user.coordinator_id', '=', Auth::user()->id)
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count()); ?>

				</h4>
				
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
		  
			 <div class="media-body">
				<span class="m-0">All Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				<?php echo e(DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				// ->where('user.coordinator_id', '=', Auth::user()->id)
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count()); ?></h4>
				
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter"><?php echo e(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()); ?></h4>
				
			 </div>
		  
	   </div>
	</div>
 </div>
 <?php endif; ?>
		
		
		
		

			
			<?php if(Auth::user()->role_id=="1" ?? null): ?>
			<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
							<h4>&#8358; <?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
							<span>Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div>



		
		<?php elseif(Auth::user()->role_id=="2" ?? null): ?>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								
								<?php echo e(number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2)); ?>

								
							<span class="new-box"></span></h4>
							<span>My Agents' Earnings Today</span>
						</div>
					</div>
				</div>
<hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
								<?php echo e(number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2)); ?>

							</h4>
							<span>My Agents' Earnings This Week</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
								<?php echo e(number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2)); ?>

								</h4>
							<span>My Agents' Earnings This Month</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
								<?php echo e(number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								// ->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2)); ?>

								</h4>
							<span>My Agents' Total Earnings </span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; <?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
							<span>My Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div>





<?php elseif(Auth::user()->role_id=="3" ?? null): ?>

<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card">
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;
						<?php echo e(number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2)); ?>

						
					<span class="new-box"></span></h4>
					<span>My Agents' Earnings Today</span>
				</div>
			</div>
		</div>
<hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
						<?php echo e(number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2)); ?>

					</h4>
					<span>My Agents' Earnings This Week</span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
						<?php echo e(number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2)); ?>

						</h4>
					<span>My Agents' Earnings This Month</span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358;<?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
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
						<?php echo e(number_format(DB::table('consumer_data')
						->selectRaw('SUM(consumer_data.commission) as cons')
						// ->where('user.coordinator_id', '=', Auth::user()->id)
						// ->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
						->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
						->value('cons'), 2)); ?>

						</h4>
					<span>My Agents' Total Earnings </span>
				</div>
			</div>
		</div><hr/>
		<div class="card-body">
			<div class="media align-items-center">
				<div class="media-body right-chart-content">
					<h4>&#8358; <?php echo e(number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)); ?><span class="new-box"></span></h4>
					<span>My Total Earnings </span>
				</div>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>
		
		
		
		
		
		
	</div>
</div>
<script type="text/javascript">
	var session_layout = '<?php echo e(session()->get('layout')); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/dashboard/index.blade.php ENDPATH**/ ?>
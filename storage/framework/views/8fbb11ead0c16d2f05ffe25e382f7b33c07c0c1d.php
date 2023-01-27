<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Welcome <b><?php echo e(Auth::user()->first_name); ?>!</b></h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">Enrolments Today</span>
						<h4 class="mb-0 counter">6659</h4>
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
						<span class="m-0">Enrolments This Week</span>
						<h4 class="mb-0 counter">893</h4>
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
						<span class="m-0">Enrolments This Week</span>
						<h4 class="mb-0 counter">45631</h4>
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
					 <div class="align-self-center text-center">Total Enrolments<i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0"></span>
						<h4 class="mb-0 counter">9856</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
		
		
		
		
		<div class="col-xl-4 xl-50 news box-col-6">
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
		</div>
		
		
		
		
		
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
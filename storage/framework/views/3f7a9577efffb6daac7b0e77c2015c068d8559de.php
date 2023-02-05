<?php $__env->startSection('title', 'Default Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Agents</h3>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
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
							<form class="theme-form" action="<?php echo e(route('register_agent.perform')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								
								<?php if(session('success')): ?>
								<div class="alert alert-success dark" role="alert">
								  <?php echo e(@session('success')); ?>  
								</div>
								<?php endif; ?>
								<?php if(session('error')): ?>
								<div class="alert alert-danger dark" role="alert">
								  <?php echo e(@session('error')); ?>  
								</div>
								<?php endif; ?>
								<?php
								// Available alpha caracters
								$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
								
								// generate a pin based on 2 * 7 digits + a random character
								$pin = mt_rand(1000, 9999)
									. mt_rand(1000, 9999)
									. $characters[rand(0, strlen($characters) - 1)];
								
								// shuffle the result
								$string = str_shuffle($pin);
								?>
								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputEmail1">Email address</label>
									<input class="form-control " id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
									<?php if($errors->has('email')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('email')); ?>

									</i>
									<?php endif; ?>
								</div>

								<input class="form-control" id="exampleInputPassword1" type="hidden" name="password" value="<?php echo $string ?>">
								<input class="form-control" id="exampleInputPassword1" type="hidden" name="password_confirmation" value="<?php echo $string ?>">
								

								

								<div class="mb-3">
									<label class="col-form-label pt-0" for="first_name">Firstname</label>
									<input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter Firstname">
									<?php if($errors->has('first_name')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('first_name')); ?>

									</i>
									<?php endif; ?>
								</div>

																
								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Lastname</label>
									<input class="form-control " id="last_name" type="text" name="last_name"  placeholder="Enter Lastname">
									<?php if($errors->has('last_name')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('last_name')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Othernames</label>
									<input class="form-control" id="other_names" type="text" name="other_names"  placeholder="Enter Othernames">
									<?php if($errors->has('other_names')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('other_names')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="phone_number">Phone Number</label>
									<input class="form-control" id="phone_number" type="text" name="phone_number"  placeholder="Phone Number ">
									<?php if($errors->has('phone_number')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('phone_number')); ?>

									</i>
									<?php endif; ?>
								</div>
								

								

								<div class="card-footer">
									<button class="btn btn-primary" type="submit">Submit</button>
									
								</div>

							</form>
						</div>
	
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/user/create-agent.blade.php ENDPATH**/ ?>
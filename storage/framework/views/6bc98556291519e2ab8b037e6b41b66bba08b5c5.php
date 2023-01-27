<?php $__env->startSection('title', 'Default Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Users</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">New User Upload Form</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>New User Upload Form</h5>
							<span>Only an authorized admin is permitted to do this</span>
						</div>
						<div class="card-body">
							<form class="theme-form" action="<?php echo e(route('register.perform')); ?>" method="POST">
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

								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputEmail1">Email address</label>
									<input class="form-control " id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
									<?php if($errors->has('email')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('email')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputPassword1">Password</label>
									<input class="form-control" id="exampleInputPassword1" type="text" name="password" placeholder="Password">
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputPassword1">Confirm Password</label>
									<input class="form-control" id="exampleInputPassword1" type="text" name="password_confirmation" placeholder="Confirm Password">
								</div>

								

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
								<div class="mb-2">
									<div class="col-form-label">Assign Role</div>
									<select class="js-example-basic-single col-sm-12">
										<optgroup label="Roles">
											<?php echo e($roles =  App\Models\Role::select('role_name', 'id')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->id); ?>" ><?php echo e($item->role_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/user/create-user.blade.php ENDPATH**/ ?>
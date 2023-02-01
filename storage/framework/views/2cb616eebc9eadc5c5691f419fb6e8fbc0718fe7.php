<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>

<h3>Edit Profile</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">Edit Profile</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">My Profile</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<?php if(session('status')): ?>
						<div class="alert alert-success dark" role="alert">
					<?php echo e(session('status')); ?>

				</div>
			<?php elseif(session('error')): ?>
			<div class="alert alert-danger dark" role="alert">
					<?php echo e(session('error')); ?>

				</div>
			<?php endif; ?>
						<form method="POST" action="<?php echo e(route('update-password')); ?>">
							<?php echo csrf_field(); ?>
							<div class="row mb-2">
								<div class="profile-title">
									<div class="media">
					

										
										<div class="media-body">
											<h3 class="mb-1"><?php echo e(Auth::user()->last_name); ?> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->middle_name); ?></h3>
											<p><?php echo e(Auth::user()->role_info->role_name); ?></p>
										</div>
									</div>
								</div>
							</div>
							
							<div class="mb-3">
								<label class="form-label">Email-Address</label>
								<input class="form-control" type="text" readonly value="<?php echo e(Auth::user()->email); ?>">
							</div>

							<div class="mb-3">
								<label class="form-label">Phone Number</label>
								<input class="form-control" type="text" readonly value="<?php echo e(Auth::user()->phone_number); ?>">
							</div>

<hr/>
							<div class="mb-3">
								<label class="form-label">Current Password</label>
								<input class="form-control" type="text" name="old_password">
								<?php if($errors->has('old_password')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('old_password')); ?></strong>
								</span>
							<?php endif; ?>
							</div>
							

							<div class="mb-3">
								<label class="form-label">New Password</label>
								<input class="form-control" type="text"  name="new_password">
								<?php if($errors->has('new_password')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('new_password')); ?></strong>
								</span>
							<?php endif; ?>
							</div>

							<div class="mb-3">
								<label class="form-label">Confirm New Password</label>
								<input class="form-control" type="text" name="new_password_confirmation">
								<?php if($errors->has('new_password_confirmation')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('new_password_confirmation')); ?></strong>
								</span>
							<?php endif; ?>
							</div>
							
							<div class="form-footer">
								<button class="btn btn-primary btn-block" type="submit">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/user/edit-profile.blade.php ENDPATH**/ ?>
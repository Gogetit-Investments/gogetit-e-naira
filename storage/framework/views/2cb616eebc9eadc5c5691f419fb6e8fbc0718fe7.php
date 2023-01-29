<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

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
						<form>
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


							<div class="mb-3">
								<label class="form-label">Change Password</label>
								<input class="form-control" type="password" value="password">
							</div>
							
							<div class="form-footer">
								<button class="btn btn-primary btn-block">Update</button>
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
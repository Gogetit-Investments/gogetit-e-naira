<?php $__env->startSection('title', 'Settings'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>

<h3>Settings</h3>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Settings</h4>
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
						<form method="POST" action="<?php echo e(route('settings.update')); ?>">
							<?php echo csrf_field(); ?>

							

							
							<div class="mb-3">
								<label class="form-label">App Name</label>
								<input class="form-control" type="text"  value="<?php echo e(App\Models\Settings::select('app_name')->value('app_name')); ?>">
							</div>

							<div class="mb-3">
								<label class="form-label">CEO Name</label>
								<input class="form-control" type="text"  value="<?php echo e(App\Models\Settings::select('ceo_name')->value('ceo_name')); ?>">
							</div>


							<div class="mb-3">
								<label class="form-label">Referral Code</label>
								<input class="form-control" type="text"  value="<?php echo e(App\Models\Settings::select('referral_code')->value('referral_code')); ?>">
							</div>


							<div class="mb-3">
								<label class="form-label">Agent Commission</label>
								<input class="form-control" type="text"  value="<?php echo e(App\Models\Settings::select('agent_commission')->value('agent_commission')); ?>">
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/{id}.blade.php ENDPATH**/ ?>
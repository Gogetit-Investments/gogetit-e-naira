<?php $__env->startSection('title', 'HTML 5 Data Export'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Consumers</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Consumers</li>
<li class="breadcrumb-item active">Consumer List</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Consumer List</h5>
				</div>
				<div class="card-body">
					<div class="dt-ext table-responsive">
						<table class="display" id="export-button">
							
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
						
							<thead>
								<tr>
									<th>Tier</th>
									<th>BVN</th>
									<th>NIN</th>
									<th>Phone Number</th>
									<th>Name</th>
									<th>Postal Code</th>
									<th>Address</th>
									<th>City</th>
									<th>LGA</th>
									<th>State</th>
									<th>Country of Residence</th>
									<th>DOB</th>
									<th>Country of Birth</th>
									<th>State Of Birth</th>
									<th>Referral Code</th>
									
									<th>Uploaded Date</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $consumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($consumer->tier_info->tier_name ?? null); ?></td>
									<td><?php echo e($consumer->bvn ?? null); ?></td>
									<td><?php echo e($consumer->nin ?? null); ?></td>
									<td><?php echo e($consumer->phone_number ?? null); ?></td>
									<td><?php echo e($consumer->title ?? null); ?> <?php echo e($consumer->last_name ?? null); ?> <?php echo e($consumer->first_name ?? null); ?> <?php echo e($consumer->middle_name ?? null); ?></td>
									<td><?php echo e($consumer->postal_code ?? null); ?></td>
									<td><?php echo e($consumer->contact_address ?? null); ?></td>
									<td><?php echo e($consumer->city ?? null); ?></td>
									<td><?php echo e($consumer->lga_info->lga_of_residence ?? null); ?></td>
									<td><?php echo e($consumer->state_of_residence->state_of_residence ?? null); ?></td>
									<td><?php echo e($consumer->country_info->country_of_residence); ?></td>
									<td><?php echo e($consumer->dob ?? null); ?></td>
									<td><?php echo e($consumer->country_of_origin->country_of_birth ?? null); ?></td>
									<td><?php echo e($consumer->state_of_origin->state_of_birth ?? null); ?></td>
									<td><?php echo e($consumer->referral_code ?? null); ?></td>
									
									
									<td><?php echo e($consumer->created_at ?? null); ?></td>
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No consumers captured yet</td>
								  </tr>
								<?php endif; ?>
								
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
		</div>
		
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/consumer-data/consumer-list.blade.php ENDPATH**/ ?>
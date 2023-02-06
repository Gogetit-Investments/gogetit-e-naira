<?php $__env->startSection('title', 'Default Forms'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>


<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-xl-6">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h5>New Consumer Upload Form</h5>
							<span>Only an authorized admin is permitted to do this</span>
						</div>
						<div class="card-body">
							<form class="theme-form" action="<?php echo e(route('consumer_single.upload')); ?>" method="POST">
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

<div class="mb-2">
	<div class="col-form-label">Tier</div>
	<select class="js-example-basic-single col-sm-12" name="tier_id">
		<optgroup label="Tier">
			<?php echo e($tiers =  App\Models\Tier::select('description', 'code')->get()); ?>

			<?php $__empty_1 = true; $__currentLoopData = $tiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<option value="<?php echo e($item->code); ?>" ><?php echo e($item->description); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<?php endif; ?>
		</optgroup>

	</select>
</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="exampleInputEmail1">BVN</label>
									<input class="form-control " id="exampleInputEmail1" type="text" name="bvn" aria-describedby="emailHelp" placeholder="Enter BVN">
									<?php if($errors->has('bvn')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('bvn')); ?>

									</i>
									<?php endif; ?>
								</div>

								
								

								

								<div class="mb-3">
									<label class="col-form-label pt-0" for="first_name">NIN</label>
									<input class="form-control" id="nin" type="text" name="nin" placeholder="Enter NIN">
									<?php if($errors->has('nin')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('nin')); ?>

									</i>
									<?php endif; ?>
								</div>

																
								<div class="mb-3">
									<label class="col-form-label pt-0" for="phone_number">Phone Number</label>
									<input class="form-control " id="phone_number" type="text" name="phone_number"  placeholder="Enter Phone Number">
									<?php if($errors->has('phone_number')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('phone_number')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Firstname</label>
									<input class="form-control" id="first_name" type="text" name="first_name"  placeholder="Enter Firstname">
									<?php if($errors->has('first_name')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('first_name')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Lastname</label>
									<input class="form-control" id="last_name" type="text" name="last_name"  placeholder="Enter Lastname">
									<?php if($errors->has('last_name')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('last_name')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="last_name">Othernames</label>
									<input class="form-control" id="other_names" type="text" name="middle_name"  placeholder="Enter Othernames">
									<?php if($errors->has('middle_name')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('middle_name')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="dob">Date of Birth</label>
									<input class="form-control" id="dob" type="date" name="dob"  >
									<?php if($errors->has('dob')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('dob')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="contact_address">Contact Address</label>
									<textarea class="form-control" name="contact_address" placeholder="Enter contact address"></textarea>
									
									<?php if($errors->has('contact_address')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('contact_address')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="postal_code">City</label>
									<input class="form-control" id="city" type="text" name="city"  placeholder="Enter City Name">
									<?php if($errors->has('city')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('city')); ?>

									</i>
									<?php endif; ?>
								</div>

								<div class="mb-3">
									<label class="col-form-label pt-0" for="postal_code">Postal Code</label>
									<input class="form-control" id="postal_code" type="text" name="postal_code"  placeholder="Enter Postal Code">
									<?php if($errors->has('postal_code')): ?>
									<i style="color:coral">
										<?php echo e($errors->first('postal_code')); ?>

									</i>
									<?php endif; ?>
								</div>


								
								<div class="mb-2">
									<div class="col-form-label">Title</div>
									<select class="js-example-basic-single col-sm-12" name="title_code">
										<optgroup label="Title">
											<?php echo e($titles =  App\Models\Title::select('description', 'code')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->code); ?>" ><?php echo e($item->description); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
								</div>


								<div class="mb-2">
									<div class="col-form-label">Country</div>
									<select class="js-example-basic-single col-sm-12" name="country">
										<optgroup label="Country">
											<?php echo e($countries =  App\Models\Country::select('country_code', 'country_name')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->country_code); ?>" ><?php echo e($item->country_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
									
								</div>
								

								<div class="mb-2">
									<div class="col-form-label">State</div>
									<select class="js-example-basic-single col-sm-12" name="state_code">
										<optgroup label="State">
											<?php echo e($titles =  App\Models\State::select('state_code', 'state_name')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->state_code); ?>" ><?php echo e($item->state_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
									
								</div>


								<div class="mb-2">
									<div class="col-form-label">LGA</div>
									<select class="js-example-basic-single col-sm-12" name="lga">
										<optgroup label="Lga">
											<?php echo e($lgas =  App\Models\Lga::select('lga_code', 'lga_name')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $lgas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->lga_code); ?>" ><?php echo e($item->lga_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
								</div>






								<div class="mb-2">
									<div class="col-form-label">State of Birth</div>
									<select class="js-example-basic-single col-sm-12" name="state_of_birth">
										<optgroup label="State of Birth">
											<?php echo e($titles =  App\Models\State::select('state_code', 'state_name')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->state_code); ?>" ><?php echo e($item->state_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>

									</select>
								</div>




								<div class="mb-2">
									<div class="col-form-label">Country of Birth</div>
									<select class="js-example-basic-single col-sm-12" name="country_of_birth">
										<optgroup label="Country">
											<?php echo e($countries =  App\Models\Country::select('country_code', 'country_name')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->country_code); ?>" ><?php echo e($item->country_name); ?></option>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/consumer-data/consumer_single-upload.blade.php ENDPATH**/ ?>
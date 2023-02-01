<?php $__env->startSection('title', 'Consumer '); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/dropzone.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Consumers Bulk Upload</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Consumers</li>
<li class="breadcrumb-item active">Bulk Upload</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="form theme-form">
            
            
            
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Upload consumer list</label>
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
                  
                    <form class="theme-form"  action="<?php echo e(route('consumer.upload')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                    
                    <input class="form-control" name="file" type="file"><br/>
                    <div><button class="btn btn-primary btn-block" type="submit">Upload List</button></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dropzone/dropzone-script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/consumer-data/consumer-upload.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'File Manager'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>
<h3>Bulk Onboarding Templates</h3>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
    
      
          
        
    
    <div class="col-xl-9 col-md-12 box-col-12">
      <div class="file-content">
        <div class="card">
          
              
              
            
          <div class="card-body file-manager">
            <h4 class="mb-3">All Files</h4>
            
            
            
            <h6 class="mt-4">Files</h6>
            <ul class="files">
              
              <a href="<?php echo e(asset('assets/Consumer_Bulk_Onboarding_Template.xlsx')); ?>"><li class="file-box">
                <div class="file-top">  <i class="fa fa-file-excel-o txt-success"></i></i></div>
                <div class="file-bottom">
                  <h6>Consumer Bulk Onboarding Template</h6>
                  
                  
                </div>
              </li></a>

              <a href="<?php echo e(asset('assets/Merchant_Bulk_Onboarding_Template.xlsx')); ?>"><li class="file-box">
                <div class="file-top">  <i class="fa fa-file-excel-o txt-success"></i></i></div>
                <div class="file-bottom">
                  <h6>Merchant Bulk Onboarding Template</h6>
                  
                  
                </div>
              </li></a>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon-clipart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/pages/download-template.blade.php ENDPATH**/ ?>
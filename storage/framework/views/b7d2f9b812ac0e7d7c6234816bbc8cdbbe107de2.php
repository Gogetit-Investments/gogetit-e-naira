<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form"  action="<?php echo e(route('login.perform')); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <img  src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt="Gogetit Logo" width="200px"><br/><br/>
                     <h4>Welcome to <?php echo e(App\Models\Settings::select('app_name')->value('app_name')); ?></h4>
                     <p>Enter your email & password to continue</p>
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
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control <?php echo e($errors->has('username') ? 'error' : ''); ?>" type="text" required name="username" placeholder="Enter email">
                                 <!-- Error -->
                                 <?php if($errors->has('username')): ?>
                                 <div class="error">
                                     <?php echo e($errors->first('username')); ?>

                                 </div>
                                 <?php endif; ?>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <a class="link" href="<?php echo e(route('forget-password')); ?>">Forgot password?</a>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div><br/>
                     <h6 >in partnership with:</h6>
                     <div >
                        
                           <img  src="<?php echo e(asset('assets/images/cbn_logo.png')); ?>" alt="CBN Logo" height="100px">
                           
                        
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
<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/authentication/login.blade.php ENDPATH**/ ?>
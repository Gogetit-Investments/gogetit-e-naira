 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Gogetit eNaira Data Agents Portal is a platrofm to promote Nigeria's enaira intiative of the Central Bank of Nigeria">
		<meta name="keywords" content="GEDA, Data Agents, CBN, e-naira, enaira, eNaira, Nigeria, currency, naira, e-cash, cash, central bank, Central Bank of Nigeria, Digital economy, commerce, bitcoin, crypto">
		<meta name="author" content="pixelstrap">
		<link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
		<link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
		<title>Gogetit eNaira Data Agents Portal <?php echo $__env->yieldContent('title'); ?></title>
		<?php echo $__env->make('layouts.errors.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('style'); ?>
	</head>
	<body>
		<!-- Loader starts-->
		<div class="loader-wrapper">
			<div class="loader-index"><span></span></div>
			<svg>
				<defs></defs>
				<filter id="goo">
					<fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
					<fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">    </fecolormatrix>
				</filter>
			</svg>
		</div>
		<!-- Loader ends-->
		<!-- page-wrapper Start-->
		<?php echo $__env->yieldContent('content'); ?>		
		<!-- latest jquery-->
		<?php echo $__env->make('layouts.errors.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
	</body>
</html><?php /**PATH /home/ekta/Documents/0 - Themeforest - Themes/Cuba Theme/Cuba/resources/views/layouts/errors/master.blade.php ENDPATH**/ ?>
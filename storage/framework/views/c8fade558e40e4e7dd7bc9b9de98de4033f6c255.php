<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e(route('dashboard.show')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><a href="/dashboard">Dashboard </a></h6>
                     		
						</div>
					</li>
					
					
					
					

	


					
					<?php if(Auth::user()->role_id=="1"): ?>
						
					
					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>My Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>My Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Consumers</a></li>
		                </ul>
					</li>


					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							<div class="according-menu"><i class=""></i></div>
						</a>
					
					</li>

					<?php else: ?>
					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/user' ? 'active' : ''); ?>" href="#">
							<i data-feather="users"></i><span>Users </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/user' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/user' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('user-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='user' ? 'active' : ''); ?>">User List</a></li>
		                    <li><a href="<?php echo e(route('create.user')); ?>" class="<?php echo e(Route::currentRouteName()=='create-user' ? 'active' : ''); ?>">Create New User</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							<div class="according-menu"><i class=""></i></div>
						</a>
					
					</li>

					<?php endif; ?>
					
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>
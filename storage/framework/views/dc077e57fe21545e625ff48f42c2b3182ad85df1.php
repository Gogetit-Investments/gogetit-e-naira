

<?php if(auth()->check()): ?>
<div class="page-header">
  <div class="header-wrapper row m-0">
    <form class="form-inline search-full col" action="#" method="get">
      <div class="mb-3 w-100">
        <div class="Typeahead Typeahead--twitterUsers">
          <div class="u-posRelative">
            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search GEDA..." name="q" title="" autofocus>
            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
            <i class="close-search" data-feather="x"></i>
          </div>
          <div class="Typeahead-menu"></div>
        </div>
      </div>
    </form>
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="<?php echo e(route('dashboard.show')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt="" width="120px"></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
    </div>
    <div class="left-header col horizontal-wrapper ps-0">
      <ul class="horizontal-menu">
        <h3><?php echo e(App\Models\Settings::select('app_name')->value('app_name')); ?></h3>
        
        
      </ul>
    </div>
    <div class="nav-right col-8 pull-right right-header p-0">
      <ul class="nav-menus">
        
        
        
      
          
          
          

        
        
        
       
        <li class="profile-nav onhover-dropdown p-0 me-0">
          <div class="media profile-media">
            <a href="/edit-profile"><img class="b-r-10" src="<?php echo e(asset('assets/avatar.png')); ?>" alt="">
            <div class="media-body">
              <span><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></span>
              <b><p class="mb-0 font-roboto"><?php echo e(Auth::user()->role_info->role_name ?? null); ?> <i class="middle fa fa-angle-down"></i></p></b>
            </a>
            </div>
          </div>
          <ul class="profile-dropdown onhover-show-div">
            <li><a href="/edit-profile"><i data-feather="user"></i><span>Account </span></a></li>
            
            <li><a href="/logout"><i data-feather="log-in"> </i><span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
    <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName">{{name}}</div>
      </div>
      </div>
    </script>
    <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
  </div>
</div>
<?php else: ?>
<script type="text/javascript">
  window.location = "/login";
</script>
<?php endif; ?><?php /**PATH /Users/victoroseji/Documents/jobs/Cuba/resources/views/layouts/simple/header.blade.php ENDPATH**/ ?>
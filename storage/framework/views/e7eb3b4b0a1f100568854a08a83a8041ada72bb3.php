<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand border-bottom <?php echo e($navClass ?? 'navbar-dark bg-primary'); ?>">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Search form -->
      <form class="navbar-search <?php echo e($searchClass ?? 'navbar-search-light'); ?> form-inline mr-sm-3" id="navbar-search-main">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative input-group-merge">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="<?php echo e(__('Search')); ?>" type="text">
          </div>
        </div>
        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </form>
      <!-- Navbar links -->
      <ul class="navbar-nav align-items-center ml-md-auto">
        <li class="nav-item d-xl-none">
          <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </li>
        <li class="nav-item d-sm-none">
          <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
            <i class="ni ni-zoom-split-in"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav align-items-center ml-auto ml-md-0">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="<?php echo e(auth()->user()->name); ?>" src="<?php echo e(config('app.url') . auth()->user()->profilePicture()); ?>">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold"><?php echo e(auth()->user()->name); ?></span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0"><?php echo e(__('Welcome!')); ?></h6>
            </div>
            <a href="<?php echo e(route('member.profile.edit')); ?>" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span><?php echo e(__('My profile')); ?></span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span><?php echo e(__('Calendar')); ?></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span><?php echo e(__('Logout')); ?></span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php /**PATH /home/celine/club-website/resources/views/dashboard/member/layouts/nav/navbar.blade.php ENDPATH**/ ?>
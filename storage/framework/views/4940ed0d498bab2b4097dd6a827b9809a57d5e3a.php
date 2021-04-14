<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner scroll-scrollx_visible">
    <div class="sidenav-header d-flex align-items-center">
      <a class="navbar-brand" href="<?php echo e(route('index')); ?>">
        <img src="<?php echo e(asset('assets/images/web/brand/logo_text.png')); ?>" class="navbar-brand-img" alt="<?php echo e(config('app.nick')); ?>">
      </a>
      <div class="ml-auto">
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-pin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item <?php echo e($elementName == 'dashboard' ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('member.dashboard')); ?>">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text"><?php echo e(__('Dashboard')); ?></span>
            </a>
          </li>
          <li class="nav-item <?php echo e($elementName == 'profile' ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('member.profile.edit')); ?>">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text"><?php echo e(__('Profile')); ?></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/member/layouts/nav/sidebar.blade.php ENDPATH**/ ?>
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
            <a class="nav-link" href="<?php echo e(route('media.dashboard')); ?>">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text"><?php echo e(__('Dashboard')); ?></span>
            </a>
          </li>
          <li class="nav-item <?php echo e($elementName == 'track' ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('media.track.index')); ?>">
              <i class="ni ni-books text-red"></i>
              <span class="nav-link-text"><?php echo e(__('Courses')); ?></span>
            </a>
          </li>
           <li class="nav-item <?php echo e($elementName == 'project' ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('media.project.index')); ?>">
              <i class="ni ni-world-2 text-red"></i>
              <span class="nav-link-text"><?php echo e(__('Student Projects')); ?></span>
            </a>
          </li>
          <li class="nav-item <?php echo e($parentSection == 'helper' ? 'active' : ''); ?>">
            <a class="nav-link" href="#navbar-helper" data-toggle="collapse" role="button" aria-expanded="<?php echo e($parentSection == 'helper' ? 'true' : ''); ?>" aria-controls="navbar-helper">
              <i class="fa fa-cog text-info"></i>
              <span class="nav-link-text"><?php echo e(__('Helper')); ?></span>
            </a>
            <div class="collapse <?php echo e($parentSection == 'helper' ? 'show' : ''); ?>" id="navbar-helper">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item <?php echo e($elementName == 'tag' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('media.tag.index')); ?>" class="nav-link"><?php echo e(__('Tag')); ?></a>
                </li>
                <li class="nav-item <?php echo e($elementName == 'category' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('media.category.index')); ?>" class="nav-link"><?php echo e(__('Category')); ?></a>
                </li>
                <li class="nav-item <?php echo e($elementName == 'venue' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('media.venue.index')); ?>" class="nav-link"><?php echo e(__('Venue')); ?></a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item <?php echo e($parentSection == 'site' ? 'active' : ''); ?>">
            <a class="nav-link" href="#navbar-site" data-toggle="collapse" role="button" aria-expanded="<?php echo e($parentSection == 'site' ? 'true' : ''); ?>" aria-controls="navbar-site">
              <i class="ni ni-single-copy-04 text-success"></i>
              <span class="nav-link-text"><?php echo e(__('Site Management')); ?></span>
            </a>
            <div class="collapse <?php echo e($parentSection == 'site' ? 'show' : ''); ?>" id="navbar-site">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item <?php echo e($elementName == 'workshop' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('media.workshop.index')); ?>" class="nav-link"><?php echo e(__('Events')); ?></a>
                </li>
                <li class="nav-item <?php echo e($elementName == 'story' ? 'active' : ''); ?>">
                  <a href="<?php echo e(route('media.story.index')); ?>" class="nav-link"><?php echo e(__('Stories')); ?></a>
                </li>
              </ul>
            </div>
          </li>
 <li class="nav-item <?php echo e($elementName == 'profile' ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('media.profile.edit')); ?>">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text"><?php echo e(__('Profile')); ?></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php /**PATH C:\Users\mihz\Desktop\club-website\resources\views/dashboard/media/layouts/nav/sidebar.blade.php ENDPATH**/ ?>
<?php $__env->startSection('pageTitle','ækiti - Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <div class="header pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links">
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home"></i></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <div class="text-center text-muted mb-4">
              <small><?php echo e(__('Work In Progress')); ?></small>
            </div>
            <div>
              <?php echo e(__('Please sit tight while we work on your dashboard. In the main time tou can edit you profile at')); ?> <a href="<?php echo e(route('facilitator.profile.edit')); ?>"><?php echo e(route('facilitator.profile.edit')); ?></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', [
  'parentSection' => '',
  'elementName' => 'dashboard'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/facilitator/dashboard.blade.php ENDPATH**/ ?>
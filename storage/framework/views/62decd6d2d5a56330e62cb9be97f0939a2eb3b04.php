<div class="row align-items-center py-4">
  <div class="col-lg-6 col-7">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
      <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="<?php echo e(route('media.dashboard')); ?>"><i class="fas fa-home"></i></a></li>
        <?php echo e($slot); ?>

      </ol>
    </nav>
  </div>
  <?php if(isset($calendar)): ?>
    <?php echo e($calendar); ?>

  <?php endif; ?>
</div><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/communication/layouts/breadcrumbs.blade.php ENDPATH**/ ?>
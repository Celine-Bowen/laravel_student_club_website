<?php if(auth()->guard()->check()): ?>
  <?php echo $__env->make('dashboard.layouts.navbars.navs.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
  <?php echo $__env->make('dashboard.layouts.navbars.navs.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/layouts/navbars/navbar.blade.php ENDPATH**/ ?>
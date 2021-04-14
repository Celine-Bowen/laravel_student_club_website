<?php if(auth()->user()->isLead()): ?>
  <?php echo $__env->make('dashboard.lead.layouts.nav.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(auth()->user()->isMedia()): ?>
  <?php echo $__env->make('dashboard.media.layouts.nav.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php elseif(auth()->user()->isCommunication()): ?>
  <?php echo $__env->make('dashboard.communication.layouts.nav.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
  <?php echo $__env->make('dashboard.member.layouts.nav.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>
<?php if(auth()->user()->isLead()): ?>
<?php echo $__env->make('dashboard.lead.layouts.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(auth()->user()->isMedia()): ?>
<?php echo $__env->make('dashboard.media.layouts.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(auth()->user()->isCommunication()): ?>
<?php echo $__env->make('dashboard.communication.layouts.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php echo $__env->make('dashboard.member.layouts.breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/layouts/headers/breadcrumbs.blade.php ENDPATH**/ ?>
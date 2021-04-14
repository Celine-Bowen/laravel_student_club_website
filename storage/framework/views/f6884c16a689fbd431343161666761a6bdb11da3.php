<?php if($errors->has($field)): ?>
  <span class="invalid-feedback" role="alert" style="display: block;">
    <strong><?php echo e($errors->first($field)); ?></strong>
  </span>
<?php endif; ?>
<?php /**PATH /home/celine/club-website/resources/views/alerts/feedback.blade.php ENDPATH**/ ?>
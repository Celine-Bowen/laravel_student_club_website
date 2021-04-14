<?php $__env->startSection('pageTitle','CopaTechClub - Course'); ?>
<?php $__env->startSection('pageDescription', 'Learn more with our free resources'); ?>

<?php $__env->startSection('content'); ?>
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title">Share experiences and free resources</h2>
    </header>
    <div class="container">
      <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="col-md-4 col-12" vocab="https://schema.org/" typeof="Course">
            <div class="card course-card" style="width: 22rem;">
              <?php if($track->path() !== "/storage/"): ?>
                <img property="image" class="card-img-top" src="<?php echo e(config('app.url') . $track->path()); ?>" alt="<?php echo e($track->name); ?>">
              <?php endif; ?>
              <div class="card-body">
                <?php $__currentLoopData = $track->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <p class="tagging float-right" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h5 property="name" class="card-title">
                  <?php echo e($track->name); ?><br>
                  <span class="text-muted" style="font-size: 12px"><b>Source</b>: <?php echo e($track->source); ?></span>
                </h5>
                <p property="description" class="card-text"><?php echo e($track->description); ?></p>
                <a property="url" href="<?php echo e($track->link); ?>" class="button float-right" target="_blank">View course</a>
                <meta property="provider" content="<?php echo e($track->source); ?>">
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="col-12">
            <p class="text-center">Anticipate amazing tutorials</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/web/course.blade.php ENDPATH**/ ?>
<?php $__env->startSection('pageTitle','CopaTechClub - Stories'); ?>
<?php $__env->startSection('pageDescription', 'Read our amazing stories'); ?>

<?php $__env->startSection('content'); ?>
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title" style="text-transform: lowercase"><?php echo e(config('app.nick')); ?> stories</h2>
    </header>
    <div class="container">
      <div vocab="https://schema.org/" typeof="BreadcrumbList">
        <?php $__empty_1 = true; $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="card blog-card col-12" property="itemListElement" typeof="ListItem">
            <div class="card-body">
              <?php $__currentLoopData = $story->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="tagging float-right mx-2" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <h5 property="name" class="card-title"><a href="<?php echo e(route('stories.show', $story)); ?>"><?php echo e($story->title); ?></a></h5>
              <p property="description" class="card-text"><?php echo e($story->excerpt); ?></p>
              <meta property="position" content="<?php echo e($story->id); ?>">
              <a property="item" typeof="WebPage" href="<?php echo e(route('stories.show', $story)); ?>" class="button float-right">Read More</a>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-center">Anticipate amazing stories</p>
        <?php endif; ?>
        <div class="d-flex justify-content-center mt-4">
          <?php echo e($stories->links()); ?>

        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/web/stories/blog.blade.php ENDPATH**/ ?>
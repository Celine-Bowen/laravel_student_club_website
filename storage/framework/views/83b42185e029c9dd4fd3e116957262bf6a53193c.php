<?php $__env->startSection('pageTitle','CopaTechClub - Projects'); ?>
<?php $__env->startSection('pageDescription', 'Showcasing CopaTechClub æpps'); ?>

<?php $__env->startSection('content'); ?>
  <section class="mx-4">
    <header class="section-header text-center">
      <h2 class="section-title" style="text-transform: lowercase">Club æpps</h2>
      <p class="header-subtitle">æpps from <?php echo e(config('app.name')); ?> community</p>
    </header>
    <div class="container">
      <?php if($aekitis->count() === 0 & $jaemers->count() === 0 & $others->count() === 0): ?>
        <div class="col-12">
          <p class="text-center">Anticipate amazing projects</p>
        </div>
      <?php elseif($aekitis->count() > 0): ?>
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">Club Developed applications</h3>
          </div>
          <div class="row d-flex justify-content-center">
            <?php $__currentLoopData = $aekitis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aekiti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    <?php if($aekiti->path() !== "/storage/"): ?>
                      <div class="img-top" >
                        <img src="<?php echo e(config('app.url') . $aekiti->path()); ?>" alt="<?php echo e($aekiti->name); ?>">
                      </div>
                    <?php endif; ?>
                    <h5 class="card-title"><?php echo e($aekiti->name); ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      <?php $__currentLoopData = $aekiti->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="tagging" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></p>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                      <p><b>Developed On</b>: <?php echo e(Carbon\Carbon::parse($aekiti->date)->format('l, jS F, Y')); ?></p>
                      <p class="card-text"><?php echo e($aekiti->description); ?></p>
                    </div>
                    <div class="float-right">
                      <?php if($aekiti->youtube !== null): ?>
                        <a href="<?php echo e($aekiti->youtube); ?>" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      <?php endif; ?>
                      <?php if($aekiti->github !== null): ?>
                        <a href="<?php echo e($aekiti->github); ?>" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      <?php endif; ?>
                      <a href="<?php echo e($aekiti->link); ?>" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </section>
      <?php endif; ?>
      <?php if($jaemers->count() > 0): ?>
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">jæmers</h3>
          </div>
          <div class="row d-flex justify-content-center">
            <?php $__currentLoopData = $jaemers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaemer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    <?php if($jaemer->path() !== "/storage/"): ?>
                      <div class="img-top" >
                        <img src="<?php echo e(config('app.url') . $jaemer->path()); ?>" alt="<?php echo e($jaemer->name); ?>">
                      </div>
                    <?php endif; ?>
                    <h5 class="card-title"><?php echo e($jaemer->name); ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      <?php $__currentLoopData = $jaemer->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="tagging" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></p>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                      <p><b>Developed On</b>: <?php echo e(Carbon\Carbon::parse($jaemer->date)->format('l, jS F, Y')); ?></p>
                      <p class="card-text"><?php echo e($jaemer->description); ?></p>
                    </div>
                    <div class="float-right">
                      <?php if($jaemer->youtube !== null): ?>
                        <a href="<?php echo e($jaemer->youtube); ?>" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      <?php endif; ?>
                      <?php if($jaemer->github !== null): ?>
                        <a href="<?php echo e($jaemer->github); ?>" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      <?php endif; ?>
                      <a href="<?php echo e($jaemer->link); ?>" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </section>
      <?php endif; ?>
      <?php if($others->count() > 0): ?>
        <section class="my-2">
          <div class="section-header text-center">
            <h3 class="section-title" style="text-transform: lowercase">others</h3>
          </div>
          <div class="row d-flex justify-content-center">
            <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4 col-12">
                <div class="card project-card" >
                  <div class="cardheader">
                    <?php if($other->path() !== "/storage/"): ?>
                      <div class="img-top" >
                        <img src="<?php echo e(config('app.url') . $other->path()); ?>" alt="<?php echo e($other->name); ?>">
                      </div>
                    <?php endif; ?>
                    <h5 class="card-title"><?php echo e($other->name); ?></h5>
                  </div>
                  <div class="card-body">
                    <div class="project-tag">
                      <?php $__currentLoopData = $other->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="tagging" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></p>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                      <p><b>Developed On</b>: <?php echo e(Carbon\Carbon::parse($other->date)->format('l, jS F, Y')); ?></p>
                      <p class="card-text"><?php echo e($other->description); ?></p>
                    </div>
                    <div class="float-right">
                      <?php if($other->youtube !== null): ?>
                        <a href="<?php echo e($other->youtube); ?>" class="btn btn-flat"><i class="fab fa-youtube"></i></a>
                      <?php endif; ?>
                      <?php if($other->github !== null): ?>
                        <a href="<?php echo e($other->github); ?>" class="btn btn-flat"><i class="fab fa-github"></i></a>
                      <?php endif; ?>
                      <a href="<?php echo e($other->link); ?>" class="btn btn-primary">View project</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </section>
      <?php endif; ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/web/projects.blade.php ENDPATH**/ ?>
<?php $__env->startSection('pageTitle','Copa Tech - Edit Story'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('media.story.index')); ?>"><?php echo e(__('Story Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Story')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Story Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('media.story.edit', $story)); ?>" class="btn btn-sm btn-secondary mr-2"><?php echo e(__('Edit Story')); ?></a>
                <a href="<?php echo e(route('media.story.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php if($story->path() !== "/storage/"): ?>
              <p class="text-center"><img class="img-fluid" src="<?php echo e(config('app.url') . $story->path()); ?>" alt="<?php echo e($story->title); ?>"></p>
            <?php endif; ?>
            <div class="mt-4">
              <div>
                <h1 class="h1"><?php echo e($story->title); ?> - <span class="text-primary" style="text-transform: initial"><?php echo e($story->category->name); ?></span></h1>
              </div>
              <div class="my-5">
                <blockquote class="storyquote mt-2"><p><?php echo e($story->excerpt); ?></p></blockquote>
                <div><?php echo $story->article; ?></div>
                <div class="d-flex justify-content-center mt-5">
                  <?php $__currentLoopData = $story->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-default mx-2" style="background-color:<?php echo e($tag->color); ?>"><?php echo e($tag->name); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php echo $__env->make('dashboard.layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
      document.getElementById('show_date').style.display = <?php echo e($story->status === 'publish' ? 'block' : 'none'); ?>;
    });
    $(function () {
      $('#compose-textarea').summernote()
    })

    function showDate(value){
      if(value === 'publish') {
        document.getElementById('show_date').style.display = 'block';
      } else {
        document.getElementById('show_date').style.display = 'none';
      }
      return;
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Story Management'),
  'parentSection' => 'site',
  'elementName' => 'story'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/media/stories/show.blade.php ENDPATH**/ ?>
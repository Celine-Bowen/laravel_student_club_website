<?php $__env->startSection('pageTitle','Copa Tech - Add Story'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('media.story.index')); ?>"><?php echo e(__('Story Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Story')); ?></li>
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
                <a href="<?php echo e(route('media.story.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="<?php echo e(route('media.story.store')); ?>" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-title"><?php echo e(__('Title')); ?></label>
                  <input type="text" name="title" id="input-title" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title')); ?>" autofocus>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('slug') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-slug"><?php echo e(__('Slug')); ?></label>
                  <input type="text" name="slug" id="input-slug" class="form-control<?php echo e($errors->has('slug') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Slug')); ?>" value="<?php echo e(old('slug')); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'slug'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('category_id') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Category')); ?></label>
                  <select name="category_id" id="input-role" class="form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Category')); ?>">
                    <option value="">-</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id') ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'category_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('excerpt') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-excerpt"><?php echo e(__('Excerpt')); ?></label>
                  <textarea name="excerpt" id="input-excerpt" cols="30" rows="2" class="form-control<?php echo e($errors->has('excerpt') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Excerpt')); ?>" value="<?php echo e(old('excerpt')); ?>"><?php echo e(old('excerpt')); ?></textarea>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'excerpt'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('article') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="compose-textarea"><?php echo e(__('Article')); ?></label>
                  <textarea name="article" id="compose-textarea" class="form-control<?php echo e($errors->has('article') ? ' is-invalid' : ''); ?>"><?php echo e(old('article')); ?></textarea>
                  <?php echo $__env->make('alerts.feedback', ['field' => 'article'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="pick-image"><?php echo e(__('Story Picture')); ?></label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" id="pick-image" accept="image/*">
                    <label class="custom-file-label" for="pick-image"><?php echo e(__('Select Story Picture')); ?></label>
                  </div>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('tags') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Tags')); ?></label>
                  <select name="tags[]" id="input-role" class="form-control select2<?php echo e($errors->has('tags') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Tags')); ?>" data-toggle="select" multiple>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($tag->id); ?>" <?php echo e(in_array($tag->id, old('tags') ?? []) ? 'selected' : ''); ?>><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'tags'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Status')); ?></label>
                  <?php $__currentLoopData = config('aekiti.stories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="custom-control custom-radio mb-3">
                      <input name="status" class="custom-control-input" id="<?php echo e($value); ?>" value="<?php echo e($value); ?>" type="radio" <?php echo e(old('status') == $value ? ' checked' : ''); ?> onclick="showDate('<?php echo e($value); ?>')">
                      <label class="custom-control-label" for="<?php echo e($value); ?>"><?php echo e($status); ?></label>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="row" id="show_date">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="published_date">Published Date</label>
                      <input class="form-control datepicker" name="published_date" id="published_date" placeholder="Select published date" type="text" data-date-format="dd-mm-yyyy" value="<?php echo e(old('published_date', now()->format('d-m-Y'))); ?>">
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php echo $__env->make('dashboard.layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard/plugins/select2/dist/js/select2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
      document.getElementById('show_date').style.display = 'none';
    });
    $(function () {
      $('#compose-textarea').summernote({height: 250})
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
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/media/stories/create.blade.php ENDPATH**/ ?>
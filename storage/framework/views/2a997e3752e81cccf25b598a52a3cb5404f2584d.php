<?php $__env->startSection('pageTitle','ækiti - Edit Track'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('lead.track.index')); ?>"><?php echo e(__('Track Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Track')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Track Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('lead.track.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="<?php echo e(route('lead.track.update', $track)); ?>" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                  <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $track->name)); ?>" required autofocus>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('source') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-source"><?php echo e(__('Source')); ?></label>
                  <input type="text" name="source" id="input-source" class="form-control<?php echo e($errors->has('source') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Source')); ?>" value="<?php echo e(old('source', $track->source)); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'source'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('link') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-link"><?php echo e(__('Link')); ?></label>
                  <input type="url" name="link" id="input-link" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e(old('link', $track->link)); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Description')); ?>" value="<?php echo e(old('description')); ?>"><?php echo e(old('description', $track->description)); ?></textarea>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-picture"><?php echo e(__('Picture')); ?></label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" id="input-picture" accept="image/*">
                    <label class="custom-file-label" for="input-picture"><?php echo e(__('Select picture')); ?></label>
                  </div>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('tags') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Tags')); ?></label>
                  <select name="tags[]" id="input-role" class="form-control select2<?php echo e($errors->has('tags') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Tags')); ?>" data-toggle="select" multiple>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($tag->id); ?>" <?php echo e(in_array($tag->id, old('tags', $track->tags->pluck('id')->toArray()) ?? []) ? 'selected' : ''); ?>><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'tags'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/css/select2.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Track Management'),
  'parentSection' => 'site',
  'elementName' => 'track'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/lead/tracks/edit.blade.php ENDPATH**/ ?>
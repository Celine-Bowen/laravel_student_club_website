<?php $__env->startSection('pageTitle','Copa Tech - Edit Workshop'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('media.workshop.index')); ?>"><?php echo e(__('Workshop Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Workshop')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Workshop Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('media.workshop.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="<?php echo e(route('media.workshop.update', $workshop)); ?>" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-title"><?php echo e(__('Title')); ?></label>
                  <input type="text" name="title" id="input-title" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title', $workshop->title)); ?>"  autofocus>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('venue_id') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Venue')); ?></label>
                  <select name="venue_id" id="input-role" class="form-control<?php echo e($errors->has('venue_id') ? ' is-invalid' : ''); ?>" >
                    <option value=""><?php echo e(__('Select Venue')); ?></option>
                    <?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($venue->id); ?>" <?php echo e($venue->id == old('venue_id', $workshop->venue_id) ? 'selected' : ''); ?>><?php echo e($venue->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'venue_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('excerpt') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-excerpt"><?php echo e(__('Excerpt')); ?></label>
                  <textarea name="excerpt" id="input-excerpt" cols="30" rows="2" class="form-control<?php echo e($errors->has('excerpt') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Excerpt')); ?>" value="<?php echo e(old('excerpt')); ?>"><?php echo e(old('excerpt', $workshop->excerpt)); ?></textarea>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'excerpt'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="compose-textarea"><?php echo e(__('Description')); ?></label>
                  <textarea name="description" id="compose-textarea" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" style="height: 300px" <?php echo e(__('Description')); ?>><?php echo e(old('description', $workshop->description)); ?></textarea>
                  <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('image') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="pick-image"><?php echo e(__('Picture')); ?></label>
                  <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" id="pick-image" accept="image/*">
                    <label class="custom-file-label" for="pick-image"><?php echo e(__('Select picture')); ?></label>
                  </div>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('tags') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-tags"><?php echo e(__('Tags')); ?></label>
                  <select name="tags[]" id="input-tags" class="form-control select2<?php echo e($errors->has('tags') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Tags')); ?>" data-toggle="select"  multiple>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($tag->id); ?>" <?php echo e(in_array($tag->id, old('tags', $workshop->tags->pluck('id')->toArray()) ?? []) ? 'selected' : ''); ?>><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'tags'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('status') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-status"><?php echo e(__('Status')); ?></label>
                  <select name="status" id="input-status" class="form-control<?php echo e($errors->has('status') ? ' is-invalid' : ''); ?>" >
                    <option value=""><?php echo e(__('Select Status')); ?></option>
                    <?php $__currentLoopData = config('aekiti.workshops.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value); ?>" <?php echo e($value == old('status', $workshop->status) ? 'selected' : ''); ?>><?php echo e($status); ?>(<?php echo e($value); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('mode') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-mode"><?php echo e(__('Mode')); ?></label>
                  <select name="mode" id="input-mode" class="form-control<?php echo e($errors->has('mode') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Venue')); ?>" >
                    <option value=""><?php echo e(__('Select Mode')); ?></option>
                    <?php $__currentLoopData = config('aekiti.workshops.mode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($value); ?>" <?php echo e($value == old('mode', $workshop->mode) ? 'selected' : ''); ?>><?php echo e($mode); ?>(<?php echo e($value); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'mode'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('link') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-link"><?php echo e(__('Registration Link')); ?></label>
                  <input type="url" name="link" id="input-link" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Registration Link')); ?>" value="<?php echo e(old('link', $workshop->link)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('youtube') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-youtube"><?php echo e(__('Youtube')); ?></label>
                  <input type="url" name="youtube" id="input-youtube" class="form-control<?php echo e($errors->has('youtube') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Youtube')); ?>" value="<?php echo e(old('youtube', $workshop->youtube)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'youtube'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('slide') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-slide"><?php echo e(__('Slide')); ?></label>
                  <input type="url" name="slide" id="input-slide" class="form-control<?php echo e($errors->has('slide') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Slide')); ?>" value="<?php echo e(old('slide', $workshop->slide)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'slide'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-photo"><?php echo e(__('Photo')); ?></label>
                  <input type="url" name="photo" id="input-photo" class="form-control<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Photo')); ?>" value="<?php echo e(old('photo', $workshop->photo)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="start_date">Start Date</label>
                      <input class="form-control date" name="start_date" id="start_date" type="datetime"
                      value="<?php echo e(old('start_date', $workshop->start_date ? \Carbon\Carbon::parse($workshop->start_date)->format('Y/m/d H:i:s') : '')); ?>">

                      <?php echo $__env->make('alerts.feedback', ['field' => 'start_time'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="end_date">End Date</label>
                      <input class="form-control date" name="end_date" id="end_date" type="datetime" value="<?php echo e(old('end_date', $workshop->end_date ? \Carbon\Carbon::parse($workshop->end_date)->format('Y/m/d H:i:s') : '')); ?>">

                      <?php echo $__env->make('alerts.feedback', ['field' => 'end_time'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.css')); ?>">
  
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bootstrap/datetimepicker/js/moment.js')); ?>"></script>
  
  

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
    $(function () {
      $('#compose-textarea').summernote();
    });
  </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Workshop Management'),
  'parentSection' => 'site',
  'elementName' => 'workshop'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/media/workshops/edit.blade.php ENDPATH**/ ?>
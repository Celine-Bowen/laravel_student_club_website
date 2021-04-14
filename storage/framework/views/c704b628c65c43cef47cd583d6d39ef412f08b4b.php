<?php $__env->startSection('pageTitle','Copa Tech - Edit Project'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('lead.project.index')); ?>"><?php echo e(__('Project Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Project')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Project Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('lead.project.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="<?php echo e(route('lead.project.update', $project)); ?>" autocomplete="off" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('put'); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                  <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $project->name)); ?>"  autofocus>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('category_id') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Category')); ?></label>
                  <select name="category_id" id="input-role" class="form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Category')); ?>" >
                    <option value="">-</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id', $project->category_id) ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'category_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('link') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-link"><?php echo e(__('Link')); ?></label>
                  <input type="url" name="link" id="input-link" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e(old('link', $project->link)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('github') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-github"><?php echo e(__('Github')); ?></label>
                  <input type="url" name="github" id="input-github" class="form-control<?php echo e($errors->has('github') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Github')); ?>" value="<?php echo e(old('github', $project->github)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'github'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('youtube') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-youtube"><?php echo e(__('Youtube')); ?></label>
                  <input type="url" name="youtube" id="input-youtube" class="form-control<?php echo e($errors->has('youtube') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Youtube')); ?>" value="<?php echo e(old('youtube', $project->youtube)); ?>">

                  <?php echo $__env->make('alerts.feedback', ['field' => 'youtube'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Description')); ?>" value="<?php echo e(old('description')); ?>"><?php echo e(old('description', $project->description)); ?></textarea>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-name"><?php echo e(__('Picture')); ?></label>
                  <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" id="input-picture" accept="image/*">
                    <label class="custom-file-label" for="input-picture"><?php echo e(__('Select picture')); ?></label>
                  </div>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('tags') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Tags')); ?></label>
                  <select name="tags[]" id="input-role" class="form-control select2<?php echo e($errors->has('tags') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Tags')); ?>" data-toggle="select"  multiple>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($tag->id); ?>" <?php echo e(in_array($tag->id, old('tags', $project->tags->pluck('id')->toArray()) ?? []) ? 'selected' : ''); ?>><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'tags'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="input-role"><?php echo e(__('Show on homepage')); ?></label>
                  <div class="custom-field">
                    <label class="custom-toggle">
                      <input name="show_on_homepage" type="checkbox" value="1" <?php echo e(old('show_on_homepage', $project->show_on_homepage) ? ' checked=checked' : ''); ?>>
                      <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="date">Date</label>
                      <input class="form-control datepicker" name="date" id="date"
                      placeholder="Select date" type="text" data-date-format="dd-mm-yyyy"
                      value="<?php echo e(old('date', $project->date
                      ? \Carbon\Carbon::parse($project->date)->format('d-m-Y') : '')); ?>">
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
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/quill/dist/quill.core.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/select2/dist/js/select2.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/quill/dist/quill.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/js/items.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Project Management'),
  'parentSection' => 'site',
  'elementName' => 'project'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/lead/projects/edit.blade.php ENDPATH**/ ?>
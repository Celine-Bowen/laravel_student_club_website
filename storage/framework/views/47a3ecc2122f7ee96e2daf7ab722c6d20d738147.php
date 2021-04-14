<?php $__env->startSection('pageTitle','Copa Tech - Add Team Member'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('lead.team.index')); ?>"><?php echo e(__('Team Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Team Member')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Team Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('lead.team.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" class="item-form" action="<?php echo e(route('lead.team.store')); ?>" autocomplete="off">
              <?php echo csrf_field(); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Item information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('user_id') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="select-user"><?php echo e(__('User')); ?></label>
                  <select name="user_id" id="select-user" class="form-control<?php echo e($errors->has('user_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('User')); ?>" autofocus>
                    <option value="">-</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == old('user_id') ? 'selected' : ''); ?>><?php echo e($user->name); ?> - <?php echo e($user->email); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'user_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('title') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-title"><?php echo e(__('Title')); ?></label>
                  <input type="text" name="title" id="input-title" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title')); ?>">
                  <?php echo $__env->make('alerts.feedback', ['field' => 'title'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-description"><?php echo e(__('Description')); ?></label>
                  <textarea name="description" id="input-description" cols="30" rows="2" class="form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Description')); ?>" value="<?php echo e(old('description')); ?>"><?php echo e(old('description')); ?></textarea>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('twitter') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-twitter"><?php echo e(__('Twitter')); ?></label>
                  <input type="url" name="twitter" id="input-twitter" class="form-control<?php echo e($errors->has('twitter') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Twitter')); ?>" value="<?php echo e(old('twitter')); ?>">
                  <?php echo $__env->make('alerts.feedback', ['field' => 'twitter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('github') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-github"><?php echo e(__('Github')); ?></label>
                  <input type="url" name="github" id="input-github" class="form-control<?php echo e($errors->has('github') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Github')); ?>" value="<?php echo e(old('github')); ?>">
                  <?php echo $__env->make('alerts.feedback', ['field' => 'github'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('telegram') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-telegram"><?php echo e(__('Telegram')); ?></label>
                  <input type="url" name="telegram" id="input-telegram" class="form-control<?php echo e($errors->has('telegram') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Telegram')); ?>" value="<?php echo e(old('telegram')); ?>">
                  <?php echo $__env->make('alerts.feedback', ['field' => 'telegram'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  <script src="<?php echo e(asset('assets/dashboard')); ?>/js/items.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Team Management'),
  'parentSection' => 'users',
  'elementName' => 'team'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/lead/teams/create.blade.php ENDPATH**/ ?>
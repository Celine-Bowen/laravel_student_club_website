<?php $__env->startSection('pageTitle','Copa Tech - Edit User'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('media.user.index')); ?>"><?php echo e(__('User Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit User')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0"><?php echo e(__('Edit User')); ?></h3>
                </div>
                <div class="col-4 text-right">
                  <a href="<?php echo e(route('media.user.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="<?php echo e(route('media.user.update', $user)); ?>" autocomplete="off" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <h6 class="heading-small text-muted mb-4"><?php echo e(__('User information')); ?></h6>
                <div class="pl-lg-4">
                  <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                    <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', $user->name)); ?>"  required autofocus>

                    <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-email"><?php echo e(__('Email')); ?></label>
                    <input type="email" name="email" id="input-email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email', $user->email)); ?>" required>

                    <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="form-group<?php echo e($errors->has('role_id') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-role"><?php echo e(__('Role')); ?></label>
                    <select name="role_id" id="input-role" class="form-control<?php echo e($errors->has('role_id') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Role')); ?>" required>
                      <option value="">-</option>
                      <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == old('role_id', $user->role->id) ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php echo $__env->make('alerts.feedback', ['field' => 'role_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-name"><?php echo e(__('Profile photo')); ?></label>
                    <div class="custom-file">
                      <input type="file" name="photo" class="custom-file-input<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" id="input-picture" accept="image/*">
                      <label class="custom-file-label" for="input-picture"><?php echo e(__('Select profile photo')); ?></label>
                    </div>

                    <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                    <label class="form-control-label" for="input-password"><?php echo e(__('Password')); ?></label>
                    <input type="password" name="password" id="input-password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Password')); ?>" value="">

                    <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="input-password-confirmation"><?php echo e(__('Confirm Password')); ?></label>
                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" value="">
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

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Edit User'),
  'parentSection' => 'users',
  'elementName' => 'user'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/media/users/edit.blade.php ENDPATH**/ ?>
<?php $__env->startSection('pageTitle','Copa Tech - User Profile'); ?>

<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('dashboard.layouts.headers.header', [
    'title' => __('Hello') . ' '. auth()->user()->name,
    'description' => __('Welcome to your profile page.'),
    'class' => 'col-lg-12'
  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="<?php echo e(asset('assets/images/web/brand/logo_text.png')); ?>" alt="<?php echo e(config('app.nick')); ?>" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            <img src="<?php echo e(config('app.url') . auth()->user()->profilePicture()); ?>" class="rounded-circle">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="h3">
                        <?php echo e(auth()->user()->name); ?><span class="font-weight-light">, <?php echo e(auth()->user()->id); ?></span>
                    </h5>
                    <div class="h5 font-weight-300">
                        <?php echo e(auth()->user()->email); ?>

                    </div>
                    <div class="h5 mt-4">
                      <?php echo e(auth()->user()->role->name); ?>

                    </div>
                    
                </div>
            </div>
        </div>
        
      </div>
      <div class="col-xl-8 order-xl-1">
        
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><?php echo e(__('Edit Profile')); ?></h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#!" class="btn btn-sm btn-primary"><?php echo e(__('Settings')); ?></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo e(route('lead.profile.update')); ?>" autocomplete="off"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <h6 class="heading-small text-muted mb-4"><?php echo e(__('User information')); ?></h6>

                    <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('alerts.error_self_update', ['key' => 'not_allow_profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="pl-lg-4">
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name', auth()->user()->name)); ?>" required autofocus>

                            <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-email"><?php echo e(__('Email')); ?></label>
                            <input type="email" name="email" id="input-email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>

                            <?php echo $__env->make('alerts.feedback', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('photo') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-name"><?php echo e(__('Profile photo')); ?></label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>" id="input-picture" accept="image/*">
                                <label class="custom-file-label" for="input-picture"><?php echo e(__('Select profile photo')); ?></label>
                            </div>

                            <?php echo $__env->make('alerts.feedback', ['field' => 'photo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                </form>
                <hr class="my-4" />
                <form method="post" action="<?php echo e(route('lead.profile.password')); ?>" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>

                    <h6 class="heading-small text-muted mb-4"><?php echo e(__('Password')); ?></h6>

                    <?php echo $__env->make('alerts.success', ['key' => 'password_status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('alerts.error_self_update', ['key' => 'not_allow_password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="pl-lg-4">
                        <div class="form-group<?php echo e($errors->has('old_password') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-current-password"><?php echo e(__('Current Password')); ?></label>
                            <input type="password" name="old_password" id="input-current-password" class="form-control<?php echo e($errors->has('old_password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Current Password')); ?>" value="" required>

                            <?php echo $__env->make('alerts.feedback', ['field' => 'old_password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-danger' : ''); ?>">
                            <label class="form-control-label" for="input-password"><?php echo e(__('New Password')); ?></label>
                            <input type="password" name="password" id="input-password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('New Password')); ?>" value="" required>

                            <?php echo $__env->make('alerts.feedback', ['field' => 'password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-password-confirmation"><?php echo e(__('Confirm New Password')); ?></label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="<?php echo e(__('Confirm New Password')); ?>" value="" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4"><?php echo e(__('Change password')); ?></button>
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

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('User Profile'),
  'navClass' => 'navbar-light bg-secondary',
  'parentSection' => '',
  'elementName' => 'profile'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\club-website\resources\views/dashboard/lead/profile/edit.blade.php ENDPATH**/ ?>
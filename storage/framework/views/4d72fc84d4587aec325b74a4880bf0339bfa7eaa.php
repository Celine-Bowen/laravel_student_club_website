<?php $__env->startSection('pageTitle','Copa Tech - Add Venue'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('media.venue.index')); ?>"><?php echo e(__('Venue Management')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Add Venue')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-12 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Venue Management')); ?></h3>
              </div>
              <div class="col-4 text-right">
                <a href="<?php echo e(route('media.venue.index')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Back to list')); ?></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo e(route('media.venue.store')); ?>" autocomplete="off">
              <?php echo csrf_field(); ?>

              <h6 class="heading-small text-muted mb-4"><?php echo e(__('Venue information')); ?></h6>
              <div class="pl-lg-4">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-name"><?php echo e(__('Name')); ?></label>
                  <input type="text" name="name" id="input-name" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e(old('name')); ?>" required autofocus>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('address') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-address"><?php echo e(__('Address')); ?></label>
                  <input type="text" name="address" id="input-address" class="form-control<?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Address')); ?>" value="<?php echo e(old('address')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'address'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('locality') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-locality"><?php echo e(__('Locality')); ?></label>
                  <input type="text" name="locality" id="input-locality" class="form-control<?php echo e($errors->has('locality') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Locality')); ?>" value="<?php echo e(old('locality')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'locality'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('postal') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-postal"><?php echo e(__('Postal')); ?></label>
                  <input type="text" name="postal" id="input-postal" class="form-control<?php echo e($errors->has('postal') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Postal')); ?>" value="<?php echo e(old('postal')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'postal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('region') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-region"><?php echo e(__('Region')); ?></label>
                  <input type="text" name="region" id="input-region" class="form-control<?php echo e($errors->has('region') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Region')); ?>" value="<?php echo e(old('region')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'region'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('country') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-country"><?php echo e(__('Country')); ?></label>
                  <input type="text" name="country" id="input-country" class="form-control<?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Country')); ?>" value="<?php echo e(old('country')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'country'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('link') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-link"><?php echo e(__('Link')); ?></label>
                  <input type="url" name="link" id="input-link" class="form-control<?php echo e($errors->has('link') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e(old('link')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'link'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="form-group<?php echo e($errors->has('map') ? ' has-danger' : ''); ?>">
                  <label class="form-control-label" for="input-map"><?php echo e(__('Map')); ?></label>
                  <input type="url" name="map" id="input-map" class="form-control<?php echo e($errors->has('map') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__('Map')); ?>" value="<?php echo e(old('map')); ?>" required>

                  <?php echo $__env->make('alerts.feedback', ['field' => 'map'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
  'title' => __('Add Venue'),
  'parentSection' => 'helper',
  'elementName' => 'venue'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/dashboard/media/venues/create.blade.php ENDPATH**/ ?>
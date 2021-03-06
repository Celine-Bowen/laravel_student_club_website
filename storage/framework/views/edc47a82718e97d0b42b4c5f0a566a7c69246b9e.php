<?php $__env->startSection('pageTitle','Copa Tech - courses'); ?>

<?php $__env->startSection('content'); ?>
  <?php $__env->startComponent('dashboard.layouts.headers.auth'); ?>
    <?php $__env->startComponent('dashboard.layouts.headers.breadcrumbs'); ?>
      <li class="breadcrumb-item"><a href="<?php echo e(route('member.track.index')); ?>"><?php echo e(__('courses')); ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('List')); ?></li>
    <?php echo $__env->renderComponent(); ?>
  <?php echo $__env->renderComponent(); ?>

  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0"><?php echo e(__('Free Resources/courses')); ?></h3>
                <p class="text-sm mb-0">
                  <?php echo e(__(' learning for free with a wide range of free online courses')); ?>

                </p>
              </div>
             
            </div>
          </div>

          <div class="col-12 mt-2">
            <?php echo $__env->make('alerts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('alerts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>

          <div class="table-responsive py-4">
            <table class="table align-items-center table-flush"  id="datatable-basic">
              <thead class="thead-light">
                <tr>
                  <th scope="col"><?php echo e(__('Picture')); ?></th>
                  <th scope="col"><?php echo e(__('Name')); ?></th>
                  <th scope="col"><?php echo e(__('Source')); ?></th>
                  <th scope="col"><?php echo e(__('Tags')); ?></th>
                  <th scope="col"><?php echo e(__('Creation Date')); ?></th>
                  <th scope="col"><?php echo e(__('views')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php if($track->path() !== "/storage/"): ?>
                        <span class="avatar avatar-sm rounded-circle">
                          <img src="<?php echo e(config('app.url') . $track->path()); ?>" alt="<?php echo e($track->name); ?>" style="max-width: 100px; border-radiu: 25px">
                        </span>
                      <?php else: ?>
                        No Picture
                      <?php endif; ?>
                    </td>
                    <td><?php echo e($track->name); ?></td>
                    <td><a href="<?php echo e($track->link); ?>" target="_blank"><?php echo e($track->source); ?></a></td>
                    <td>
                      <?php $__currentLoopData = $track->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-default" style="background-color:<?php echo e($tag->color); ?>"><?php echo e($tag->name); ?></span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($track->created_at->format('l, M d, Y')); ?></td>
                    <td><a href="<?php echo e($track->link); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                   
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php echo $__env->make('dashboard.layouts.footers.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.app', [
  'title' => __('Track Management'),
  'parentSection' => 'site',
  'elementName' => 'track'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/celine/club-website/resources/views/dashboard/member/tracks/index.blade.php ENDPATH**/ ?>
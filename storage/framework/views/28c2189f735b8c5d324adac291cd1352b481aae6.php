<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <?php echo $__env->make('modules.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('pageTitle', config('app.name')); ?></title>

  <?php echo $__env->make('modules.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo e(asset('assets/dashboard')); ?>/plugins/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo e(asset('assets/dashboard')); ?>/plugins/@fontawesome/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/pace.css')); ?>">
  <?php echo $__env->yieldPushContent('css'); ?>

  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo e(asset('assets/dashboard')); ?>/css/argon.css" rel="stylesheet">
</head>
<body class="<?php echo e($class ?? ''); ?>">
  <?php if(auth()->guard()->check()): ?>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
      <?php echo csrf_field(); ?>
    </form>

    <?php echo $__env->make('dashboard.layouts.navbars.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <div class="main-content">
    <?php echo $__env->make('dashboard.layouts.navbars.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <?php if(auth()->guard()->guest()): ?>
    <?php echo $__env->make('dashboard.layouts.footers.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

  <script src="<?php echo e(asset('assets/js/plugins/pace.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/js-cookie/js.cookie.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/lavalamp/js/jquery.lavalamp.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/plugins/chart.js/dist/Chart.extension.js"></script>

  <?php echo $__env->yieldPushContent('js'); ?>

  <!-- dashboard JS -->
  <script src="<?php echo e(asset('assets/dashboard')); ?>/js/argon.js"></script>
  <script src="<?php echo e(asset('assets/dashboard')); ?>/js/demo.min.js"></script>

  <script>
    async function share(title, url, text) {
      $("#share-loader").show();
      if (window.Windows) {
        const DataTransferManager = window.Windows.ApplicationModel.DataTransfer.DataTransferManager;

        const dataTransferManager = DataTransferManager.getForCurrentView();
        dataTransferManager.addEventListener("datarequested", (ev) => {
          const data = ev.request.data;

          data.properties.title = title;
          data.properties.url = url;
          data.setText(text);
        });

        DataTransferManager.showShareUI();

        return true;
      } else if (navigator.share) {
        try {
          await navigator.share({
            title: title,
            url: url,
            text: text,
          });

          return true;
        } catch (err) {
          console.error('There was an error trying to share this content');
          return false;
        }
      }
      $("#share-loader").hide();
    }
  </script>
</body>
</html>
<?php /**PATH C:\Users\mihz\Desktop\club-website\resources\views/dashboard/layouts/app.blade.php ENDPATH**/ ?>
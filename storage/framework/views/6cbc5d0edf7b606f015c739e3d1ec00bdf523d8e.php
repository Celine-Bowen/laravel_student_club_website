<meta name="google-site-verification" content="8GzDQXvdjjclPdOuclBYeUykFzK04HLaGpu_MFQyFXI" />
<meta name="author" content="jeremih"/>
<meta name="publicKey" content="ak_2vJ9zrUWCsZNVd2Q6cYxhmBoEZ1ewTSAhoQ81L9pnTyh2tJBeJ">
<meta name="aens" content="copatechclub.chain">
<meta name="title" content="<?php echo $__env->yieldContent('pageTitle', config('app.name')); ?>">
<meta name="keywords" content=" <?php echo e(config('app.name')); ?>, <?php echo e(config('app.nick')); ?>,"/>
<meta name="description" content="<?php echo $__env->yieldContent('pageDescription', 'A community of techies utilizing technologies'); ?>">
<link rel="canonical" href="<?php echo e(config('app.url')); ?>" />

<?php echo $__env->make('modules.schema', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Facebook -->
<meta property="fb:page_id" content="370238310268309" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo e(url()->current()); ?>" />
<meta property="og:title" content="<?php echo $__env->yieldContent('pageTitle', config('app.name')); ?>" />
<meta property="og:description" content="<?php echo $__env->yieldContent('pageDescription', 'A community of techies utilizing technologies'); ?>" />
<meta property="og:image" content="<?php echo $__env->yieldContent('pageImage', config('app.url').'/assets/images/icons/icon-512x512.png'); ?>" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:alt" content="<?php echo e(config('app.nick')); ?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo e(url()->current()); ?>">
<meta name="twitter:site" content="@copatechclub">
<meta name="twitter:creator" content="@jeremih">
<meta name="twitter:title" content="<?php echo $__env->yieldContent('pageTitle', config('app.name')); ?>">
<meta name="twitter:description" content="<?php echo $__env->yieldContent('pageDescription', 'A community of techies utilizing technologies'); ?>">
<meta name="twitter:image:src" content="<?php echo $__env->yieldContent('pageImage', config('app.url').'/assets/images/icons/icon-512x512.png'); ?>">
<meta name="twitter:image:alt" content="<?php echo e(config('app.nick')); ?>"><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/modules/seo.blade.php ENDPATH**/ ?>
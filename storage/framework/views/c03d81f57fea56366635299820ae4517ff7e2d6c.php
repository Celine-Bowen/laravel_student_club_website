<?php $__env->startSection('pageTitle'); ?>
  <?php echo e(config('app.nick')); ?> stories: <?php echo e($story->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageDescription'); ?>
  <?php echo e($story->excerpt); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageImage'); ?>
  <?php echo e($story->path() !== '/storage/' ? config('app.url') . $story->path() :  config('app.url').'/assets/images/icons/icon-512x512.png'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Article",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>"
    },
    "headline": "<?php echo e($story->title); ?>",
    "articleSection": "<?php echo e($story->category->name); ?>",
    "keywords": "<?php $__currentLoopData = $story->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "description": "<?php echo e($story->excerpt); ?>",
    "sameAs": "<?php echo e(url()->current()); ?>",
    "image": "<?php echo e($story->path() !== '/storage/' ? config('app.url') . $story->path() :  config('app.url').'/assets/images/icons/icon-512x512.png'); ?>",
    "dateCreated": "<?php echo e($story->created_at->format('c')); ?>",
    "datePublished": "<?php echo e(Carbon\Carbon::parse($story->published_date)->format('c')); ?>",
    "dateModified": "<?php echo e($story->updated_at->format('c')); ?>",
    "author": {
      "@type": "Organization",
      "name": "<?php echo e(config('app.name')); ?>"
    },
     "publisher": {
      "@type": "Organization",
      "name": "<?php echo e(config('app.name')); ?>",
      "alternateName": "<?php echo e(config('app.nick')); ?>",
      "logo": {
        "@type": "ImageObject",
        "text": "<?php echo e(config('app.nick')); ?>",
        "url": "https://aekiti.com/assets/images/icons/icon-512x512.png"
      }
    }
  }
  </script>

  <style>
    .storyquote {
      background: #fff;
      border-left: 3px solid #f3256a;
      margin: 1.5em 10px;
      padding: 0.5em 10px;
      quotes: "\201C""\201D""\2018""\2019";
    }
    .storyquote:before {
      color: #f3256a;
      content: open-quote;
      font-size: 4em;
      line-height: 0.1em;
      margin-right: 0.25em;
      vertical-align: -0.4em;
    }
    .storyquote p {
      display: inline;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <section class="mx-4">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9">
          <?php if($story->path() !== "/storage/"): ?>
          <p class="text-center"><img class="img-fluid" src="<?php echo e(config('app.url') . $story->path()); ?>" alt="<?php echo e($story->title); ?>"></p>
          <?php endif; ?>

          <div class="mt-4">
            <div>
              <h3 class="section-title"><?php echo e($story->title); ?> - <span class="text-primary" style="text-transform: initial"><?php echo e($story->category->name); ?></span></h3>
            </div>
            <?php echo $socialshare; ?>

            <div class="my-5">
              <blockquote class="storyquote mt-2"><p><?php echo e($story->excerpt); ?></p></blockquote>
              <div><?php echo $story->article; ?></div>
              <div class="d-flex justify-content-center mt-5">
                <?php $__currentLoopData = $story->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="tagging float-right mx-2" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-3">
        <h4 class="section-title text-center">Recent Stories</h4>
        <div class="row d-flex justify-content-center">
          <?php $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <div class="card blog-card my-2" property="itemListElement" typeof="ListItem">
                <meta property="position" content="<?php echo e($item->id); ?>">
                <div class="card-body">
                  <h4 property="name" class="card-title text-center"><?php echo e($item->title); ?></h4>
                  <div class="my-3">
                    <?php $__currentLoopData = $item->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <span class="tagging mx-2" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div>
                    <div property="description" class="card-text my-3"><?php echo e($item->excerpt); ?></div>
                    <a property="item" typeof="WebPage" href="<?php echo e(route('stories.show', $item)); ?>" class="button float-right">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="<?php echo e(asset('assets/js/plugins/share.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/web/stories/story.blade.php ENDPATH**/ ?>
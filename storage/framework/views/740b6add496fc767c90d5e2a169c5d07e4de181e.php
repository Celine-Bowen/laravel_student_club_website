<?php $__env->startSection('pageTitle'); ?>
  <?php echo e(config('app.nick')); ?> workshops: <?php echo e($workshop->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageDescription'); ?>
  <?php echo e($workshop->excerpt); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageImage'); ?>
  <?php echo e($workshop->path() !== '/storage/' ? config('app.url') . $workshop->path() :  config('app.url').'/assets/images/icons/icon-512x512.png'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Event",
    "name": "<?php echo e($workshop->title); ?>",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>"
    },
    "startDate": "<?php echo e(Carbon\Carbon::parse($workshop->start_date)->format('c')); ?>",
    "endDate": "<?php echo e(Carbon\Carbon::parse($workshop->end_date)->format('c')); ?>",
    "identifier": "<?php $__currentLoopData = $workshop->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "sameAs": "<?php echo e(url()->current()); ?>",
    "image": "<?php echo e($workshop->path() !== '/storage/' ? config('app.url') . $workshop->path() :  config('app.url').'/assets/images/icons/icon-512x512.png'); ?>",
    "description": "<?php echo e($workshop->excerpt); ?>",
    "eventAttendanceMode": "<?php $__currentLoopData = config('aekiti.workshops.mode'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $mode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($workshop->mode === $value ? $mode : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "eventStatus": "<?php $__currentLoopData = config('aekiti.workshops.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($workshop->status === $value ? $status : ''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "location": {
      "@type": "Place",
      "name": "<?php echo e($workshop->venue->name); ?>",
      "sameAs": "<?php echo e($workshop->venue->link); ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo e($workshop->venue->address); ?>",
        "addressLocality": "<?php echo e($workshop->venue->locality); ?>",
        "postalCode": "<?php echo e($workshop->venue->postal); ?>",
        "addressRegion": "<?php echo e($workshop->venue->region); ?>",
        "addressCountry": "<?php echo e($workshop->venue->country); ?>"
      }
    },
    "offers": {
      "@type": "Offer",
      "url": "<?php echo e(url()->current()); ?>",
      "price": "0",
      "priceCurrency": "USD",
      "availability": "https://schema.org/InStock",
      "validFrom": "<?php echo e($workshop->created_at); ?>"
    },
    "performer": {
      "@type": "PerformingGroup",
      "name": "<?php echo e(config('app.nick')); ?> team"
    },
    "organizer": {
      "@type": "Organization",
      "name": "<?php echo e(config('app.name')); ?>(<?php echo e(config('app.nick')); ?>)",
      "url": "<?php echo e(config('app.url')); ?>"
    }
  }
  </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <section class="mx-4">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-md-1">
          <?php if($workshop->path() !== "/storage/"): ?>
            <div class="text-center">
              <img class="img-fluid" src="<?php echo e(config('app.url') . $workshop->path()); ?>" alt="<?php echo e($workshop->title); ?>">
            </div>
          <?php endif; ?>
          <div class="mt-4">
            <div>
              <h3 class="section-title text-wrap">
                <?php echo e($workshop->title); ?>

                <?php $__currentLoopData = $workshop->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="tagging float-right" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </h3>
              <br>
              <div class="my-2">
                <ul class="nav nav-tabs nav-justified">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#description">Description</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#resources">Resources</a>
                  </li>
                  <li class="nav-item">
                    <?php if($workshop->link !== null && ($workshop->status === 'ongoing' || $workshop->status === 'postponed')): ?>
                      <a class="nav-link" href="<?php echo e($workshop->link); ?>" target="_blank">Register</a>
                    <?php elseif($workshop->link !== null && $workshop->status === 'past'): ?>
                      <a class="nav-link text-muted" style="cursor: not-allowed" href="#">Registration closed!</a>
                    <?php elseif($workshop->link === null): ?>
                      <a class="nav-link text-muted" style="cursor: not-allowed" href="#">Registration unavailable!</a>
                    <?php endif; ?>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-4">
                  <div class="tab-pane container active" id="description">
                    <?php echo $socialshare; ?>

                    <div class="my-4"><?php echo $workshop->description; ?></div>
                  </div>
                  <div class="tab-pane container text-center fade" id="resources">
                    <?php if($workshop->youtube === null & $workshop->slide === null): ?>
                      <p>No Extra Resources</p>
                    <?php elseif($workshop->youtube !== null): ?>
                      <h3><a href="<?php echo e($workshop->youtube); ?>" target="_blank" rel="noopener">YouTube</a></h3>
                      <div class="my-2">
                        <iframe width="500" height="274" data-urllink="<?php echo e($workshop->youtube); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    <?php endif; ?>
                    <?php if($workshop->slide !== null): ?>
                      <h3><a href="<?php echo e($workshop->slide); ?>" target="_blank" rel="noopener">Slide</a></h3>
                      <div class="my-4">
                        <iframe data-urllink="<?php echo e($workshop->slide); ?>" frameborder="0" width="480" height="299" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 order-md-2">
          <div class="card mb-4">
            <div class="card-body">
              <div class="card-text mb-4">
                <?php $__currentLoopData = config('aekiti.workshops.status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($workshop->status === $value): ?>
                    <p class="text-center h4 bold" style="text-transform: capitalize"><?php echo e($value); ?> Event</p>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="d-flex card-text my-4">
                <div class="mr-3"><i class="far fa-2x fa-calendar-alt text-success"></i></div>
                <div>
                  <?php if($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple'): ?>
                    <?php echo e(Carbon\Carbon::parse($workshop->start_date)->format('jS M')); ?> - <?php echo e(Carbon\Carbon::parse($workshop->end_date)->format('jS M, Y')); ?>

                  <?php else: ?>
                    <?php echo e(Carbon\Carbon::parse($workshop->start_date)->format('l, jS F, Y')); ?>

                  <?php endif; ?>
                  <br>
                  <?php if($workshop->mode === 'online_multiple' || $workshop->mode === 'offline_multiple'): ?>
                    <?php echo e(Carbon\Carbon::parse($workshop->start_date)->format('h:iA')); ?> - <?php echo e(Carbon\Carbon::parse($workshop->end_date)->format('h:iA')); ?> (WAT)
                  <?php else: ?>
                    <?php echo e(Carbon\Carbon::parse($workshop->start_date)->format('h:iA')); ?> - <?php echo e(Carbon\Carbon::parse($workshop->end_date)->format('h:iA')); ?> (WAT)
                  <?php endif; ?>
                  <?php if($workshop->status !== 'past'): ?>
                    <div class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add to Calender</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e($calendar->google()); ?>" target="blank">Google</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e($calendar->ics()); ?>" target="blank">iCal</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e($calendar->yahoo()); ?>" target="blank">Yahoo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e($calendar->webOutlook()); ?>" target="blank">Outlook</a>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="d-flex card-text">
                <div class="mr-3"><i class="fa fa-2x fa-map-marker-alt text-danger"></i></div>
                <div>
                  <p>
                    <strong><a href="<?php echo e($workshop->venue->link); ?>" target="_blank"><?php echo e($workshop->venue->name); ?></a></strong><br>
                    <?php echo e($workshop->venue->address); ?><br>
                    <?php echo e($workshop->venue->locality); ?><br>
                    <?php echo e($workshop->venue->postal); ?>

                  </p>
                </div>
              </div>
              <iframe src="<?php echo e($workshop->venue->map); ?>" width="100%" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false"></iframe>
            </div>
          </div>
          <?php if($workshop->id !== $latest->id): ?>
            <div class="my-4">
              <h4 class="section-title text-center">Latest Event</h4>
              <div class="card my-2">
                <div class="card-body">
                  <h4 class="card-title text-center mb-3"><?php echo e($latest->title); ?></h4>
                  <div>
                    <?php $__currentLoopData = $latest->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="tagging float-right" style="background-color:<?php echo e($tag->color); ?>; color:#fff;"><?php echo e($tag->name); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-text my-3"><?php echo e($latest->excerpt); ?></div>
                    <a href="<?php echo e(route('workshop.show', $latest)); ?>" class="button float-right">See Event</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="<?php echo e(asset('assets/js/plugins/share.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/web/workshop.blade.php ENDPATH**/ ?>
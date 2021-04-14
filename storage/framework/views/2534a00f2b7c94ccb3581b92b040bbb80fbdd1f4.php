<?php $__env->startComponent('mail::message'); ?>
### Hello <?php echo e($user->name); ?>!

Welcome to <?php echo e(config('app.name')); ?>. You have successfuly registered as a member of <?php echo e(config('app.nick')); ?> with <?php echo e($user->email); ?> as your email address.

#### Next Step
* Verify Your Email Address through the verification email,
* Complete your profile,
* Connect & Learn with us.

Regrads,<br>
<?php echo e(config('app.nick')); ?> team.

<?php $__env->startComponent('mail::subcopy'); ?>
  Connect with us<br>
  <a href="https://github.com/"><img src="https://copatechclub.com/assets/images/icons/social/github.png" alt="GitHub"></a> <a href="https://twitter.com/"><img src="https://copatechclub.com/assets/images/icons/social/twitter.png" alt="Twitter"></a> <a href="https://www.youtube.com/channel/"><img src="https://copatechclub.com/assets/images/icons/social/youtube.png" alt="YouTube"></a> <a href="https://telegram.me/"><img src="https://copatechclub.com/assets/images/icons/social/telegram.png" alt="Telegram"></a>
<?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\mihz\Desktop\aekiti\resources\views/modules/mail/emails/web/welcome.blade.php ENDPATH**/ ?>
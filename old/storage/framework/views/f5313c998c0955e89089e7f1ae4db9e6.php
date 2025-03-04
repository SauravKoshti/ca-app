<?php $__env->startComponent('mail::message'); ?>
# Happy <?php echo e($type); ?> <?php echo e($user->name); ?>! 🎉

Dear <?php echo e($user->name); ?>,

We wish you a very happy <?php echo e($type); ?> filled with joy, love, and success. 

<?php switch($type):
    case ('Birthday'): ?>
        May this year bring you happiness and prosperity. 🎂🎁
        <?php break; ?>
    <?php case ('Anniversary'): ?>
        Wishing you another year of love and togetherness. 💕🎉
        <?php break; ?>
<?php endswitch; ?>

<?php $__env->startComponent('mail::button', ['url' => url('/')]); ?>
Visit Our Website
<?php echo $__env->renderComponent(); ?>

Best wishes,  
**<?php echo e(config('app.name')); ?> Team**
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/ca-app/resources/views/email/birthday_anniversary.blade.php ENDPATH**/ ?>
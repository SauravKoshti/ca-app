<!DOCTYPE html>
<html>
<head>
    <title>Happy <?php echo e($type); ?>!</title>
</head>
<body>
    <h2>Dear <?php echo e($user->first_name); ?>,</h2>
    <p>We wish you a very Happy <?php echo e($type); ?>! 🎉🎂🎊</p>
    <p>Have a wonderful day ahead!</p>
    <p>Best Regards,<br> Your Company</p>
</body>
</html>
<?php /**PATH /var/www/html/ca-app/resources/views/birthday_anniversary.blade.php ENDPATH**/ ?>
<!-- Fonts and icons -->
<script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
    WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ["<?php echo e(asset('assets/css/fonts.min.css')); ?>"]
        },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/kaiadmin.min.css')); ?>">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>">
<?php /**PATH /var/www/html/ca-app/resources/views/admin/layout/css.blade.php ENDPATH**/ ?>
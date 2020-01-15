<?php if(core()->getCurrentChannel()->status == 'Online' || auth()->guard('admin')->user()): ?>
    <!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

    <title><?php echo e(core()->getCurrentChannel()->business_name ?? 'My Webstore Space'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(bagisto_asset('css/shop.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(bagisto_asset('css/style.css')); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <?php if($favicon = core()->getCurrentChannel()->favicon): ?>
        <link rel="icon" sizes="16x16" href="<?php echo e(asset('storage/' . $favicon)); ?>" />
    <?php else: ?>
        <link rel="icon" sizes="16x16" href="<?php echo e(bagisto_asset('images/favicon.ico')); ?>" />
    <?php endif; ?>

    <?php echo $__env->yieldContent('head'); ?>

    <?php $__env->startSection('seo'); ?>
        <meta name="description" content="<?php echo e(core()->getCurrentChannel()->description); ?>"/>
    <?php echo $__env->yieldSection(); ?>

    <?php echo $__env->yieldPushContent('css'); ?>

    <?php echo view_render_event('bagisto.shop.layout.head'); ?>


    
    <style>
        .footer {
            background-color: <?php echo e('#'.core()->getColorPicker()->footer_bg); ?> !important;
        }
        .list-group a {
            color: <?php echo e('#'.core()->getColorPicker()->footer_text); ?> !important;
        }
        .btn-primary {
            background-color: <?php echo e('#'.core()->getColorPicker()->footer_button); ?> !important;
        }
        .list-heading {
            color: <?php echo e('#'.core()->getColorPicker()->footer_title); ?> !important;
        }
        .addtocart {
            background: <?php echo e('#'.core()->getColorPicker()->cart_button_bg); ?> !important;
            color: <?php echo e('#'.core()->getColorPicker()->cart_button_text); ?> !important;
        }

        .nav a {
            color: <?php echo e('#'.core()->getColorPicker()->top_menu_text); ?> !important;
        }
        .nav a:hover {
            color: <?php echo e('#'.core()->getColorPicker()->top_menu_hover); ?> !important;
        }

        .header .header-bottom {
            background: <?php echo e('#'.core()->getColorPicker()->top_menu_bg); ?> !important;
        }
        .link, .hyperlink, .remove-filter-link, .completed, .checkout-process .col-main ul.checkout-steps li.active {
            color: <?php echo e('#'.core()->getColorPicker()->hyperlinks); ?> !important;
        }
        input:focus, select:focus {
            border-color: <?php echo e('#'.core()->getColorPicker()->hyperlinks); ?> !important;
        }
        .decorator {
            border: 1px solid <?php echo e('#'.core()->getColorPicker()->hyperlinks); ?> !important;
        }
        .menu-block .menubar li.active a {
            color: <?php echo e('#'.core()->getColorPicker()->hyperlinks); ?> !important;
        }
        .tabs ul li.active a {
            border-bottom: 3px solid <?php echo e('#'.core()->getColorPicker()->hyperlinks); ?> !important;
        }

    </style>

</head>

<body <?php if(app()->getLocale() == 'ar'): ?>class="rtl"<?php endif; ?>>

<?php echo view_render_event('bagisto.shop.layout.body.before'); ?>


<div id="app">
    <flash-wrapper ref='flashes'></flash-wrapper>

    <div class="main-container-wrapper">

        <?php echo view_render_event('bagisto.shop.layout.header.before'); ?>


        <?php if(core()->getCurrentChannel()->status == 'Maintenance Mode' || core()->getCurrentChannel()->status == 'Opening Soon' && auth()->guard('admin')->user()): ?>
            <?php echo $__env->make('shop::mode.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="space"></div>
            <div class="space"></div>
            <div class="space"></div>
        <?php endif; ?>
        <?php echo $__env->make('shop::layouts.header.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo view_render_event('bagisto.shop.layout.header.after'); ?>


        <?php echo $__env->yieldContent('slider'); ?>

        <div class="content-container">

            <?php echo view_render_event('bagisto.shop.layout.content.before'); ?>


            <?php echo $__env->yieldContent('content-wrapper'); ?>

            <?php echo view_render_event('bagisto.shop.layout.content.after'); ?>


        </div>

    </div>

    <?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


    <?php echo $__env->make('shop::layouts.footer.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>


    <div class="footer-bottom">
        <custom-footer  credit="<?php echo e(core()->getCurrentChannel()->footer_credit); ?>"></custom-footer>
    </div>

</div>
<script type="text/javascript">
    window.flashMessages = [];

    <?php if($success = session('success')): ?>
        window.flashMessages = [{'type': 'alert-success', 'message': "<?php echo e($success); ?>" }];
    <?php elseif($warning = session('warning')): ?>
        window.flashMessages = [{'type': 'alert-warning', 'message': "<?php echo e($warning); ?>" }];
    <?php elseif($error = session('error')): ?>
        window.flashMessages = [{'type': 'alert-error', 'message': "<?php echo e($error); ?>" }
    ];
    <?php elseif($info = session('info')): ?>
        window.flashMessages = [{'type': 'alert-info', 'message': "<?php echo e($info); ?>" }
    ];
    <?php endif; ?>

        window.serverErrors = [];
    <?php if(isset($errors)): ?>
        <?php if(count($errors)): ?>
        window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
    <?php endif; ?>
    <?php endif; ?>
</script>


<script>
    window.announcekit = (window.announcekit || { queue: [], on: function(n, x) { window.announcekit.queue.push([n, x]); }, push: function(x) { window.announcekit.queue.push(x); } });
    window.announcekit.push({
        "widget": "https://announcekit.app/widget/48CcJq",
        "selector": ".announcekit-widget",
        "version": 2,

        // Style config for badge:
        badge: {
            style: {
                position: "absolute",
                top: "12px"
            }
        }
    })
</script>
<script async src="https://cdn.announcekit.app/widget.js"></script>

<script type="text/javascript" src="<?php echo e(bagisto_asset('js/shop.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo view_render_event('bagisto.shop.layout.body.after'); ?>


<div class="modal-overlay"></div>

</body>

</html>
<?php elseif(core()->getCurrentChannel()->status == 'Maintenance Mode'): ?>
    <?php echo $__env->make('shop::mode.maintenance', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(core()->getCurrentChannel()->status == 'Opening Soon'): ?>
    <?php echo $__env->make('shop::mode.opening-soon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

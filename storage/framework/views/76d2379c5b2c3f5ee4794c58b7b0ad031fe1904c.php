<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>

    <title><?php echo e($page->meta_title); ?></title>
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
        <meta name="description" content="<?php echo e($page->meta_description); ?>"/>
        <meta name="keywords" content="<?php echo e($page->meta_keywords); ?>">
    <?php echo $__env->yieldSection(); ?>

    <?php echo $__env->yieldPushContent('css'); ?>

    <?php echo view_render_event('bagisto.shop.layout.head'); ?>

    <style>
        .breadcrumb {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .breadcrumb > span {
            text-transform: capitalize;
            border-bottom: solid 1px #a2a2a2;
            display: inline-block;
            padding-bottom: 7px;
        }
    </style>
</head>

<body <?php if(app()->getLocale() == 'ar'): ?>class="rtl"<?php endif; ?>>

<?php echo view_render_event('bagisto.shop.layout.body.before'); ?>


<div id="app">
    <flash-wrapper ref='flashes'></flash-wrapper>

    <div class="main-container-wrapper">

        <?php echo view_render_event('bagisto.shop.layout.header.before'); ?>


        <?php echo $__env->make('shop::layouts.header.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo view_render_event('bagisto.shop.layout.header.after'); ?>


        <?php echo $__env->yieldContent('slider'); ?>

        <h3><div class="breadcrumb">
                <span class=""><?php echo e($page->name); ?></span>
            </div></h3>
        <div class="content-container">
            <?php echo $page->content; ?>

        </div>

    </div>

    <?php echo view_render_event('bagisto.shop.layout.footer.before'); ?>


    <?php echo $__env->make('shop::layouts.footer.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo view_render_event('bagisto.shop.layout.footer.after'); ?>


    <div class="footer-bottom">
        <custom-footer credit="<?php echo e(core()->getCurrentChannel()->footer_credit); ?>"></custom-footer>
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

<script type="text/javascript" src="<?php echo e(bagisto_asset('js/shop.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo view_render_event('bagisto.shop.layout.body.after'); ?>


<div class="modal-overlay"></div>

</body>

</html>


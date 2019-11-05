<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <title><?php echo $__env->yieldContent('page_title'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">

    <link rel="icon" sizes="16x16" href="<?php echo e(asset('vendor/webkul/ui/assets/images/webstore-favicon-16x16.png')); ?>" />
    
    <style>
        .mce-panel {
            border-radius: 7px !important;
            background-color: #fff !important;
            box-shadow: 0 3px 6px 0 rgba(0,0,0,.05);
        }

        .mce-textbox:focus {
            border-color: #79C142 !important;
        }
        .mce-btn {
            background-color: #fff !important;
        }
        .mce-branding-powered-by {
            background-image: none !important;
            width: 1px !important;
            height: 1px !important;
            border: none !important;
            padding: 1px !important;
        }

        .mce-menu-item-normal.mce-active {
            background-color: #79C142 !important;
        }

        .mce-menu-item.mce-selected {
            background-color: #79C142 !important;
        }

        .mce-menu-item:hover {
            background-color: #79C142 !important;
        }

        .mce-primary button {
            color: #333 !important;

        }
        .mce-primary:hover {
            border: 1px solid #b1b1b1 !important;
        }

        .select2.select2-container {
            width: 70% !important;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('vendor/webkul/admin/assets/css/admin.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/webkul/ui/assets/css/admin-ui.css')); ?>">

    <?php echo $__env->yieldContent('head'); ?>

    <?php echo $__env->yieldContent('css'); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <?php echo view_render_event('bagisto.admin.layout.head'); ?>


</head>

<body style="scroll-behavior: smooth;">
<?php echo view_render_event('bagisto.admin.layout.body.before'); ?>


<div id="app">

    <flash-wrapper ref='flashes'></flash-wrapper>

    <?php echo view_render_event('bagisto.admin.layout.nav-top.before'); ?>


    <?php echo $__env->make('admin::layouts.nav-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo view_render_event('bagisto.admin.layout.nav-top.after'); ?>


    <?php echo view_render_event('bagisto.admin.layout.nav-left.before'); ?>


    <?php echo $__env->make('admin::layouts.nav-left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo view_render_event('bagisto.admin.layout.nav-left.after'); ?>



    <div class="content-container">

        <?php echo view_render_event('bagisto.admin.layout.content.before'); ?>


        <?php echo $__env->yieldContent('content-wrapper'); ?>

        <?php echo view_render_event('bagisto.admin.layout.content.after'); ?>


    </div>

</div>

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

<script type="text/javascript">
    window.flashMessages = [];

    <?php if($success = session('success')): ?>
        window.flashMessages = [{'type': 'alert-success', 'message': "<?php echo e($success); ?>" }];
    <?php elseif($warning = session('warning')): ?>
        window.flashMessages = [{'type': 'alert-warning', 'message': "<?php echo e($warning); ?>" }];
    <?php elseif($error = session('error')): ?>
        window.flashMessages = [{'type': 'alert-error', 'message': "<?php echo e($error); ?>" }];
    <?php elseif($info = session('info')): ?>
        window.flashMessages = [{'type': 'alert-error', 'message': "<?php echo e($info); ?>" }];
    <?php endif; ?>

        window.serverErrors = [];
    <?php if(isset($errors)): ?>
        <?php if(count($errors)): ?>
        window.serverErrors = <?php echo json_encode($errors->getMessages(), 15, 512) ?>;
    <?php endif; ?>
    <?php endif; ?>
</script>

<script type="text/javascript" src="<?php echo e(asset('vendor/webkul/admin/assets/js/admin.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/webkul/ui/assets/js/ui.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select.control[name]').select2({
            minimumResultsForSearch: Infinity,
            width: 'resolve',
            placeholder: 'None'
        })
    })
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo view_render_event('bagisto.admin.layout.body.after'); ?>


<div class="modal-overlay"></div>

<script>
    $(function(){
        document.querySelectorAll('.select2').forEach(element => {
            element.addEventListener('click', function() {
                const options = document.querySelectorAll('.select2-results__option');
                options.forEach(element => {
                    const prevSibling = !!element.previousElementSibling;
                    const nextSibling = !!element.nextElementSibling;
                    const above = !!document.querySelector('.select2-container--above');

                    const below = !!document.querySelector('.select2-container--below');

                    if (prevSibling && nextSibling) {
                        return
                    }
                    if (options.length === 2) {
                        if (!!document.querySelector('.select2-container--below')) {
                            options[1].style.borderRadius = '0 0 7px 7px';
                        } else {
                            options[0].style.borderRadius = '7px 7px 0px 0px';
                        }
                        return;
                    }
                    if (!(prevSibling && !nextSibling)) {
                        if (!(!prevSibling && nextSibling)) {
                            return;
                        }
                        const needsRadius = nextSibling && !!above;
                        if (needsRadius) {
                            element.style.borderRadius = '7px 7px 0px 0px';
                        }
                        if (!needsRadius) {
                            element.style.borderTop = "solid 1px #79c142";
                            element.style.borderRadius = '0 0 0 0';
                        }
                    } else {
                        const needsRadius = prevSibling && below;
                        if (needsRadius) {
                            element.style.borderRadius = '0 0 7px 7px';
                        }
                        if (!needsRadius) {
                            element.style.borderRadius = '0 0 0 0';
                            element.style.borderBottom = "solid 1px #79c142";
                        }
                    }
                });
            })
        });
    });
</script>
</body>
</html>

<?php $__env->startSection('css'); ?>
    <style>
        /* The container */
        .container {
            padding-left: 16px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 19px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 3px;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a green background */
        .container input:checked ~ .checkmark {
            background-color: #79C142;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .container input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        /* Control the padding of the buttons */
        .control-group {
            width: auto;
        }
        /* Control the width of the input field */
        div.wrap-control {
            max-width: none !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<div slot="body">
    <?php echo $__env->make('shop::layouts.footer.social_theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <hr>
    <h3><?php echo e(__('admin::app.settings.footer.social-username')); ?></h3>
    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name"><?php echo e(__('admin::app.settings.footer.social')); ?></label>
            <select type="text" v-validate="'required'" id="social_1" class="control"  onchange="defaultIcon()" name="social_1">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($social); ?>" <?php $__currentLoopData = App\SocialIcon::skip(0)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($socialName->name == $social ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($social); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name"><?php echo e(__('admin::app.settings.footer.username')); ?></label>
            <input type="text" v-validate="'required'" class="control" id="url_1" name="name_1" placeholder="https://" value="<?php echo e(App\SocialIcon::skip(0)->take(1)->get(['url'])[0]->url); ?>"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name"><?php echo e(__('admin::app.settings.footer.social')); ?></label>
            <select type="text" v-validate="'required'" id="social_2" class="control"  onchange="secondName()"  name="social_2">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($social); ?>" <?php $__currentLoopData = App\SocialIcon::skip(1)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($socialName->name == $social ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($social); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name"><?php echo e(__('admin::app.settings.footer.username')); ?></label>
            <input type="text" v-validate="'required'" class="control" id="url_2" name="name_2" placeholder="https://" value="<?php echo e(App\SocialIcon::skip(1)->take(1)->get(['url'])[0]->url); ?>"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name"><?php echo e(__('admin::app.settings.footer.social')); ?></label>
            <select type="text" v-validate="'required'" id="social_3" class="control"  onchange="thirdName()"  name="social_3">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($social); ?>" <?php $__currentLoopData = App\SocialIcon::skip(2)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($socialName->name == $social ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($social); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name"><?php echo e(__('admin::app.settings.footer.username')); ?></label>
            <input type="text" v-validate="'required'" class="control" id="url_3" name="name_3" placeholder="https://" value="<?php echo e(App\SocialIcon::skip(2)->take(1)->get(['url'])[0]->url); ?>"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name"><?php echo e(__('admin::app.settings.footer.social')); ?></label>
            <select type="text" v-validate="'required'" id="social_4" class="control"  onchange="fourthName()"  name="social_4">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($social); ?>" <?php $__currentLoopData = App\SocialIcon::skip(3)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($socialName->name == $social ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($social); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name"><?php echo e(__('admin::app.settings.footer.username')); ?></label>

            <input type="text" v-validate="'required'" class="url control" id="url_4" name="name_4" value="<?php echo e(App\SocialIcon::skip(3)->take(1)->get(['url'])[0]->url); ?>"/>
        </div>
    </div>

    <div class="wrap-control">
        <div class="control-group">
            <label for="first_name"><?php echo e(__('admin::app.settings.footer.social')); ?></label>
            <select type="text" v-validate="'required'" id="social_5" class="control"  onchange="fivethName()"  name="social_5">
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($social); ?>" <?php $__currentLoopData = App\SocialIcon::skip(4)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($socialName->name == $social ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($social); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="control-group last-name">
            <label for="last_name"><?php echo e(__('admin::app.settings.footer.username')); ?></label>
            <input type="text" v-validate="'required'" class="control" id="url_5" name="name_5" value="<?php echo e(App\SocialIcon::skip(4)->take(1)->get(['url'])[0]->url); ?>"/>
        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        
        function defaultIcon() {
            const value = document.getElementById("social_1").value;
            if (value === 'Whatsapp') {
                document.getElementById("url_1").value = "https://wa.me/";
            } else if (value === 'Twitter') {
                document.getElementById("url_1").value = "https://twitter.com/";
            } else if (value === 'Facebook') {
                document.getElementById("url_1").value = "https://facebook.com/";
            } else if (value === 'Instagram') {
                document.getElementById("url_1").value = "https://instagram.com/";
            } else if (value === 'Youtube') {
                document.getElementById("url_1").value = "https://youtube.com/";
            }
        }


        function secondName() {
            const value = document.getElementById("social_2").value;
            if (value === 'Whatsapp') {
                document.getElementById("url_2").value = "https://wa.me/";
            } else if (value === 'Twitter') {
                document.getElementById("url_2").value = "https://twitter.com/";
            } else if (value === 'Facebook') {
                document.getElementById("url_2").value = "https://facebook.com/";
            } else if (value === 'Instagram') {
                document.getElementById("url_2").value = "https://instagram.com/";
            } else if (value === 'Youtube') {
                document.getElementById("url_2").value = "https://youtube.com/";
            }
        }

        function thirdName() {
            const value = document.getElementById("social_3").value;
            if (value === 'Whatsapp') {
                document.getElementById("url_3").value = "https://wa.me/";
            } else if (value === 'Twitter') {
                document.getElementById("url_3").value = "https://twitter.com/";
            } else if (value === 'Facebook') {
                document.getElementById("url_3").value = "https://facebook.com/";
            } else if (value === 'Instagram') {
                document.getElementById("url_3").value = "https://instagram.com/";
            } else if (value === 'Youtube') {
                document.getElementById("url_3").value = "https://youtube.com/";
            }
        }

        function fourthName() {
            const value = document.getElementById("social_4").value;
            if (value === 'Whatsapp') {
                document.getElementById("url_4").value = "https://wa.me/";
            } else if (value === 'Twitter') {
                document.getElementById("url_4").value = "https://twitter.com/";
            } else if (value === 'Facebook') {
                document.getElementById("url_4").value = "https://facebook.com/";
            } else if (value === 'Instagram') {
                document.getElementById("url_4").value = "https://instagram.com/";
            } else if (value === 'Youtube') {
                document.getElementById("url_4").value = "https://youtube.com/";
            }
        }

        function fivethName() {
            const value = document.getElementById("social_5").value;
            if (value === 'Whatsapp') {
                document.getElementById("url_5").value = "https://wa.me/";
            } else if (value === 'Twitter') {
                document.getElementById("url_5").value = "https://twitter.com/";
            } else if (value === 'Facebook') {
                document.getElementById("url_5").value = "https://facebook.com/";
            } else if (value === 'Instagram') {
                document.getElementById("url_5").value = "https://instagram.com/";
            } else if (value === 'Youtube') {
                document.getElementById("url_5").value = "https://youtube.com/";
            }
        }


    </script>
<?php $__env->stopPush(); ?>

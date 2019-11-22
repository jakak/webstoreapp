<h3><?php echo e(__('admin::app.settings.footer.icon-theme')); ?></h3>

<div class="wrap-control">
    <div style="margin-right: -23%;" class="control-group">
        <div class="control-group  container">
            <label class="container list-heading"><?php echo e(__('shop::app.footer.icon-theme.default')); ?>

                <input type="radio" name="radio" <?php echo e(App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'default_icon_theme' ? 'checked' : ''); ?> value="<?php echo e('default_icon_theme / Instagram  <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-whatsapp"></i></span>'); ?>">
                <span class="checkmark"></span>
            </label>
        </div>
        <div id="first_name">
            <span><i class="fab fa-instagram fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-twitter fa-1x"></i>
</span>
            <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(79, 91, 100); margin-right: 15px;" class="fab fa-whatsapp"></i></span>
        </div>
    </div>

    <div class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> <?php echo e(__('shop::app.footer.icon-theme.cute')); ?>

                <input type="radio" name="radio" <?php echo e(App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'cute_icon_theme' ? 'checked' : ''); ?> value="<?php echo e('cute_icon_theme / Instagram  <span><i class="fab fa-instagram-cute" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>'); ?>">
                <span class="checkmark"></span>
            </label>
        </div>
        <span><i class="fab fa-instagram-cute" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter fa-1x"></i>
</span>
        <span><i class="fab fa-facebook-f fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
        <span><i class="fab fa-youtube fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp"></i></span>
    </div>
</div>

<div class="wrap-control">
    <div style="margin-right: -23%;" class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> <?php echo e(__('shop::app.footer.icon-theme.square')); ?>

                <input type="radio" name="radio" <?php echo e(App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'square_icon_theme' ? 'checked' : ''); ?> value="<?php echo e('square_icon_theme / Instagram  <span><i class="fab fa-instagram-square" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-square fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-square fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube-square fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; background: rgb(37, 211, 102); color: #ffffff; margin-right: 15px;" class="fab fa-whatsapp"></i></span>'); ?>">
                <span class="checkmark"></span>
            </label>
        </div>
        <div id="first_name">
            <span><i class="fab fa-instagram-square" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-square fa-1x"></i>
</span>
            <span><i class="fab fa-facebook-square fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
            <span><i class="fab fa-youtube-square fa-1x" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
            <span><i style="font-size: 1.5em; background: rgb(37, 211, 102); color: #ffffff; margin-right: 15px;" class="fab fa-whatsapp"></i></span>

        </div>
    </div>

    <div class="control-group">
        <div class="control-group container">
            <label class="container list-heading"> <?php echo e(__('shop::app.footer.icon-theme.flat')); ?>

                <input type="radio" name="radio" <?php echo e(App\SocialIcon::skip(1)->take(1)->get(['icon_name'])[0]->icon_name == 'flat_icon_theme' ? 'checked' : ''); ?> value="<?php echo e('flat_icon_theme / Instagram  <span><i class="fab fa-instagram-flat fa-1x" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span> / Twitter  <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-flat fa-1x"></i></span> / Facebook  <span><i class="fab fa-facebook-flat fa-1x" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span> / Youtube  <span><i class="fab fa-youtube-flat" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span> / Whatsapp  <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp-flat"></i></span>'); ?>">
                <span class="checkmark"></span>
            </label>
        </div>

        <span><i class="fab fa-instagram-flat" style="font-size: 1.5em; color: rgb(240, 58, 91); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(29, 161, 242); margin-right: 15px;" class="fab fa-twitter-flat"></i>
</span>
        <span><i class="fab fa-facebook-flat" style="font-size: 1.5em; color: rgb(59, 89, 152); margin-right: 15px;"></i></span>
        <span><i class="fab fa-youtube-flat" style="font-size: 1.5em; color: rgb(255, 0, 0); margin-right: 15px;"></i></span>
        <span><i style="font-size: 1.5em; color: rgb(37, 211, 102); margin-right: 15px;" class="fab fa-whatsapp-flat"></i></span>

    </div>
</div>

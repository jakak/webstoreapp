<div slot="body">
    <div class="control-group">
        <label for="footer_credit"><?php echo e(__('admin::app.settings.channels.footer_credit')); ?></label>
        <input type="text" v-validate="'required'" class="control" id="footer_credit" name="footer_credit" value="<?php echo e(old('footer_credit') ?: $channel->footer_credit); ?>">
    </div>

</div>

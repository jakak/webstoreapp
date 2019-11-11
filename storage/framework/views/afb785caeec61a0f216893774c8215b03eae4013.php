<div slot="body">

    <div class="control">
        <div class="control-group">
            <label for="first_name" class="required"><?php echo e(__('admin::app.settings.footer.title')); ?></label>
            <select type="text" v-validate="'required'" class="control" name="content-1">
                
                <option value="none / none / none"
                <?php $__currentLoopData = App\FooterPage::skip(0)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == 'none' ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                >None</option>

                <?php $__currentLoopData = App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page->status != 'Disabled'): ?>
                        <option value="<?php echo e($page->id); ?> / <?php echo e($page->name); ?> / <?php echo e($page->url); ?>"
                        <?php $__currentLoopData = App\FooterPage::skip(0)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == $page->name ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="control">
        <div class="control-group">
            <label for="first_name" class="required"><?php echo e(__('admin::app.settings.footer.title')); ?></label>
            <select type="text" v-validate="'required'" class="control" name="content-2">
                
                <option value="none / none / none"
                <?php $__currentLoopData = App\FooterPage::skip(1)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == 'none' ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                >None</option>

                <?php $__currentLoopData = App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page->status != 'Disabled'): ?>
                        <option value="<?php echo e($page->id); ?> / <?php echo e($page->name); ?> / <?php echo e($page->url); ?>"
                        <?php $__currentLoopData = App\FooterPage::skip(1)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == $page->name ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="control">
        <div class="control-group">
            <label for="first_name" class="required"><?php echo e(__('admin::app.settings.footer.title')); ?></label>
            <select type="text" v-validate="'required'" class="control" name="content-3">
                
                <option value="none / none / none"
                <?php $__currentLoopData = App\FooterPage::skip(2)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == 'none' ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                >None</option>

                <?php $__currentLoopData = App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page->status != 'Disabled'): ?>
                        <option value="<?php echo e($page->id); ?> / <?php echo e($page->name); ?> / <?php echo e($page->url); ?>"
                        <?php $__currentLoopData = App\FooterPage::skip(2)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == $page->name ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="control">
        <div class="control-group">
            <label for="first_name" class="required"><?php echo e(__('admin::app.settings.footer.title')); ?></label>
            <select type="text" v-validate="'required'" class="control" name="content-4">
                
                <option value="none / none / none"
                <?php $__currentLoopData = App\FooterPage::skip(3)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == 'none' ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                >None</option>

                <?php $__currentLoopData = App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page->status != 'Disabled'): ?>
                        <option value="<?php echo e($page->id); ?> / <?php echo e($page->name); ?> / <?php echo e($page->url); ?>"
                        <?php $__currentLoopData = App\FooterPage::skip(3)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == $page->name ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="control">
        <div class="control-group">
            <label for="first_name" class="required"><?php echo e(__('admin::app.settings.footer.title')); ?></label>
            <select type="text" v-validate="'required'" class="control" name="content-5">
                
                <option value="none / none / none"
                <?php $__currentLoopData = App\FooterPage::skip(4)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == 'none' ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                >None</option>

                <?php $__currentLoopData = App\Page::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if($page->status != 'Disabled'): ?>
                        <option value="<?php echo e($page->id); ?> / <?php echo e($page->name); ?> / <?php echo e($page->url); ?>"
                        <?php $__currentLoopData = App\FooterPage::skip(4)->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($footer->name == $page->name ? "selected"  : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        ><?php echo e($page->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

</div>

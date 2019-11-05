<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.categories.edit-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '<?php echo e(url('/admin/dashboard')); ?>';"></i>

                        <?php echo e(__('admin::app.catalog.categories.edit-title')); ?>

                    </h1>
                </div>

            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>
                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'<?php echo e(__('admin::app.catalog.categories.general')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[name]') ? 'has-error' : '']">
                                <label for="name" class="required"><?php echo e(__('admin::app.catalog.categories.name')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="name" name="<?php echo e($locale); ?>[name]" value="<?php echo e(old($locale)['name'] ?: $category->translate($locale)['name']); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.categories.name')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[name]')">{{ errors.first('<?php echo $locale; ?>[name]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('status') ? 'has-error' : '']">
                                <label for="status" class="required"><?php echo e(__('admin::app.catalog.categories.visible-in-menu')); ?></label>
                                <select class="control" v-validate="'required'" id="status" name="status" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.categories.visible-in-menu')); ?>&quot;">
                                    <option value="1" <?php echo e($category->status ? 'selected' : ''); ?>>
                                        <?php echo e(__('admin::app.catalog.categories.yes')); ?>

                                    </option>
                                    <option value="0" <?php echo e($category->status ? '' : 'selected'); ?>>
                                        <?php echo e(__('admin::app.catalog.categories.no')); ?>

                                    </option>
                                </select>
                                <span class="control-error" v-if="errors.has('status')">{{ errors.first('status') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('position') ? 'has-error' : '']">
                                <label for="position" class="required"><?php echo e(__('admin::app.catalog.categories.position')); ?></label>
                                <input type="text" v-validate="'required|numeric'" class="control" id="position" name="position" value="<?php echo e(old('position') ?: $category->position); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.categories.position')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('position')">{{ errors.first('position') }}</span>
                            </div>

                        </div>
                    </accordian>

                    <accordian :title="'<?php echo e(__('admin::app.catalog.categories.description-and-images')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[description]') ? 'has-error' : '']">
                                <label for="description" class="required"><?php echo e(__('admin::app.catalog.categories.description')); ?></label>
                                <textarea v-validate="'required'" class="control" id="description" name="<?php echo e($locale); ?>[description]" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.categories.description')); ?>&quot;"><?php echo e(old($locale)['description'] ?: $category->translate($locale)['description']); ?></textarea>
                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[description]')">{{ errors.first('<?php echo $locale; ?>[description]') }}</span>
                            </div>

                            <div class="control-group">
                                <label><?php echo e(__('admin::app.catalog.categories.image')); ?> </label>

                                <image-wrapper :button-label="'<?php echo e(__('admin::app.catalog.products.add-image-btn-title')); ?>'" input-name="image" :multiple="false" :images='"<?php echo e(asset($category->image_url)); ?>"'></image-wrapper>

                            </div>

                        </div>
                    </accordian>

                    <?php if($categories->count()): ?>
                    <accordian :title="'<?php echo e(__('admin::app.catalog.categories.parent-category')); ?>'" :active="true">
                        <div slot="body">

                            <tree-view value-field="id" name-field="parent_id" input-type="radio" items='<?php echo json_encode($categories, 15, 512) ?>' value='<?php echo json_encode($category->parent_id, 15, 512) ?>'></tree-view>

                        </div>
                    </accordian>
                    <?php endif; ?>

                    <accordian :title="'<?php echo e(__('admin::app.catalog.categories.seo')); ?>'" :active="true">
                        <div slot="body">

                            <div class="control-group">
                                <label for="meta_title"><?php echo e(__('admin::app.catalog.categories.meta_title')); ?></label>
                                <input type="text" class="control" id="meta_title" name="<?php echo e($locale); ?>[meta_title]" value="<?php echo e(old($locale)['meta_title'] ?: $category->translate($locale)['meta_title']); ?>"/>
                            </div>

                            <div class="control-group" :class="[errors.has('<?php echo e($locale); ?>[slug]') ? 'has-error' : '']">
                                <label for="slug" class="required"><?php echo e(__('admin::app.catalog.categories.slug')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="slug" name="<?php echo e($locale); ?>[slug]" value="<?php echo e(old($locale)['slug'] ?: $category->translate($locale)['slug']); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.categories.slug')); ?>&quot;" v-slugify/>
                                <span class="control-error" v-if="errors.has('<?php echo e($locale); ?>[slug]')">{{ errors.first('<?php echo $locale; ?>[slug]') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="meta_description"><?php echo e(__('admin::app.catalog.categories.meta_description')); ?></label>
                                <textarea class="control" id="meta_description" name="<?php echo e($locale); ?>[meta_description]"><?php echo e(old($locale)['meta_description'] ?: $category->translate($locale)['meta_description']); ?></textarea>
                            </div>

                            <div class="control-group">
                                <label for="meta_keywords"><?php echo e(__('admin::app.catalog.categories.meta_keywords')); ?></label>
                                <textarea class="control" id="meta_keywords" name="<?php echo e($locale); ?>[meta_keywords]"><?php echo e(old($locale)['meta_keywords'] ?: $category->translate($locale)['meta_keywords']); ?></textarea>
                            </div>

                        </div>
                    </accordian>

                </div>

                <hr class="horizontal-line">
                <div class="form-bottom">
                    <button type="submit" class="btn btn-md btn-primary">
                        <?php echo e(__('admin::app.catalog.categories.save-btn-title')); ?>

                    </button>
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.configuration.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .d-none {
            display: none;
        }
        .capitalize-tr tr {
            text-transform: capitalize;
        }
        .back-arrow {
            color: #a2a2a2;
            cursor: pointer;
            margin-right: 7px;
        }
        <?php if(strpos(request()->url(), 'smtp') !== false): ?>
            .image-wrapper .image-item {
            width: 100px !important;
            height: 100px !important;
        }
        <?php endif; ?>
        .hr {
            background-color: #79C142;
            border: none;
            height: 2px;
        }
        .payment-footer a{
            color: #3A3A3A;
            margin-top: 7px;
            display: inline-block;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        <?php if(strpos(request()->url(), 'othermethod') !== false): ?>
            <div class="content" id="locationPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            Manage Locations
                        </h1>
                    </div>

                    <div class="page-action">
                        <button id="addLocation" class="btn btn-md btn-primary">
                            Add Location
                        </button>
                    </div>
                </div>

                <div class="page-content capitalize-tr">
                    <?php $locationGrid = app('App\DataGrids\ShippingLocationDataGrid'); ?>
                    <?php echo $locationGrid->render(); ?>

                </div>
            </div>
            <form method="POST" action="<?php echo e(route('admin.configuration.location')); ?>" class="d-none" id="addLocationPage">
                <div class="page-header">

                    <div class="page-title modify">

                        <i class="icon angle-left-icon back-link" onclick="window.history.go(-0);"></i>


                        <h1>
                            <?php echo e(__('admin::app.configuration.title')); ?>

                        </h1>
                    </div>

                </div>
                <div class="page-content">
                    <div class="form-container">
                        <?php echo csrf_field(); ?>

                        <div slot="body">
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Location
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="location" name="location" value="<?php echo e(old('location') ?: $location??null); ?>" data-vv-as="location">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    State
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="state" name="state" value="<?php echo e(old('state') ?: $state??null); ?>" data-vv-as="state">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Country
                                </label>
                                <country></country>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="rate">
                                    Rate
                                </label>
                                <input type="text" required v-validate="'required'" class="control" id="rate" name="rate" value="<?php echo e(old('rate') ?: $rate??null); ?>" data-vv-as="rate">
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Type
                                </label>
                                <select type="text" v-validate="'required'" class="control" id="country" name="type">
                                    <option value="per order">Per Order</option>
                                    <option value="per item">Per Item</option>
                                </select>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="">
                                    Description
                                </label>
                                <textarea v-validate="''" class="control" id="description" name="description" data-vv-as="'description'"><?php echo e(old('description') ?: ''); ?></textarea>
                            </div>
                            <div class="control-group text" :class="">

                                <label for="" class="required" >
                                    Status
                                </label>
                                <select type="text" v-validate="'required'" class="control" id="status" name="status">
                                    <option value="enabled">Enabled</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            <?php echo e(__('admin::app.configuration.save-btn-title')); ?>

                        </button>
                    </div>
                </div>
            </form>
        <?php elseif(strpos(request()->url(), 'pages/all') !== false): ?>
            <div class="content" id="managePagesPage">
                <div class="page-header">
                    <div class="page-title">
                        <h1>
                            Custom Pages
                        </h1>
                    </div>

                    <div class="page-action">
                        <button id="addNewPage" class="btn btn-md btn-primary">
                            Add New Page
                        </button>
                    </div>
                </div>

                <div class="page-content capitalize-tr">
                    <?php $pageGrid = app('App\DataGrids\ManagePagesDataGrid'); ?>
                    <?php echo $pageGrid->render(); ?>

                </div>
            </div>
            <form method="POST" action="<?php echo e(route('admin.configuration.pages.create')); ?>" class="d-none" id="createNewPage">
                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            <span class="back-arrow"><i class="fa fa-angle-left"></i></span> Page Details
                        </h1>
                    </div>

                </div>
                <div class="page-content">
                    <div class="form-container">
                        <?php echo csrf_field(); ?>
                        <div class="control-group text" :class="">
                            <label for="page_name" class="required" >
                                Page Name
                            </label>
                            <input type="text" required v-validate="'required'" class="control" id="page_name" name="name" value="<?php echo e(old('name') ?: null); ?>" data-vv-as="state">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="page_url">
                                <strong>Page URL &mdash; </strong><span class="page_url"></span>
                            </label>
                            <input readonly type="hidden" v-validate="'required'" class="control" id="page_url" name="url" value="<?php echo e(old('url') ?: null); ?>" data-vv-as="state">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="page_status" class="required" >
                                Page Publish Status
                            </label>
                            <div>
                                <select name="status" class="control" id="page_status">
                                    <option value="Enabled">Enabled</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="page_content">Page Content</label>
                            <textarea class="control" id="page_content" name="content"><?php echo e(old('content') ?: null); ?></textarea>
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_title" class="required" >
                                Meta Title
                            </label>
                            <input id="meta_title" name="meta_title" class="control">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_keywords" class="required" >
                                Meta Keywords
                            </label>
                            <input name="meta_keywords" id="meta_keywords" class="control">
                        </div>
                        <div class="control-group text" :class="">
                            <label for="meta_description" class="required" >
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" class="control"></textarea>
                        </div>
                    </div>

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            <?php echo e(__('admin::app.configuration.save-btn-title')); ?>

                        </button>
                    </div>
                </div>
            </form>

            
        <?php elseif(strpos(request()->url(), 'pages/about') !== false): ?>
            <?php echo $__env->make('admin::configuration.about.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
        <?php elseif(strpos(request()->url(), 'pages/refund') !== false): ?>
            <?php echo $__env->make('admin::configuration.refund_policy.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
        <?php elseif(strpos(request()->url(), 'pages/return') !== false): ?>
            <?php echo $__env->make('admin::configuration.return_policy.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
        <?php elseif(strpos(request()->url(), 'pages/privacy') !== false): ?>
            <?php echo $__env->make('admin::configuration.privacy_policy.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            
        <?php elseif(strpos(request()->url(), 'pages/terms') !== false): ?>
            <?php echo $__env->make('admin::configuration.terms_of_use.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php elseif(strpos(request()->url(), 'notifications') !== false): ?>
            <?php if(strpos(request()->url(), 'smtp') !== false): ?>
                <?php
                    $emailConfig = \App\MailSetting::first();
                ?>
                <?php echo $__env->make('admin::configuration.email.smtp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('admin::configuration.notification.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin::configuration.notification.store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin::configuration.notification.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        <?php else: ?>
            <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

                <div class="page-header">

                    <div class="page-title">
                        <?php if(strpos(request()->url(), 'paystack')): ?>
                            <h1>
                                Configure Paystack Keys
                            </h1>
                        <?php elseif(strpos(request()->url(), 'sales/carriers')): ?>
                            <h1 class="configure">
                                Configure Store Pickup
                            </h1>
                        <?php else: ?>
                            <h1 class="configure">
                                <?php echo e(__('admin::app.configuration.title')); ?>

                            </h1>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="page-content">
                    <div class="form-container">
                        <?php echo csrf_field(); ?>

                        <?php if($groups = array_get($config->items, request()->route('slug') . '.children.' . request()->route('slug2') . '.children')): ?>

                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(count($groups) === 1): ?>
                                    <?php $__currentLoopData = $item['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('admin::configuration.field-type', ['field' => $field], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <accordian :title="'<?php echo e(__($item['name'])); ?>'" :active="true">
                                        <div slot="body">
                                            <?php $__currentLoopData = $item['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo $__env->make('admin::configuration.field-type', ['field' => $field], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </accordian>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                    </div>

                    <?php if(strpos(request()->url(), 'paystack')): ?>
                        <footer class="payment-footer">
                            <hr class="hr">
                            <div>
                                <div>
                                    <a target="_blank" href="https://dashboard.paystack.com/#/signup">Create a Free Paystack Account</a>
                                </div>
                                <div>
                                    <a target="_blank" href="https://paystack.com/why-choose-paystack">Learn About Paystack</a>
                                </div>
                            </div>
                        </footer>
                    <?php endif; ?>

                    <hr class="horizontal-line">
                    <div class="form-bottom">
                        <button type="submit" class="btn btn-md btn-primary">
                            <?php echo e(__('admin::app.configuration.save-btn-title')); ?>

                        </button>
                    </div>

                </div>

            </form>


        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "<?php echo e(route('admin.configuration.index', [request()->route('slug'), request()->route('slug2')])); ?>" + query;
            });
            /*
            * @description  function that sets up the page for other javascript needs:
            * edit page that doesn't need to be loaded, fetch data via ajax, etc.
            */
            function pageSetup(page, editHandler) {
                let addButton, entityCreationPage, entityPage;
                if (page === 'location') {
                    addButton = document.querySelector('#addLocation');
                    entityCreationPage = document.querySelector('#addLocationPage');
                    entityPage = document.querySelector('#locationPage');
                } else if (page === 'managePages') {
                    addButton = document.querySelector('#addNewPage');
                    entityCreationPage = document.querySelector('#createNewPage');
                    entityPage = document.querySelector('#managePagesPage');
                    document.querySelector('.page_url').innerHTML = (
                        location.origin + '/pages/' );
                }
                addButton.addEventListener('click', function addLocation (evt) {
                    entityCreationPage.classList.remove('d-none');
                    entityPage.classList.add('d-none');
                    if (initEditor) {
                        initEditor()
                    }
                });
                document.querySelectorAll('.pencil-lg-icon').forEach(btn => {
                    btn.addEventListener('click', evt => {
                        evt.preventDefault();
                        editHandler(btn.parentElement);
                    });
                });
            }
            <?php if(strpos(request()->url(), 'othermethod') !== false): ?>
            function setupEditPage(url) {
                fetch('/storemanager/configuration/sales/othermethods/addlocation/'+ url.search.substring(1) + '/details')
                    .then(response => {
                        document.querySelector('.modify').querySelector('h1').innerText = "Modify Shipping Location";
                        return response.json();
                    })
                    .then(response => {
                        for (const key in response) {
                            if (response.hasOwnProperty(key) && key !== "id" && key !== "created_at" && key !== "updated_at") {
                                document.querySelector('[name='+key+']').value = response[key];
                            }
                        }
                        const inp = document.createElement('input');
                        inp.type="hidden";
                        inp.value = response.id;
                        inp.name = "id";
                        document.querySelector('#addLocationPage').appendChild(inp);
                        document.querySelector('#addLocation').click();
                    })
                ;
            }
            pageSetup('location', setupEditPage);
            <?php elseif(strpos(request()->url(), 'pages/all') !== false): ?>
                String.prototype.sluggify = function() {
                return this.toLowerCase()
                    .replace(/[^\w ]+/g,'')
                    .replace(/ +/g,'-')
                    ;
            };
            document.querySelector('#page_name').addEventListener('keyup', function(){
                document.querySelector('#page_url').value = (
                    location.origin + '/pages/' + this.value.sluggify());
                document.querySelector('.page_url').innerHTML = (
                    location.origin + '/pages/' + this.value.sluggify());
            });
            document.querySelector('.back-arrow').addEventListener('click', function() {
                document.querySelector('#createNewPage').classList.add('d-none');
                document.querySelector('#managePagesPage').classList.remove('d-none');
            });
            document.querySelectorAll('.capitalize-tr tr').forEach(tr => {
                const linker = tr.querySelector('td:nth-child(2)');
                if (linker) {
                    linker.style.textTransform = "lowercase"
                }
            });
            function editPage(url) {
                url = decodeURI(url.search.substring(1)).sluggify();
                fetch(`/storemanager/configuration/pages/${url}/details`)
                    .then(response => response.json())
                    .then(response => {
                        for (const key in response) {
                            if (response.hasOwnProperty(key) && key !== "id" && key !== "created_at" && key !== "updated_at") {
                                document.querySelector('[name='+key+']').value = response[key];
                                if (key === 'url') {
                                    document.querySelector('.page_url').innerHTML = response[key];
                                }
                                if (key === 'content') {
                                    document.querySelector('[name='+key+']').innerHTML = response[key];
                                    initEditor();
                                }
                                else if (key === 'status') {
                                    // TODO: Figure out how to update the select2 component.
                                }
                            }
                        }
                        const inp = document.createElement('input');
                        inp.type="hidden";
                        inp.value = response.id;
                        inp.name = "id";
                        document.querySelector('#createNewPage').appendChild(inp);
                        document.querySelector('#addNewPage').click();
                    })
                    .catch(error => {
                        console.error(error);
                    })
            }
            pageSetup('managePages', editPage);
            <?php elseif(strpos(request()->url(), 'pages/about') !== false): ?>
            initEditor()
            <?php elseif(strpos(request()->url(), 'pages/refund') !== false): ?>
            initEditor();
            <?php elseif(strpos(request()->url(), 'pages/return') !== false): ?>
            initEditor();
            <?php elseif(strpos(request()->url(), 'pages/privacy') !== false): ?>
            initEditor();
            <?php elseif(strpos(request()->url(), 'pages/terms') !== false): ?>
            initEditor();
            <?php endif; ?>

        });

        //  This script load the url on the pages
        function page_link() {
            let url = document.querySelector('#static_url').value;
            let page_link = document.querySelector('.static_page_url').innerHTML = (location.origin + '/' + url);
            return page_link;
        }
        document.querySelector('#page_link').value = page_link();

        //   Set Meta title for all pages
        function meta_title() {
            const dashboard_title = document.querySelector('#dashboard_title').value;
            const meta_title = (dashboard_title + ' — ' + document.querySelector('#meta_title').value);
            return meta_title;
        }
        document.querySelector('.modify_title').value =  meta_title();
    </script>

    <script src="<?php echo e(asset('vendor/webkul/admin/assets/js/tinyMCE/tinymce.min.js')); ?>"></script>

    <script>
        function initEditor() {
            $(document).ready(function () {
                tinymce.init({
                    selector: 'textarea#page_content',
                    height: 200,
                    width: "70%",
                    plugins: 'image imagetools media wordcount save fullscreen code link',
                    toolbar1: 'formatselect | bold italic underline  link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent ',
                    image_advtab: true,
                    valid_elements : '*[*]'
                });
            });
        }
    </script>

    <script type="text/x-template" id="country-template">

        <div>
            <select type="text" v-validate="'required'" class="control" id="country" name="country" v-model="country" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.country')); ?>&quot;" @change="someHandler">
                <option value=""></option>

                <?php $__currentLoopData = core()->countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

    </script>

    <script>
        Vue.component('country', {

            template: '#country-template',

            inject: ['$validator'],

            props: ['code'],

            data: () => ({
                country: "",
            }),

            mounted() {
                this.country = this.code;
                this.someHandler()
            },

            methods: {
                someHandler() {
                    this.$root.$emit('sendCountryCode', this.country)
                },
            }
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
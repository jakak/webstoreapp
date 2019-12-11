<?php
    $validations = [];
    $disabled = false;

    if (isset($field['validation'])) {
        array_push($validations, $field['validation']);
    }

    $validations = implode('|', array_filter($validations));

    $key = $item['key'];
    $key = explode(".", $key);
    $firstField = current($key);
    $secondField = next($key);
    $thirdField  = end($key);

    $name = $item['key'] . '.' . $field['name'];

    if (isset($field['repository'])) {
        $temp = explode("@", $field['repository']);
        $class = app(current($temp));
        $method = end($temp);
        $value = $class->$method();
    }
?>

    <div class="control-group <?php echo e($field['type']); ?>" :class="[errors.has('<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]') ? 'has-error' : '']">

        <label <?php if($field['type'] === 'hidden'): ?>
            style="display: none"
            <?php endif; ?>
            for="<?php echo e($name); ?>" <?php echo e(!isset($field['validation']) || strpos('required', $field['validation']) < 0 ? '' : 'class=required'); ?>>
            <?php echo e(trans($field['title'])); ?>

        </label>

        <?php if($field['type'] == 'text'): ?>

            <input type="text" v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" value="<?php echo e(old($name) ?: core()->getConfigData($name)); ?>" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;">

        <?php elseif($field['type'] == 'hidden'): ?>
            <input type="hidden" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" value="<?php echo e(old($name) ?: core()->getConfigData($name)); ?>">

        <?php elseif($field['type'] == 'textarea'): ?>

            <textarea v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;"><?php echo e(old($name) ?: core()->getConfigData($name)); ?></textarea>

        <?php elseif($field['type'] == 'select'): ?>

            <select v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;" >

                <?php
                    $selectedOption = core()->getConfigData($name) ?? '';
                ?>

                <?php if(isset($field['repository'])): ?>
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($value[$key]); ?>" <?php echo e($value[$key] == $selectedOption ? 'selected' : ''); ?>>
                           <?php echo e(trans($value[$key])); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($option['value'] == false) {
                                $value = 0;
                            } else {
                                $value = $option['value'];
                            }
                        ?>

                        <option value="<?php echo e($value); ?>" <?php echo e($value == $selectedOption ? 'selected' : ''); ?>>
                            <?php echo e(trans($option['title'])); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </select>

        <?php elseif($field['type'] == 'multiselect'): ?>

            <select v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>][]" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;"  multiple>

                <?php
                    $selectedOption = core()->getConfigData($name) ?? '';
                ?>

                <?php if(isset($field['repository'])): ?>
                    <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($value[$key]); ?>" <?php echo e(in_array($value[$key], explode(',', $selectedOption)) ? 'selected' : ''); ?>>
                            <?php echo e(trans($value[$key])); ?>

                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php $__currentLoopData = $field['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if ($option['value'] == false) {
                                $value = 0;
                            } else {
                                $value = $option['value'];
                            }
                        ?>

                        <option value="<?php echo e($value); ?>" <?php echo e(in_array($option['value'], explode(',', $selectedOption)) ? 'selected' : ''); ?>>
                            <?php echo e($option['title']); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </select>

        <?php elseif($field['type'] == 'country'): ?>

            <?php
                $countryCode = core()->getConfigData($name) ?? '';
            ?>

            <country code = <?php echo e($countryCode); ?>></country>

        <?php elseif($field['type'] == 'state'): ?>

            <?php
                $stateCode = core()->getConfigData($name) ?? '';
            ?>

            <state code = <?php echo e($stateCode); ?>></state>

        <?php elseif($field['type'] == 'boolean'): ?>

            <select v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;">

                <?php
                    $selectedOption = core()->getConfigData($name) ?? '';
                ?>

                <option value="0" <?php echo e($selectedOption ? '' : 'selected'); ?>>
                    <?php echo e(__('admin::app.configuration.no')); ?>

                </option>

                <option value="1" <?php echo e($selectedOption ? 'selected' : ''); ?>>
                    <?php echo e(__('admin::app.configuration.yes')); ?>

                </option>

            </select>

        <?php elseif($field['type'] == 'image'): ?>

            <?php
                $src = Storage::url(core()->getConfigData($name));
                $result = core()->getConfigData($name);
            ?>

            <?php if($result): ?>
                <a href="<?php echo e($src); ?>" target="_blank">
                    <img src="<?php echo e($src); ?>" class="configuration-image"/>
                </a>
            <?php endif; ?>

            <input type="file" v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" value="<?php echo e(old($name) ?: core()->getConfigData($name)); ?>" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;" style="padding-top: 5px;">

            <?php if($result): ?>
                <div class="control-group" style="margin-top: 5px;">
                    <span class="checkbox">
                        <input type="checkbox" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>][delete]"  name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>][delete]" value="1">

                        <label class="checkbox-view" for="delete"></label>
                            <?php echo e(__('admin::app.configuration.delete')); ?>

                    </span>
                </div>
            <?php endif; ?>

        <?php elseif($field['type'] == 'file'): ?>

            <?php
                $result = core()->getConfigData($name);
                $src = explode("/", $result);
                $path = end($src);
            ?>

            <?php if($result): ?>
                <a href="<?php echo e(route('admin.configuration.download', [request()->route('slug'), request()->route('slug2'), $path])); ?>">
                    <i class="icon sort-down-icon download"></i>
                </a>
            <?php endif; ?>

            <input type="file" v-validate="'<?php echo e($validations); ?>'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]" value="<?php echo e(old($name) ?: core()->getConfigData($name)); ?>" data-vv-as="&quot;<?php echo e($field['name']); ?>&quot;" style="padding-top: 5px;">

            <?php if($result): ?>
                <div class="control-group" style="margin-top: 5px;">
                    <span class="checkbox">
                        <input type="checkbox" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>][delete]"  name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>][delete]" value="1">

                        <label class="checkbox-view" for="delete"></label>
                            <?php echo e(__('admin::app.configuration.delete')); ?>

                    </span>
                </div>
            <?php endif; ?>

        <?php endif; ?>

        <span class="control-error" v-if="errors.has('<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e($field['name']); ?>]')">{{ errors.first('<?php echo $firstField; ?>[<?php echo $secondField; ?>][<?php echo $thirdField; ?>][<?php echo $field['name']; ?>]') }}</span>

    </div>


<?php $__env->startPush('scripts'); ?>

<script type="text/x-template" id="country-template">

    <div>
        <select type="country" v-validate="'required'" class="control" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e('country'); ?>]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][<?php echo e('country'); ?>]" v-model="country" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.country')); ?>&quot;" @change="someHandler">
            <option value=""></option>

            <?php $__currentLoopData = core()->countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <option value="<?php echo e($country->code); ?>"><?php echo e($country->name); ?></option>

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

<script type="text/x-template" id="state-template">

    <div>
        <input type="text" v-validate="'required'" v-if="!haveStates()" class="control" v-model="state" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][state]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][state]" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.state')); ?>&quot;"/>

        <select v-validate="'required'" v-if="haveStates()" class="control" v-model="state" id="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][state]" name="<?php echo e($firstField); ?>[<?php echo e($secondField); ?>][<?php echo e($thirdField); ?>][state]" data-vv-as="&quot;<?php echo e(__('admin::app.customers.customers.state')); ?>&quot;" >

            <option value=""><?php echo e(__('admin::app.customers.customers.select-state')); ?></option>

            <option v-for='(state, index) in countryStates[country]' :value="state.code">
                {{ state.default_name }}
            </option>

        </select>

    </div>

</script>

<script>
    Vue.component('state', {

        template: '#state-template',

        inject: ['$validator'],

        props: ['code'],

        data: () => ({

            state: "",

            country: "",

            countryStates: <?php echo json_encode(core()->groupedStatesByCountries(), 15, 512) ?>
        }),

        mounted() {
            this.state = this.code
        },

        methods: {
            haveStates() {
                this.$root.$on('sendCountryCode', (country) => {
                    this.country = country;
                })

                if (this.countryStates[this.country] && this.countryStates[this.country].length)
                    return true;

                return false;
            },
        }
    });
</script>

<?php $__env->stopPush(); ?>




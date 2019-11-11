<tbody>
    <?php if(count($records)): ?>
        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <?php if($enableMassActions): ?>
                    <td>
                        <span class="checkbox">
                            <input type="checkbox" v-model="dataIds" @change="select" value="<?php echo e($record->{$index}); ?>">

                            <label class="checkbox-view" for="checkbox"></label>
                        </span>
                    </td>
                <?php endif; ?>

                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $columnIndex = explode('.', $column['index']);

                        $columnIndex = end($columnIndex);
                    ?>

                    <?php if(isset($column['wrapper'])): ?>
                        <?php if(isset($column['closure']) && $column['closure'] == true): ?>
                            <td><?php echo $column['wrapper']($record); ?></td>
                        <?php else: ?>
                            <td><?php echo e($column['wrapper']($record)); ?></td>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($column['type'] == 'price'): ?>
                            <?php if(isset($column['currencyCode'])): ?>
                                <td><?php echo e(core()->formatPrice($record->{$columnIndex}, $column['currencyCode'])); ?></td>
                            <?php else: ?>
                                <td><?php echo e(core()->formatBasePrice($record->{$columnIndex})); ?></td>
                            <?php endif; ?>
                        <?php elseif($column['type'] == 'button'): ?>
                            <td>
                                <a href="<?php echo e($record->url); ?>" target="_blank" class="btn btn-sm btn-primary">Preview</a>
                            </td>
                        <?php else: ?>
                            <td><?php echo e($record->{$columnIndex}); ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($enableActions): ?>
                    <td class="actions" style="width: 100px;">
                        <div>
                            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route($action['route'], $record->{$index})); ?>">
                                    <span class="<?php echo e($action['icon']); ?>"></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="10" style="text-align: center;"><?php echo e($norecords); ?></td>
        </tr>
    <?php endif; ?>
</tbody>

<?php $__env->startSection('title', __('views.admin.regions.show.title', ['name' => $region->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th><?php echo e(__('views.admin.regions.show.table_header_0')); ?></th>
                <td><?php echo e($region->name); ?></td>
            </tr>
            <tr>
                <th><?php echo e(__('views.admin.regions.show.table_header_1')); ?></th>
                <td><?php echo e($region->country->name); ?></td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.regions.show.table_header_2')); ?></th>
                <td>
                    <?php if($region->active): ?>
                        <span class="label label-primary"><?php echo e(__('views.admin.regions.show.active')); ?></span>
                    <?php else: ?>
                        <span class="label label-danger"><?php echo e(__('views.admin.regions.show.inactive')); ?></span>
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.regions.show.table_header_3')); ?></th>
                <td><?php echo e($region->created_at); ?> (<?php echo e($region->created_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.regions.show.table_header_4')); ?></th>
                <td><?php echo e($region->updated_at); ?> (<?php echo e($region->updated_at->diffForHumans()); ?>)</td>
            </tr>

            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/regions/show.blade.php ENDPATH**/ ?>
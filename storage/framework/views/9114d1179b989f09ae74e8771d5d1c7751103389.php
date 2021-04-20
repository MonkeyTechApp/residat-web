<?php $__env->startSection('title', __('views.admin.countries.show.title', ['name' => $country->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th><?php echo e(__('views.admin.countries.show.table_header_0')); ?></th>
                <td><?php echo e($country->name); ?></td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.countries.show.table_header_1')); ?></th>
                <td>
                    <?php if($country->active): ?>
                        <span class="label label-primary"><?php echo e(__('views.admin.countries.show.active')); ?></span>
                    <?php else: ?>
                        <span class="label label-danger"><?php echo e(__('views.admin.countries.show.inactive')); ?></span>
                    <?php endif; ?>
                </td>
            </tr>











            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/countries/show.blade.php ENDPATH**/ ?>
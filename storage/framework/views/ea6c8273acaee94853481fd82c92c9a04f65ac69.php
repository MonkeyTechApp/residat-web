<?php $__env->startSection('title', __('views.admin.regions.index.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', __('views.admin.regions.index.table_header_0'),['page' => $regions->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',  __('views.admin.regions.index.table_header_1'),['page' => $regions->currentPage()]));?></th>
                <th><?php echo e(__('views.admin.regions.index.table_header_2')); ?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.regions.index.table_header_3'),['page' => $regions->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.regions.index.table_header_4'),['page' => $regions->currentPage()]));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($region->name); ?></td>
                    <td><?php echo e($region->country->name ?? 'Unknown'); ?></td>
                    <td>
                        <?php if($region->active): ?>
                            <span class="label label-primary"><?php echo e(__('views.admin.regions.index.active')); ?></span>
                        <?php else: ?>
                            <span class="label label-danger"><?php echo e(__('views.admin.regions.index.inactive')); ?></span>
                        <?php endif; ?>
                    </td>

                    <td><?php echo e($region->created_at); ?></td>
                    <td><?php echo e($region->updated_at); ?></td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.regions.show', [$region->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.regions.index.show')); ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.regions.edit', [$region->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.regions.index.edit')); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator')): ?>
                            <a href="<?php echo e(route('admin.regions.destroy', [$region->id])); ?>" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.regions.index.delete')); ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
            <?php echo e($regions->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/regions/index.blade.php ENDPATH**/ ?>
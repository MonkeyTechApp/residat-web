<?php $__env->startSection('title', __('views.admin.zones.index.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="pull-right">
        <a href="<?php echo e(route('admin.zones.create')); ?>">
            <button type="button" class="btn btn-secondary btn-sm fa-plus-circle">Create Zone</button> </a>
    </div>

    <div class="row">
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', __('views.admin.zones.index.table_header_0'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',  __('views.admin.zones.index.table_header_1'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo e(__('views.admin.zones.index.table_header_2')); ?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_3'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_4'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_5'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_6'),['page' => $zones->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_7'),['page' => $zones->currentPage()]));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($zone->name); ?></td>
                    <td><?php echo e($zone->mother->name ?? 'No parent'); ?></td>
                    <td>
                        <?php if($zone->svg != null): ?>
                            <span class="label label-primary"><?php echo e(__('views.admin.zones.index.active')); ?></span>
                        <?php else: ?>
                            <span class="label label-warning"><?php echo e(__('views.admin.zones.index.inactive')); ?></span>
                        <?php endif; ?>
                    <td><?php echo e($zone->image ?? 'No Image'); ?></td>
                    <td><?php echo e($zone->level ?? 'Unknown'); ?></td>
                    <td>
                        <?php if($zone->active): ?>
                            <span class="label label-primary"><?php echo e(__('views.admin.zones.index.active')); ?></span>
                        <?php else: ?>
                            <span class="label label-danger"><?php echo e(__('views.admin.zones.index.inactive')); ?></span>
                        <?php endif; ?>
                    </td>

                    <td><?php echo e($zone->created_at); ?></td>
                    <td><?php echo e($zone->updated_at); ?></td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.zones.show', [$zone->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.zones.index.show')); ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.zones.edit', [$zone->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.zones.index.edit')); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator')): ?>
                            <a href="<?php echo e(route('admin.zones.destroy', [$zone->id])); ?>" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.zones.index.delete')); ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
            <?php echo e($zones->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/zones/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', __('views.admin.zones.show.title', ['name' => $zone->name])); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>

            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_0')); ?></th>
                <td><?php echo e($zone->name); ?></td>
            </tr>
            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_1')); ?></th>
                <td><?php echo e($zone->mother->name ?? 'No parent'); ?></td>
            </tr>
            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_2')); ?></th>
                <td><?php echo e($zone->region->name); ?></td>
            </tr>
            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_3')); ?></th>
                <td>
                    <?php if($zone->active): ?>
                        <span class="label label-primary"><?php echo e(__('views.admin.zones.show.active')); ?></span>
                    <?php else: ?>
                        <span class="label label-danger"><?php echo e(__('views.admin.zones.show.inactive')); ?></span>
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_4')); ?></th>
                <td><?php echo e($zone->created_at); ?> (<?php echo e($zone->created_at->diffForHumans()); ?>)</td>
            </tr>

            <tr>
                <th><?php echo e(__('views.admin.zones.show.table_header_5')); ?></th>
                <td><?php echo e($zone->updated_at); ?> (<?php echo e($zone->updated_at->diffForHumans()); ?>)</td>
            </tr>

            </tbody>
        </table>
    </div>

    <?php $__env->startSection('title', __('views.admin.zones.show.sub_zone_of', ['name' => $zone->name])); ?>
<h4><?php echo e(__('views.admin.zones.show.sub_zone_of', ['name' => $zone->name])); ?></h4>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', __('views.admin.zones.index.table_header_0'),['page' => $zone->children]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',  __('views.admin.zones.index.table_header_1'),['page' => $zone->children]));?></th>
                <th><?php echo e(__('views.admin.zones.index.table_header_2')); ?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_3'),['page' => $zone->children]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_4'),['page' => $zone->children]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.zones.index.table_header_5'),['page' => $zone->children]));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $zone->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($zone->name); ?></td>
                    <td><?php echo e($zone->mother->name ?? 'No parent'); ?></td>
                    <td><?php echo e($zone->region->name ?? 'Unknown'); ?></td>
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



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/zones/show.blade.php ENDPATH**/ ?>
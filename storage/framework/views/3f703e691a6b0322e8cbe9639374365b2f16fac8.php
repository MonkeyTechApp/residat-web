<?php $__env->startSection('title', __('views.admin.countries.index.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', __('views.admin.countries.index.table_header_0'),['page' => $countries->currentPage()]));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name',  __('views.admin.countries.index.table_header_1'),['page' => $countries->currentPage()]));?></th>
                <th><?php echo e(__('views.admin.countries.index.table_header_2')); ?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('active', __('views.admin.countries.index.table_header_3'),['page' => $countries->currentPage()]));?></th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($country->name); ?></td>
                    <td>
                        <?php if($country->active): ?>
                            <span class="label label-primary"><?php echo e(__('views.admin.countries.index.active')); ?></span>
                        <?php else: ?>
                            <span class="label label-danger"><?php echo e(__('views.admin.countries.index.inactive')); ?></span>
                        <?php endif; ?>
                    </td>

                    <td><?php echo e($country->created_at); ?></td>
                    <td><?php echo e($country->updated_at); ?></td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.countries.show', [$country->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.countries.index.show')); ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.countries.edit', [$country->id])); ?>" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.countries.index.edit')); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator')): ?>
                            <a href="<?php echo e(route('admin.countries.destroy', [$country->id])); ?>" class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top" data-title="<?php echo e(__('views.admin.countries.index.delete')); ?>">
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pull-right">
            <?php echo e($countries->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/countries/index.blade.php ENDPATH**/ ?>
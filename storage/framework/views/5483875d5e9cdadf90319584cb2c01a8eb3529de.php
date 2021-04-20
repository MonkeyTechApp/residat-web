<?php $__env->startSection('title',__('views.admin.regions.edit.title', ['name' => $region->name]) ); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo e(Form::open(['route'=>['admin.regions.update', $region->id],'method' => 'put','class'=>'form-horizontal form-label-left'])); ?>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        <?php echo e(__('views.admin.regions.edit.name')); ?>

                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                               name="name" value="<?php echo e($region->name); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <ul class="parsley-errors-list filled">
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="parsley-required"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(auth()->user()->hasRole('administrator')): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active" >
                            <?php echo e(__('views.admin.regions.edit.active')); ?>

                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input id="active" type="checkbox" class="<?php if($errors->has('active')): ?> parsley-error <?php endif; ?>"
                                           name="active" <?php if($region->active): ?> checked="checked" <?php endif; ?> value="1">
                                    <?php if($errors->has('active')): ?>
                                        <ul class="parsley-errors-list filled">
                                            <?php $__currentLoopData = $errors->get('active'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="parsley-required"><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>
                    </div>


                <?php endif; ?>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"> <?php echo e(__('views.admin.regions.edit.cancel')); ?></a>
                        <button type="submit" class="btn btn-success"> <?php echo e(__('views.admin.regions.edit.save')); ?></button>
                    </div>
                </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    ##parent-placeholder-bf62280f159b1468fff0c96540f3989d41279669##
    <?php echo e(Html::style(mix('assets/admin/css/users/edit.css'))); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <?php echo e(Html::script(mix('assets/admin/js/users/edit.js'))); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/regions/edit.blade.php ENDPATH**/ ?>
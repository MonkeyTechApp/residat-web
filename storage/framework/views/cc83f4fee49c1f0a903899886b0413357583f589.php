<?php $__env->startSection('title',__('views.admin.zones.create') ); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo e(Form::open(['route'=>['admin.zones.post'],'method' => 'post','class'=>'form-horizontal  form-label-left'])); ?>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        <?php echo e(__('views.admin.zones.edit.name')); ?>

                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                               name="name" value="" required>
                        <?php if($errors->has('name')): ?>
                            <ul class="parsley-errors-list filled">
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="parsley-required"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        <?php echo e(__('views.admin.tag-name')); ?>

                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                               name="tag_name" value="" required>
                        <?php if($errors->has('name')): ?>
                            <ul class="parsley-errors-list filled">
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="parsley-required"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        <?php echo e(__('views.admin.level')); ?>

                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" type="text" class="form-control col-md-7 col-xs-12 <?php if($errors->has('name')): ?> parsley-error <?php endif; ?>"
                               name="level" value="" required>
                        <?php if($errors->has('name')): ?>
                            <ul class="parsley-errors-list filled">
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="parsley-required"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >
                        SVG
                        <span class="required">*</span>
                    </label>

                    <div class="col-md-6 col-sm-6">
                        <textarea required="required" name='svg'></textarea></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 "> <?php echo e(__('views.admin.parent')); ?></label>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <select name="parent" class="select2_group form-control">
                            <?php $__currentLoopData = $mothers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mother): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mother->id); ?>"><?php echo e($mother->name); ?> - Level <?php echo e($mother->level); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <?php if(auth()->user()->hasRole('administrator')): ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active" >
                            <?php echo e(__('views.admin.zones.edit.active')); ?>

                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox">
                                <label>
                                    <input id="active" type="checkbox" class="<?php if($errors->has('active')): ?> parsley-error <?php endif; ?>"
                                           name="active" value="1">
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
                        <a class="btn btn-primary" href="<?php echo e(URL::previous()); ?>"> <?php echo e(__('views.admin.zones.edit.cancel')); ?></a>
                        <button type="submit" class="btn btn-success"> <?php echo e(__('views.admin.zones.edit.save')); ?></button>
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

<?php echo $__env->make('admin.layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/zones/create.blade.php ENDPATH**/ ?>
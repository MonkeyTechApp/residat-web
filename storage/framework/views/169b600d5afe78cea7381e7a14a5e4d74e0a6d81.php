<?php $__env->startSection('body_class','nav-md'); ?>
<?php echo $__env->make('admin.layouts.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('page'); ?>
    <div class="container body">
        <div class="main_container">
            <?php $__env->startSection('header'); ?>
                <?php echo $__env->make('admin.sections.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.sections.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldSection(); ?>

            <?php echo $__env->yieldContent('left-sidebar'); ?>

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3"><?php echo $__env->yieldContent('title'); ?></h1>
                    </div>
                    <?php if(Breadcrumbs::exists()): ?>
                        <div class="title_right">
                            <div class="pull-right">
                                <?php echo Breadcrumbs::render(); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <footer>
                <?php echo $__env->make('admin.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </footer>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo e(Html::style(mix('assets/admin/css/admin.css'))); ?>

    <!-- Datatables -->
    <link href="../assets/admin/datatable/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">






<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo e(Html::script(mix('assets/admin/js/admin.js'))); ?>



    <!-- Datatables -->
    <script src="../assets/admin/datatable/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/admin/datatable/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../assets/admin/datatable/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../assets/admin/datatable/jszip/dist/jszip.min.js"></script>
    <script src="../assets/admin/datatable/pdfmake/build/pdfmake.min.js"></script>
    <script src="../assets/admin/datatable/pdfmake/build/vfs_fonts.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Feussom Ronald Jr\Documents\MONKEY TECH\GIS\Residat\web\resources\views/admin/layouts/admin.blade.php ENDPATH**/ ?>
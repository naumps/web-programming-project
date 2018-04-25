<?php $__env->startSection('content'); ?>


    <section class="jumbotron text-center">
        <div class="container">

            <h1>2FA has been removed</h1>
            <br /><br />
            <a href="<?php echo e(route('movies')); ?>" class="btn btn-outline-primary">Go Home</a>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <main role="main" >

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Your are already subscriber!</h1>
                <p class="lead text-muted">Click <a href="<?php echo e(route('change_plan')); ?>">here</a> to change your plan.</p>
            </div>
        </section>



    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
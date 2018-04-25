<?php $__env->startSection('content'); ?>

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Here you can enable or disable two factor auth using google auth app</h1>

            <?php if(auth()->check() && auth()->user()->is2faEnabled()): ?>
                <p class="lead text-muted">Two factor auth is enabled.</p>
                <a href="<?php echo e(route('disable_2fa')); ?>" class="btn btn-outline-danger">Disable two factor auth</a>
            <?php else: ?>
                <p class="lead text-muted">Two factor auth is disabled.</p>
                <a href="<?php echo e(route('enable_2fa')); ?>" class="btn btn-outline-primary">Enable two factor auth</a>
                <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                   class="btn btn-outline-primary" target="new">Google authenticator app</a>

            <?php endif; ?>
        </div>
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
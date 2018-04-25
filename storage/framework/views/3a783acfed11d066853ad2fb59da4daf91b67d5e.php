<?php $__env->startSection('content'); ?>

<button class="btn filldatabase">get movie</button>
    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('js/fillDatabase.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
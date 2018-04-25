<?php $__env->startSection('content'); ?>
    <div class="register-logo">
        Two-factor Authentication
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Validate your two-factor authentication token</p>
        <form method="POST" action="<?php echo e(url('#')); ?>">
            <?php echo csrf_field(); ?>


            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form-group has-feedback">
                <input type="type" name="token" class="form-control" placeholder="Token">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7"></div><!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Verify Token</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.form-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
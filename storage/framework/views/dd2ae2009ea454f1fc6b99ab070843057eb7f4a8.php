<!doctype html>
<html lang="en">

<?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('director_attach',$movie)); ?>">
            <?php echo e(csrf_field()); ?>


            <h3>Choose director</h3>
            <div class="form-group">
                <select id="director" class="dropdown" name="director">
                <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $director): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox-inline">

                            <label>
                                <option value="<?php echo e($director->id); ?>"><?php echo e($director->name); ?></option>
                            </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>


            <?php if($errors->any()): ?>
                <ul class="alert alert-danger">

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            <?php endif; ?>

        </form>
    </div>

</main>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
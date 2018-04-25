<?php $__env->startSection('content'); ?>

<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('delete_category')); ?>" class="form-group">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>


            <h3>Delete categories</h3>
            <div class="form-group">
                <select id="name" class="dropdown" name="name">
                <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox-inline">
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>


                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>



                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
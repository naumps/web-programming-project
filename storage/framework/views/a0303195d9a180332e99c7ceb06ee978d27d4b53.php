<?php $__env->startSection('content'); ?>

<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('store_category')); ?>">
            <?php echo e(csrf_field()); ?>


            <h3>Create new category</h3>
            <div class="form-group">
                <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('show_category',$category)); ?>" class="btn btn-success"><?php echo e($category->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <form action="<?php echo e(route('store_category')); ?>">


                <div class="form-group">
                    <label for="name">Category:</label>
                    <input type="text" placeholder="New category" class="form-control" id="name"
                    name="name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

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
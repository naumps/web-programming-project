<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Categories</h1>
            <p class="lead text-muted">You can filter throught categories, add new categories and delete categories.</p>
            <p>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('show_category',$category)); ?>" class="btn btn-success"><?php echo e($category->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <p>
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary my-2">Log in</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary my-2">Sign up</a>
                <?php else: ?>
                    <?php if($role ==='admin' || $role ==='editor'): ?>
                    <a href="<?php echo e(route('create_category')); ?>" class="btn btn-primary my-2">Add new category</a>
                    <a href="<?php echo e(route('delete_category')); ?>" class="btn btn-danger my-2">Delete category</a>
                    <?php endif; ?>
                <?php endif; ?>
            </p>
        </div>
    </section>





</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Users</h1>
            <p class="lead text-muted">Here you can edit all users</p>
            <p>
                <a href="<?php echo e(route('create_user')); ?>" class="btn btn-secondary my-2">Create user</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h4 class="card-text">Username: <?php echo e($user->name); ?></h4>
                                <p class="card-text">Email: <?php echo e($user->email); ?></p>
                                <p class="card-text">Member since: <?php echo e($user->created_at); ?></p>
                                <p class="card-text">Role: <?php echo e($user->role); ?></p>
                                <?php if($user->role!== 'subscriber'): ?>
                                    <p class="card-text"><a href="<?php echo e(route('movies_of_user',$user)); ?>">Movies created by
                                            this user</a></p>
                                <?php endif; ?>
                                <p class="card-text"><a href="<?php echo e(route('edit_user',$user)); ?>">Edit this user</a></p>


                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </div>
    </div>

</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
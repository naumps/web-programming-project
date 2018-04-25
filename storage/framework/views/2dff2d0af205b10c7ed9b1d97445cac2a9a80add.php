<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Directors</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <?php if(auth()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary my-2">Log in</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary my-2">Sign up</a>
                <?php else: ?>

                    <?php if($role === 'admin' OR $role ==='editor'): ?>

                        <a href="<?php echo e(route('create_director')); ?>" class="btn btn-secondary my-2">Add new director</a>
                    <?php endif; ?>
                <?php endif; ?>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Directors:</h2>
            <div class="row">

                <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $director): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <img class="img-thumbnail" src="<?php echo e($director->image_url); ?>" alt="Card image cap">
                                <h3><?php echo e($director->name); ?></h3>
                                <p class="card-text"><?php echo e($director->bio); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('show_director',$director)); ?>">View</a>

                                        <?php if($role ==='admin' || $role ==='editor'): ?>
                                            <a href="<?php echo e(route('edit_director',$director)); ?>" class="btn btn-sm btn-secondary" type="submit">Edit</a>

                                            <?php if($role ==='admin'): ?>
                                                <form method="POST"
                                                      action="<?php echo e(route('delete_director',$director)); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button class="btn btn-sm  btn-danger" type="submit">Delete</button>
                                                </form>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted"><?php echo e($director->birth_date); ?></small>
                                    <small class="text-muted"><?php echo e($director->location); ?></small>
                                </div>
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
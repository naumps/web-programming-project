<?php $__env->startSection('content'); ?>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">All Actors</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <?php if($role ==='admin' || $role ==='editor'): ?>
                    <a href="<?php echo e(route('create_actor')); ?>" class="btn btn-primary my-2">Create new actor</a>
                <?php endif; ?>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Actors:</h2>
            <div class="row">

                <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <img class="img-thumbnail" src="<?php echo e($actor->image_url); ?>" alt="Card image cap">
                                <h3><?php echo e($actor->name); ?></h3>
                                <p class="card-text"><?php echo e($actor->bio); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                        <a class="btn btn-sm btn-primary" href="<?php echo e(route('show_actor',$actor)); ?>">View</a>

                                        <?php if(auth()->guard()->check()): ?>


                                            <?php if($role ==='admin' || $role ==='editor'): ?>
                                                <a href="<?php echo e(route('edit_actor',$actor)); ?>" class="btn btn-sm btn-secondary" type="submit">Edit</a>
                                                <form method="POST"
                                                      action="<?php echo e(route('delete_actor',$actor)); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button class="btn btn-sm  btn-danger" type="submit">Delete</button>
                                                </form>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted"><?php echo e($actor->birth_date); ?></small>
                                    <small class="text-muted"><?php echo e($actor->location); ?></small>
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
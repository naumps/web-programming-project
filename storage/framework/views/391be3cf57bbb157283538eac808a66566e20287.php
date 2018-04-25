<?php $__env->startSection('content'); ?>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <img src="<?php echo e($actor->image_url); ?>" alt="Card image cap">
                <h1 class="jumbotron-heading"><?php echo e($actor->name); ?></h1>
                <p class="lead text-muted"><?php echo e($actor->bio); ?></p>
                <h4>Born: <?php echo e($actor->birth_date); ?> in <?php echo e($actor->location); ?></h4>
                <p>
                <p>

                    <?php if($role ==='admin' || $role ==='editor'): ?>
                        <a href="<?php echo e(route('edit_actor',$actor)); ?>" class="btn btn-primary my-2">Edit</a>
                    <?php endif; ?>

                </p>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <h2>Movies with <?php echo e($actor->name); ?>:</h2>
                <div class="row">

                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">

                                <section class="jumbotron text-center">
                                    <div class="container">
                                        <img class="img-thumbnail" src="<?php echo e(public_path().asset($movie->image_url)); ?>"
                                             alt="<?php echo e(asset($movie->image_url)); ?>">
                                        <h1 class="jumbotron-heading"><a
                                                    href="<?php echo e(route('show_movie',$movie)); ?>"><?php echo e($movie->name); ?></a></h1>
                                        <p class="lead text-muted"><?php echo e($movie->desc); ?></p>

                                        <h4>Rating: <?php echo e($movie->getRating()); ?></h4>
                                        <h4>Length: <?php echo e($movie->length); ?></h4>
                                        <p>

                                    </div>
                                </section>
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
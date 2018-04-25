<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php echo e($category->name); ?> Movies</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
            <p>
                <?php if(auth()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary my-2">Log in</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary my-2">Sign up</a>
                <?php else: ?>


                <?php endif; ?>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="<?php echo e(asset($movie->image_url)); ?>" alt="Card image cap">
                            <div class="card-body">
                                <a href="<?php echo e(route('show_movie',$movie)); ?>"><h4><?php echo e($movie->name); ?></h4></a>
                                <small class="text-muted">Release date: <?php echo e($movie->date); ?></small>

                                <p class="card-text"><?php echo e($movie->desc); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('show_movie',$movie)); ?>" >View</a>
                                        <?php if($role==='admin' || $role==='editor'): ?>

                                            <a  class="btn btn-sm btn-warning" href="<?php echo e(route('edit_movie',$movie)); ?>" >Edit</a>

                                        <?php endif; ?>



                                    </div>
                                    <small class="text-muted">Rating: <?php echo e($movie->rating); ?></small>
                                    <small class="text-muted">Length: <?php echo e($movie->length); ?>min</small>

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
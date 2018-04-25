<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php echo e($list->name); ?> </h1>
            <p class="lead text-muted"></p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <h2>Movies in this list:</h2>
            <div class="row">
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="<?php echo e(asset($movie->image_url)); ?>" alt="<?php echo e($movie->image_url); ?>">
                            <div class="card-body">
                                <a href="<?php echo e(route('show_movie',$movie)); ?>"><h4><?php echo e($movie->name); ?></h4></a>
                                <small class="text-muted">Release date: <?php echo e($movie->date); ?></small>

                                <p class="card-text"><?php echo e($movie->desc); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('show_movie',$movie)); ?>" >View</a>

                                        <?php if(auth()->user()->role==='admin' || auth()->user()->role==='editor'): ?>

                                            <a  class="btn btn-sm btn-warning" href="<?php echo e(route('edit_movie',$movie)); ?>" >Edit</a>

                                        <?php endif; ?>
                                        <form method="POST" action="<?php echo e(route('remove_movie_from_list',['list'=>$list,'movie'=>$movie])); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <button class="btn btn-danger">Delete from this list</button>

                                        </form>


                                    </div>
                                    <small class="text-muted">Rating: <?php echo e(number_format($movie->getRating(),1)); ?></small>
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
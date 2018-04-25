<?php $__env->startSection('content'); ?>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row h-20">

                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow ">
                            <div class="  h-100">
                                <img class="card-img-top" style="height: 300px;"
                                     src="<?php echo e($movie->Poster); ?>"
                                     alt="no poster">
                            </div>


                            <div class="card-body">
                                <div>
                                    <h4>
                                        <?php echo e($movie->Title); ?>

                                    </h4>

                                </div>

                                <small class="text-muted">Release date: <?php echo e($movie->Year); ?></small>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">


                                    </div>

                                </div>
                                <form method="POST" action="<?php echo e(route('store_movie_from_omdb',['id'=>$movie->imdbID])); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit"
                                       class="btn btn-outline-primary">Sync this movie</button>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
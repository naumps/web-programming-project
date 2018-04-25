
<!doctype html>
<html lang="en">
<?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <img  src="<?php echo e($director->image_url); ?>" alt="Card image cap">
            <h1 class="jumbotron-heading"><?php echo e($director->name); ?></h1>
            <p class="lead text-muted"><?php echo e($director->bio); ?></p>
            <h4>Born: <?php echo e($director->birth_date); ?> in <?php echo e($director->location); ?></h4>
            <p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <h2>Movies of <?php echo e($director->name); ?>:</h2>
            <div class="row">

                <?php $__currentLoopData = $moviesOfDirector; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <section class="jumbotron text-center">
                                <div class="container">
                                    <img class="img-thumbnail" src="<?php echo e($movie->image_url); ?>" alt="Card image cap">
                                    <h1 class="jumbotron-heading"><a href="<?php echo e(route('show_movie',$movie)); ?>"><?php echo e($movie->name); ?></a></h1>
                                    <p class="lead text-muted"><?php echo e($movie->desc); ?></p>
                                    <h4>Rating: <?php echo e($movie->rating); ?></h4>
                                    <h4>Length: <?php echo e($movie->length); ?></h4>
                                    <h4>Director: <a href="<?php echo e(route('show_director',$director)); ?>"><?php echo e($director->name); ?></a></h4>
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

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>

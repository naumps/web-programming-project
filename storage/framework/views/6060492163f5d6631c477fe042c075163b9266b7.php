<?php $__env->startSection('content'); ?>

<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <div>
                <img class="center-block img-thumbnail" align="center" width="30%" src="<?php echo e(asset($movie->image_url)); ?>"
                     alt="Card image cap">
            </div>
            <?php if(auth()->guard()->check()): ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary " style="float:left; width: 325px"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add to my list
                    </button>
                    <div class="dropdown-menu">

                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!$list->contains($movie)): ?>
                                <button class="dropdown-item add-to-list"
                                        value="<?php echo e($list->id); ?> <?php echo e($movie->id); ?>"><?php echo e($list->name); ?></button>
                            <?php else: ?>
                                <button class="dropdown-item delete-from-list"
                                        value="<?php echo e($list->id); ?> <?php echo e($movie->id); ?>">Delete from:<?php echo e($list->name); ?></button>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="<?php echo e(route('create_list',['movie'=>$movie->id])); ?>">Add in new list</a>
                    </div>
                </div>
            <?php else: ?>

                <div class="btn-group">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary "
                       style="float:left; width: 325px">
                        Add to my list
                    </a>
                </div>
            <?php endif; ?>
            <h1 class="jumbotron-heading"><?php echo e($movie->name); ?></h1>
            <p class="lead text-muted"><?php echo e($movie->desc); ?></p>
            <h4>Release date: <?php echo e($movie->date); ?></h4>

            <h4>Rating: <?php echo e(number_format($movieRating,1)); ?></h4>
            <h4>Length: <?php echo e($movie->length); ?> min</h4>
            <h4>Categories:

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('show_category',$category)); ?>"><?php echo e($category->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </h4>
            <?php if($director===null): ?>

                <h4>Director:</h4>
            <?php else: ?>

                <h4>
                    Director: <a href="<?php echo e(route('show_director',$director)); ?>"><?php echo e($director->name); ?></a>
                </h4>
            <?php endif; ?>



            <?php if(auth()->guard()->guest()): ?>

                <p>Please <a href="<?php echo e(route('login')); ?>">sign in</a> to participate.

            <?php else: ?>

                <?php if($role !=='subscriber'): ?>
                            <a href="<?php echo e(route('edit_movie',$movie)); ?>" class="btn btn-primary my-2">Edit</a>
                <?php endif; ?>



                <?php if(is_null($isRatedByAuthUser)): ?>
                    <form method="POST" action="<?php echo e(route('store_rating',['movie'=>$movie,'user'=>auth()->user()])); ?>">
                        <?php echo e(csrf_field()); ?>

                        <label for="input-1" class="control-label">Rate this movie:</label>
                        <input id="rating" name="rating" class="rating rating-loading" data-min="5" data-max="10"
                               data-step="0.5" value="0">
                        <button type="submit">Rate</button>
                    </form>
                <?php else: ?>
                    <form method="POST" action="<?php echo e(route('update_rating',['movie'=>$movie,'user'=>auth()->user()])); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PATCH')); ?>

                        <label for="input-1" class="control-label">You have rated this movie already with:</label>
                        <input id="rating" name="rating" class="rating rating-loading" data-min="5" data-max="10"
                               data-step="0.5" value="<?php echo e($isRatedByAuthUser->rating); ?>">
                        <button type="submit">Rate</button>
                    </form>

                <?php endif; ?>

            <?php endif; ?>



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
                                            <a href="<?php echo e(route('edit_actor',$actor)); ?>" class="btn btn-sm btn-secondary"
                                               type="submit">Edit</a>


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
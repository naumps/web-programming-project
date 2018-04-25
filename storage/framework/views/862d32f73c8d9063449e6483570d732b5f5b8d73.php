<?php $__env->startSection('content'); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Movies</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                    creator,
                    etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>


                    <?php if(auth()->guest()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary my-2">Log in</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-secondary my-2">Sign up</a>
                <div class="form-group">
                    <a href="<?php echo e(route('redirect_to_provider',['provider'=>'github'])); ?>" class="btn btn-github"><i
                                class="fa fa-github"></i> Github</a>
                    <a href="<?php echo e(route('redirect_to_provider',['provider'=>'twitter'])); ?>" class="btn btn-twitter"><i
                                class="fa fa-twitter"></i> Twitter</a>
                    <a href="<?php echo e(route('redirect_to_provider',['provider'=>'facebook'])); ?>" class="btn btn-facebook"><i
                                class="fa fa-facebook"></i> Facebook</a>
                </div>
                <?php else: ?>
                    <?php if($role!=='subscriber' && $role!=='user'): ?>
                        <a href="<?php echo e(route('create_movie')); ?>" class="btn btn-primary my-2">Create new movie</a>
                        <a href="<?php echo e(route('create_actor')); ?>" class="btn btn-primary my-2">Create new actor</a>
                    <?php endif; ?>

                    <?php if($role === 'admin'): ?>

                        <a href="<?php echo e(route('create_user')); ?>" class="btn btn-secondary my-2">Create user</a>
                        <?php endif; ?>
                        <?php endif; ?>
                        </p>
                        <div id="search-box">
                            <!-- SearchBox widget will appear here -->

                        </div>
            </div>


        </section>

        <div id="categories"  style="float:right; display: inline-block">

        </div>

        <div class="hits-container">
            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row h-20">
                        <div id="hits">
                            <!-- Hits widget will appear here -->
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="main-container">
            <div class="album py-5 bg-light">
                <div class="container">



                    <div class="row h-20">

                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow ">
                                    <div class="  h-100">
                                        <img class="card-img-top" style="height: 300px;"
                                             src="<?php echo e(asset($movie->image_url)); ?>"
                                             alt="<?php echo e($movie->image_url); ?>">
                                    </div>

                                    <?php if(auth()->guard()->check()): ?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary "
                                                    style="float:left; width: 400px"
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
                                                                value="<?php echo e($list->id); ?> <?php echo e($movie->id); ?>">Delete
                                                            from:<?php echo e($list->name); ?></button>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item"
                                                   href="<?php echo e(route('create_list',['movie'=>$movie->id])); ?>">Add in new
                                                    list</a>
                                            </div>
                                        </div>
                                    <?php else: ?>

                                        <div class="btn-group">
                                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary "
                                               style="float:left; width: 400px">
                                                Add to my list
                                            </a>
                                        </div>
                                    <?php endif; ?>


                                    <div class="card-body">
                                        <div>
                                            <a href="<?php echo e(route('show_movie',$movie)); ?>">
                                                <h4>
                                                    <?php echo e($movie->name); ?>

                                                </h4>
                                            </a>

                                        </div>

                                        <small class="text-muted">Release date: <?php echo e($movie->date); ?></small>

                                        <p class="card-text"><?php echo e($movie->desc); ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="<?php echo e(route('show_movie',$movie)); ?>">View</a>
                                                <?php if($role==='admin' || $role==='editor'): ?>

                                                    <a class="btn btn-sm btn-warning"
                                                       href="<?php echo e(route('edit_movie',$movie)); ?>">Edit</a>

                                                <?php endif; ?>


                                            </div>
                                            <small class="text-muted">
                                                Rating: <?php echo e(number_format($movie->getRating(),1)); ?></small>
                                            <small class="text-muted">Length: <?php echo e($movie->length); ?>min</small>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>

                </div>
                <div class="row h-100 justify-content-center align-items-center">

                    <?php echo e($movies->render()); ?>

                </div>

            </div>
        </div>


    </main>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
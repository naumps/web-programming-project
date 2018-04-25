<header>

    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="<?php echo e(route('movies')); ?>" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                    <circle cx="12" cy="13" r="4"></circle>
                </svg>
                <strong>Album</strong>
            </a>


            <?php if(auth()->guard()->check()): ?>
                <span class="navbar-brand d-flex align-items-center">

                    <strong>Hi, <?php echo e(auth()->user()->name); ?>!</strong>
                </span>
            <?php endif; ?>

        </div>


        <div class="dropdown show">

            <a style="padding-right: 40px" class="btn btn-secondary dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Options
            </a>

            <div class="dropdown-menu">

                <a class="dropdown-item" href="<?php echo e(route("home")); ?>">Movies</a>
                <a class="dropdown-item" href="<?php echo e(route('actors')); ?>">Actors</a>
                <a class="dropdown-item" href="<?php echo e(route('categories')); ?>">Categories</a>
                <a class="dropdown-item" href="<?php echo e(route('directors')); ?>">Directors</a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'subscriber' ): ?>
                        <a class="dropdown-item" href="<?php echo e(route('my_lists')); ?>">My lists</a>
                        <a class="dropdown-item" href="<?php echo e(route('change_plan')); ?>">Change Plan</a>
                    <?php else: ?>
                        <?php if(auth()->user()->role ==='user'): ?>
                            <a class="dropdown-item" href="<?php echo e(route('subscriptions')); ?>">Subscribe</a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(auth()->user()->role ==='editor'): ?>
                        <a class="dropdown-item" href="<?php echo e(route('my_lists')); ?>">My lists</a>
                        <a class="dropdown-item" href="<?php echo e(route('my_movies')); ?>">My movies</a>
                    <?php endif; ?>


                    <?php if(auth()->user()->role ==='admin'): ?>
                        <a class="dropdown-item" href="<?php echo e(route('my_movies')); ?>">My movies</a>
                        <a class="dropdown-item" href="<?php echo e(route('my_lists')); ?>">My lists</a>
                        <a class="dropdown-item" href="<?php echo e(route('lists')); ?>">All lists</a>
                        <a class="dropdown-item" href="<?php echo e(route('users')); ?>">Users</a>
                    <?php endif; ?>

                    <a class="dropdown-item" href="<?php echo e(route('2fa')); ?>">Two factor auth</a>
                    <form method="POST" action="<?php echo e(url("logout")); ?>">
                        <?php echo e(csrf_field()); ?>

                        <button class="dropdown-item">Log out</button>
                    </form>

                <?php else: ?>

                    <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Sign in</a>
                <?php endif; ?>

            </div>
        </div>

    </div>
</header>


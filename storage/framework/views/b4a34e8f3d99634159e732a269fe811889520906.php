<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">All lists created by all users</h1>
            <p class="lead text-muted">Only admins can see all lists!</p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">


            <div class="row">
                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">

                            <div class="card-body">
                                <a href="<?php echo e(route('show_list',$list)); ?>"><h4><?php echo e($list->name); ?></h4></a>
                                <small class="text-muted">Created by: <?php echo e($list->createdBy->name); ?></small>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                       
                                        


                                    </div>

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
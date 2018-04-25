<?php $__env->startSection('content'); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Hi, <?php echo e($user->name); ?>! </h1>
                <p class="lead text-muted">Here are your lists:</p>
                <a href="<?php echo e(route('create_list')); ?>" class="btn btn-primary my-2">Create new list</a>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">
                    <?php if($user->subscription('basic')): ?>

                        <?php for($i =0 ;$i<count($lists);$i++): ?>
                            <?php if($i<3): ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">

                                        <div class="card-body">
                                            <a href="<?php echo e(route('show_list',$lists[$i])); ?>"><h4><?php echo e($lists[$i]->name); ?></h4>
                                            </a>
                                            <small class="text-muted">Created at: <?php echo e($lists[$i]->created_at); ?></small>


                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-outline-secondary"
                                                       href="<?php echo e(route('edit_list',$lists[$i])); ?>">Edit</a>
                                                    <form method="POST" action="<?php echo e(route('delete_list',$lists[$i])); ?>">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <button type="submit" class="btn btn-sm btn-danger">Delete
                                                        </button>

                                                    </form>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">

                                        <div class="card-body">
                                            <a href="<?php echo e(route('change_plan')); ?>"><h4><?php echo e($lists[$i]->name); ?></h4>
                                            </a>
                                            <small class="text-muted">Created at: <?php echo e($lists[$i]->created_at); ?></small>


                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <p>
                                                    <a href="<?php echo e(route('change_plan')); ?>">Change</a> your plan to view and edit
                                                    this list!
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php else: ?>
                        <?php for($i =0 ;$i<count($lists);$i++): ?>
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">

                                    <div class="card-body">
                                        <a href="<?php echo e(route('show_list',$lists[$i])); ?>">
                                            <h4><?php echo e($lists[$i]->name); ?></h4></a>
                                        <small class="text-muted">Created at: <?php echo e($lists[$i]->created_at); ?></small>


                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                   href="<?php echo e(route('edit_list',$lists[$i])); ?>">Edit</a>
                                                <form method="POST"
                                                      action="<?php echo e(route('delete_list',$lists[$i])); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <button type="submit" class="btn btn-sm btn-danger">Delete
                                                    </button>

                                                </form>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>


                    <?php endif; ?>

                </div>

            </div>
        </div>
        </div>

    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Change your <?php echo e($plan[0]); ?> plan</h1>
                <p class="lead text-muted">Here you can change your subscription plan.</p>
                <form action="<?php echo e(route('cancel_subscription')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-danger">Cancel subscription</button>
                </form>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">
                    <?php if($plan[0]!=='basic'): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Basic</h2>
                                    <p>With basic subscription you can create 3 lists with maximum 5 films. It will cost
                                        you 7$</p>
                                    <form action="<?php echo e(route('store_changed_plan',['plan'=>'Basic: Acc'])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($plan[0]!=='regular'): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Regular</h2>
                                    <p>With regular subscription you can create 5 lists with unlimited number of films.
                                        It will cost you 15$/month</p>
                                    <form action="<?php echo e(route('store_changed_plan',['plan'=>'Regular: Acc'])); ?>"
                                          method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($plan[0]!=='premium'): ?>
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h2>Premium</h2>
                                    <p>With regular subscription you can create unlimited number of lists with unlimited
                                        number of films. It will cost you 30$/month</p>
                                    <form action="<?php echo e(route('store_changed_plan',['plan'=>'Premium: Acc'])); ?>"
                                          method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-outline-primary">Change to this plan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
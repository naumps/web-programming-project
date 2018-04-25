<?php $__env->startSection('content'); ?>

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?php echo e($movie->name); ?> </h1>
            <p class="lead text-muted">Choose lists where to add</p>
            <p>

            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <form method="POST" action="<?php echo e(route('add_movie',$movie)); ?>">
                <?php echo e(csrf_field()); ?>


                <select class="" id="lists" name="lists[]" style="width: 200px; height: 100px" multiple>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox-inline">

                            <label>
                                <option value="<?php echo e($list->id); ?>" ><?php echo e($list->name); ?></option>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>


                </select>
                <div>


                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>




        </div>
    </div>
    </div>

</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
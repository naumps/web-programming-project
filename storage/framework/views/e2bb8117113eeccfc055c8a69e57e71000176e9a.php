<?php $__env->startSection('content'); ?>
<main role="main">
    <div class="form-control">


        <form method="POST" action="<?php echo e(route('update_list',$list)); ?>">
            <?php echo e(csrf_field()); ?>



            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" placeholder="title" name="name"
                       value="<?php echo e($list->name); ?>" required>
            </div>


            <div class="form-control">

                <h3>Add new movie to the list: </h3>
                <div class="form-group">
                    <select class="" id="movies" name="movies[]" style="width: 200px; height: 200px" multiple>
                        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox-inline">

                                <label>
                                    <option value="<?php echo e($movie->id); ?>" selected="selected"><?php echo e($movie->name); ?></option>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $moviesThatAreNotInTheList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox-inline">

                                <label>
                                    <option value="<?php echo e($movie->id); ?>"><?php echo e($movie->name); ?></option>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                </div>


            </div>


            <?php if($errors->any()): ?>
                <ul class="alert alert-danger">

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
        <?php endif; ?>
            <hr/>
            <button type="submit" class="btn btn-primary">Save</button>

    </div>


    </form>
    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

<main role="main">
    <div class="form-control">

        <h2>Create new List</h2>

        <form method="POST" action="<?php echo e(route('store_list')); ?>">
            <?php echo e(csrf_field()); ?>



            <div class="form-group">
                <label for="name">Name of the list:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
            </div>

            <select class="" id="movies" name="movies[]" style="width: 200px; height: 200px" multiple>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox-inline">

                        <label>
                            <?php if($m->id == $movie): ?>
                            <option value="<?php echo e($m->id); ?>" selected="selected"><?php echo e($m->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($m->id); ?>" ><?php echo e($m->name); ?></option>
                            <?php endif; ?>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save my list</button>
            </div>


            <?php if($errors->any()): ?>
                <ul class="alert alert-danger">

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            <?php endif; ?>

        </form>
    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
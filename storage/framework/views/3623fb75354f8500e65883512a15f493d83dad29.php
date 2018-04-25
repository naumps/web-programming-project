<!doctype html>
<html lang="en">

<?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('attach_category',$movie)); ?>">
            <?php echo e(csrf_field()); ?>


            <h3>Add categories to the movie</h3>
            <div class="form-group">
                <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="checkbox-inline">
                        <?php if(in_array($category->name,$movieCategoriesNames)): ?>
                            <label><input type="checkbox" name="category[]" checked value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?>


                            </label>
                        <?php else: ?>
                            <label><input type="checkbox" name="category[]" value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?>


                            </label>

                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <div class="form-group">
                    <label for="name">Category:</label>
                    <input type="text" placeholder="New <?php echo e($movie->name); ?> category" class="form-control" id="name"
                           name="name">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
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

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
<!doctype html>
<html lang="en">

<?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main role="main">
    <div class="form-control">
    <form method="POST" action="<?php echo e(route('store_movie')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>




        <div class="form-group">
            <label for="name">Title:</label>
            <input type="text" class="form-control" id="name" placeholder="title" name="name" required >
        </div>

        <div class="form-group">
            <label for="length">Length in minutes:</label>
            <input type="number" class="form-control" id="length" placeholder="length" name="length" required >
        </div>

        <div class="form-group">
            <label for="date">Relise date:</label>
            <input type="date" class="form-control" id="date" placeholder="Date" name="date" required >
        </div>




        <div class="form-group">
            <label for="image_url">Image url:</label>
            <input type="file" class="form-control" id="image_url" name="image_url" >
        </div>



        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea name="desc" id="desc"  placeholder="Short description of the movie" rows="5" class="form-control" required ></textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
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
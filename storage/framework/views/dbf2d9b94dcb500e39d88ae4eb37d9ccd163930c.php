<!doctype html>
<html lang="en">

<?php echo $__env->make('head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>

<?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('update_director',$director)); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field("PATCH")); ?>



            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo e($director->name); ?>" required >
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                       value="<?php echo e($director->slug); ?>" >
            </div>

            <div class="form-group">
                <label for="birth_date">Birth date:</label>
                <input type="date" class="form-control" id="birth_date" placeholder="Date" name="birth_date" value="<?php echo e($director->birth_date); ?>" required >
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" placeholder="location" class="form-control" id="location"  name="location" value="<?php echo e($director->location); ?>" required >
            </div>

            <div class="form-group">
                <label for="image_url">Image url:</label>
                <input type="text" placeholder="url" class="form-control" id="image_url"  name="image_url" value="<?php echo e($director->image_url); ?>"required >
            </div>


            <div class="form-group">
                <label for="bio">Biography:</label>
                <textarea name="bio" id="bio"  placeholder="Short biography of the director" rows="5" class="form-control"  required ><?php echo e($director->bio); ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
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
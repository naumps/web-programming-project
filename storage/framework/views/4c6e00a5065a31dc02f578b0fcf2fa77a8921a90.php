<?php $__env->startSection('content'); ?>
<main role="main">
    <div class="form-control">
        <form method="POST" action="<?php echo e(route('update_user',$user)); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field("PATCH")); ?>



            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo e($user->name); ?>" required >
            </div>



            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" placeholder="email" class="form-control" id="email"  name="email" value="<?php echo e($user->email); ?>" required >
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role[]" id="role">

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($user->role===$r): ?>

                        <option class="form-control"  value="<?php echo e($r); ?>" selected="selected" ><?php echo e($r); ?></option>
                        <?php else: ?>
                            <option class="form-control"  value="<?php echo e($r); ?>"  ><?php echo e($r); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
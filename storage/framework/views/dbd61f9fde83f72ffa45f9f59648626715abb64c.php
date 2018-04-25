<?php $__env->startSection('content'); ?>



    <main role="main">
        <div class="form-control">
            <div class="form-group">

                <form method="GET" action="<?php echo e(route('return')); ?>">
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control searchtitle" id="name" placeholder="title" name="name"
                               required>
                    </div>

                    <button type="submit" class="btn">get movie</button>
                </form>
            </div>
        </div>

    </main>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
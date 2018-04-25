<?php $__env->startSection('content'); ?>

<main role="main">
    <div class="form-control">


        <form method="POST" action="<?php echo e(route('save_edited_movie',$movie)); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>



            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" placeholder="title" name="name"
                       value="<?php echo e($movie->name); ?>" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                       value="<?php echo e($movie->slug); ?>" >
            </div>

            <div class="form-group">
                <label for="length">Length:</label>
                <input type="number" class="form-control" id="length" placeholder="length" name="length"
                       value="<?php echo e($movie->length); ?>" required>
            </div>

            <div class="form-group">
                <label for="date">Relise date:</label>
                <input type="date" class="form-control" id="date" placeholder="Date" name="date"
                       value="<?php echo e($movie->date); ?>" required>
            </div>




            <div class="form-group">
                <label for="image_url">Image url:</label>
                <input type="file" class="form-control" id="image_url" name="image_url" >
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" placeholder="Short description of the movie" rows="5"
                          class="form-control" required><?php echo e($movie->desc); ?></textarea>
            </div>


            <div class="form-group">


            </div>


            <div class="form-control">

                <h3>Add new actor to the movie: </h3>
                <div class="form-group">
                    <select class="" id="actor" name="actors[]" style="width: 200px; height: 200px" multiple>
                        <?php $__currentLoopData = $actors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox-inline">

                                <label>
                                    <option value="<?php echo e($actor->id); ?>" selected="selected"><?php echo e($actor->name); ?></option>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $actorsThatAreNotInTheMovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="checkbox-inline">

                                <label>
                                    <option value="<?php echo e($actor->id); ?>"><?php echo e($actor->name); ?></option>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                </div>


            </div>


            <div class="form-control">


                <h3>Add categories to the movie</h3>
                <div class="form-group">
                    <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="checkbox-inline">
                            <?php if(in_array($category->name,$movieCategoriesNames)): ?>
                                <label><input type="checkbox" name="category[]" checked
                                              value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?>


                                </label>
                            <?php else: ?>
                                <label><input type="checkbox" name="category[]"
                                              value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?>


                                </label>

                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>


            </div>



                <div class="form-control">

                    <h3>Add director to the movie: </h3>
                    <div class="form-group">
                        <select id="director" name="director[]" style="width: 140px">

                            <?php if(empty($director)): ?>
                                <option selected="selected" value="0">Unknown</option>
                                <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dir->id); ?>"><?php echo e($dir->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <option value="0">Unknown</option>
                                <option value="<?php echo e($director->id); ?>" selected="selected"><?php echo e($director->name); ?></option>
                                <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($dir->id !== $director->id): ?>
                                        <option value="<?php echo e($dir->id); ?>"><?php echo e($dir->name); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


                        </select>


                    </div>


                    <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">

                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    <?php endif; ?>

                </div>



            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        <form method="POST" action="<?php echo e(route('delete_movie',$movie)); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>


            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>


    </div>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
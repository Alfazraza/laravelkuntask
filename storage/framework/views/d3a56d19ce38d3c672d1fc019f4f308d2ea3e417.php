   
<?php $__env->startSection('content'); ?>
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Class</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('classes.index')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
  
    <form action="/classes/<?php echo e($class->id); ?>" method="POST">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo e(method_field('PUT')); ?>

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" name="code" value="<?php echo e($class->code); ?>" class="form-control" placeholder="Code">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                     <input type="text" name="name" value="<?php echo e($class->name); ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Maximum Students:</strong>
                     <input type="text" name="maximum_students" value="<?php echo e($class->maximum_students); ?>" class="form-control" placeholder="Maximum Students">
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                        <select class="form-control" name="status">
                            <option value="">Please select any option</option>
                            <?php if($class->status=="opened"): ?>
                                <option value="opened" selected>Opened</option>
                                <option value="closed">Closed</option>
                            <?php else: ?>
                                <option value="opened">Opened</option>
                                <option value="closed" selected>Closed</option>
                            <?php endif; ?>
                        </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                     <input type="text" name="description" value="<?php echo e($class->description); ?>" class="form-control" placeholder="description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('classes.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
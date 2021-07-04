   
<?php $__env->startSection('content'); ?>
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('students.index')); ?>"> Back</a>
            </div>
            <div class="pull-right m-right">
                <a class="btn btn-primary" href="<?php echo e(route('classes.index')); ?>"> Goto Classes</a>
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
    <form action="/students/<?php echo e($student->id); ?>" method="POST">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
<?php echo e(method_field('PUT')); ?>


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" value="<?php echo e($student->first_name); ?>" class="form-control" placeholder="First Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                     <input type="text" name="last_name" value="<?php echo e($student->last_name); ?>" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                
                  <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">                
                            <strong>Class:</strong>
                               <select class="form-control" name="kunacademy_id">
                                <option value="">Please select any class</option>

                    <?php if(count($classes)): ?>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($class->id == $student->kunacademy_id): ?>
                            <option value="<?php echo e($class->id); ?>" selected>
                                <?php echo e($class->code); ?>

                            </option>
                            <?php else: ?>
                            <option value="<?php echo e($class->id); ?>">
                                <?php echo e($class->code); ?>

                            </option>

                             <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                      <option>No class record found</option>
                    <?php endif; ?>
                    </select>
                        </div>
                        </div>
            </div>
        
           
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Date of Birth:</strong>
                <input class="form-control" type="date" name="date_of_birth" value="<?php echo e($student->date_of_birth); ?>" placeholder="Date of Birth">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('students.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
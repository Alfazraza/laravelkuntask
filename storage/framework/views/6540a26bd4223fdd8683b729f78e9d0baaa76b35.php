  
<?php $__env->startSection('content'); ?>
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Student Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('students.index')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
   <div class="row m_t">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <?php echo e($student->first_name); ?>

            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                <?php echo e($student->last_name); ?>

            </div>
        </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
                
                        <div class="form-group">                
                            <strong>Class:</strong>

                    <?php if(count($classes)): ?>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($class->id == $student->kunacademy_id): ?>
                                <?php echo e($class->code); ?>

                             <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php endif; ?>
                        </div>
            </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                <?php echo e($student->date_of_birth); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('students.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
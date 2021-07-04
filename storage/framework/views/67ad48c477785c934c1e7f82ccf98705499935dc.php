  
<?php $__env->startSection('content'); ?>
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Class Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('classes.index')); ?>"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <?php echo e($class->code); ?>

            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <?php echo e($class->name); ?>

            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Maximum Students:</strong>
                <?php echo e($class->maximum_students); ?>

            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <?php echo e($class->status); ?>

            </div>
        </div>
    </div>

        <div class="pull-left">
                <h2> </h2>
            </div>

       <table class="table table-bordered">
        <tr>
            <th>SI No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
        <?php 
        $i = 0
         ?>
       <?php if(count($students)): ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($student->first_name); ?></td>
            <td><?php echo e($student->last_name); ?></td>
            <td><?php echo e($student->date_of_birth); ?></td>
            <td>
                <form action="<?php echo e(route('students.destroy',$student->id)); ?>" method="POST">
   
    
                    <a class="btn btn-primary" href="<?php echo e(route('students.edit',$student->id)); ?>">Edit</a>
             <?php echo e(method_field('DELETE')); ?>

                <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td class="center" colspan="7">No records found</td>
            </tr>
        <?php endif; ?>

    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('classes.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
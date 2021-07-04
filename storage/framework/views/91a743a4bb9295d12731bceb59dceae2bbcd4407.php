 
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Kun Academy (Student Module) </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('students.create')); ?>"> Add New Student</a>
            </div>
             <div class="pull-right goto_home">
                <a class="btn btn-success" href="/"> Goto Home</a>
            </div>
        </div>
    </div>
   
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered">
        <tr>
            <th>SI No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Class Code</th>
            <th>Date of Birth</th>
            <th width="280px">Action</th>
        </tr>
       <?php if(count($students)): ?>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($student->first_name); ?></td>
            <td><?php echo e($student->last_name); ?></td>
            <td><?php echo e($student->code); ?></td>
            <td><?php echo e($student->date_of_birth); ?></td>
            <td>
                <form action="<?php echo e(route('students.destroy',$student->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('students.show',$student->id)); ?>">Show</a>
    
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
<?php echo $__env->make('students.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
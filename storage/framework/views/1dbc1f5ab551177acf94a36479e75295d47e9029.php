 
<?php $__env->startSection('content'); ?>
    <div class="row padding-bt">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Kun Academy (Class Module) </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('classes.create')); ?>"> Add New class</a>
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
            <th>No</th>
            <th>Code</th>
            <th>Name</th>
            <th>Maximum Students</th>
            <th>Status</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
       <?php if(count($classes)): ?>
        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($class->code); ?></td>
            <td><?php echo e($class->name); ?></td>
            <td><?php echo e($class->maximum_students); ?></td>
            <td><?php echo e($class->status); ?></td>
            <td><?php echo e($class->description); ?></td>
            <td>
                <form action="<?php echo e(route('classes.destroy',$class->id)); ?>" method="POST">
   
                    <a class="btn btn-info" href="<?php echo e(route('classes.show',$class->id)); ?>">Show</a>
    
                    <a class="btn btn-primary" href="<?php echo e(route('classes.edit',$class->id)); ?>">Edit</a>
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
  
    <?php echo $classes->links(); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('classes.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
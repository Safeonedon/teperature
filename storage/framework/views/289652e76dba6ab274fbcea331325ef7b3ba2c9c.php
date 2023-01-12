<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-12 p-2">
        <div class="card"  style="background: #ffe0e0;">
            <h4 class="text-center mt-4">Today</h4>
            <div class="card-body">

                    <div class="row">
                         <div class="col" scope="col">Ref</div>
                         <div class="col" scope="col">Date</div>
                         <div class="col" scope="col">Time</div>
                        <div class="col" scope="col">Temperature</div>
                        <div class="col" scope="col">action</div>
                    </div>


                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form method="post" action="<?php echo e(url('/crud')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row mt-4" >

                                <div class="col" scope="col" >
                                    #<?php echo e($temp->reference); ?>

                                </div>
                                <div class="col" scope="col">
                                    <input type="text" class="form-control"  value="<?php echo e($temp->date); ?>" name="date">
                                </div>
                                <div class="col" scope="col">
                                    <input type="text" class="form-control"  value="<?php echo e($temp->time); ?>" name="time">
                                </div>
                                <div class="col"  style="position: relative">
                                    <input type="text" class="form-control"  value="<?php echo e($temp->temperature); ?>" name="temperature">
                                   <span style="    position: absolute;
    right: 21px;
    top: 9px;">C°</span>
                                </div>

                                 <div class="col" scope="col">
                                     <button type="submit" class="btn btn-success" > &#9998; </button>
                                     <a href="<?php echo e(url('/deletecrud/'.$temp->reference)); ?>" class="btn btn-danger"  >⊗ </a>
                                     </div>



                   </div>
                    </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

            </div>
        </div>


    </div>

</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myinocod/resources/views/pages/crud.blade.php ENDPATH**/ ?>
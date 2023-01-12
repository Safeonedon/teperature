<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-4 p-2">
        <div class="card"  style="    background: #ffe0e0;">
            <h4 class="text-center mt-4">Today</h4>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                         <th scope="col">Time</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                             <td><?php echo e($temp->time); ?></td>
                            <td><?php echo e($temp->temperature); ?> C°</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo e($temp->temperature * 100 / 44); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <div class="col-sm-8 p-2">

            <div class="card"  style="    background: #ffeCCC;">
                <h4 class="text-center mt-4">Week</h4>
                <div class="card-body">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $__currentLoopData = $dataweek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link <?php if($key == date('Y-m-d')): ?> active <?php endif; ?>" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#<?php echo e(date('l', strtotime($key))); ?>" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo e(date('l', strtotime($key))); ?></button>
            </li>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </ul>

        <div class="tab-content" id="pills-tabContent">
            <?php $__currentLoopData = $dataweek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade   <?php if($key == date('Y-m-d')): ?> show active <?php endif; ?>" id="<?php echo e(date('l', strtotime($key))); ?>" role="tabpanel" aria-labelledby="pills-home-tab">

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Temperature</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($temp->date); ?></td>
                                    <td><?php echo e($temp->time); ?></td>
                                    <td><?php echo e($temp->temperature); ?> C°</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($temp->temperature * 100 / 44); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
            </div>
        </div>


    </div>

</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myinocod/resources/views/pages/daily.blade.php ENDPATH**/ ?>
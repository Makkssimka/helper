<?php $__env->startSection('content'); ?>
    <div class="errors-block">
        <div class="errors-string">
            <span class="errors-code">404</span>, страница не найдена <span class="errors-pointer"></span>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
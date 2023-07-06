<?php $__env->startSection('content'); ?>

<div class="nav-side">
    <div class="dashboard">Main</div>
      <div class="dash">
        <img src="/svg/dashboard2.png" class="img"  alt="">
        <button class="btn dropdown-toggle menu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">profile</a></li>
        <li><a class="dropdown-item" href="#">charts</a></li>
    </ul>
    </div>
   </div>

   <div class="posts">
    <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>

    <?php $__currentLoopData = $userPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="user-caption"><h3><?php echo e($post->caption); ?></h3></div>
       <div class="user-image"><img src="<?php echo e(asset($post->image)); ?>"></div>


       <div class="like"><a href="<?php echo e(url('liked /' .$post->id. '/')); ?>"><ion-icon name="heart-outline" class="like-icon"></ion-icon><span>like</span></a></div>
       <div class="dislike"><a href=""><ion-icon name="heart-dislike-outline" class="dislike-icon"></ion-icon><span>dislike</span></a></div>

       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/home.blade.php ENDPATH**/ ?>
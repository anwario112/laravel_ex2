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
   <form action="<?php echo e(route('like')); ?>" method="POST">
    <?php echo csrf_field(); ?>
   <div class="posts">
    <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>

    <?php $__currentLoopData = $combinedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="user-image"><img src="<?php echo e(asset($post['image'])); ?>"></div>
        <div class="user-caption"><h3><?php echo e($post['caption']); ?></h3></div>



        <?php
            $like_status="btn-secondary";
            $dislike_status="btn_secondary";
        ?>

              <?php $__currentLoopData = $post['likes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        if($like['likeCount'] && $like['user_id']==Auth::user()->id){
                          $like_status="btn-success";
                        }
                        if($like['dislikeCount'] && $like['user_id']==Auth::user()->id){
                          $dislike_status="btn-danger";
                        }

                     ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="like" ><button type="button" data-postid="<?php echo e($post['id']); ?>_L" data-like=<?php echo e($like_status); ?> class="likes btn <?php echo e($like_status); ?>" >Like <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="likeCount"><?php echo e($like['likeCount']); ?></span></b></span></button></div>
        <div class="dislike" ><button type="button" data-postid="<?php echo e($post['id']); ?>_D" data-dislike=<?php echo e($dislike_status); ?> class="dislikes btn <?php echo e($dislike_status); ?>" >Dislike <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="dislikeCount"><?php echo e($like['dislikeCount']); ?></span></b></span></button></div>



</form>

</div>
<script src="<?php echo e(url('/js/like.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/home.blade.php ENDPATH**/ ?>
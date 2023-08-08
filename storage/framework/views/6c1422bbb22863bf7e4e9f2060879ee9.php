<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="nav-side">
         <div class="dash">
            <h3 class="title">forax</h3>
         <button class="home-btn"><ion-icon name="home" class="home"></ion-icon>Home</button>
         <button class="profile-btn"><ion-icon name="person-outline" class="profile-create"></ion-icon >Profile</button>
            <div class="create">  <button class="create-btn text-black" id="create-btn"> <ion-icon name="create-outline" class="create"></ion-icon>create</button></div>
       </div>
       
    </div>

   <!--modal-->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-modal" id="closeModalBtn">&times;</span>
         <img src="/svg/profile.png" class="modal-img" alt="">

        <!--dropdown-->
         <button id="openModalBtn">Everyone <img src="/svg/dropdown.png" class="dropdown" alt=""></button>

                <div id="myModal" class="dropdown-modal">
                  <div class="dropdown-content">
                    <span class="Exit">&times;</span>
                    <h4 class="title-drop">Choose audience</h4>
                    <img src="/svg/world.png" class="world" alt="">
                    <h6 class="world-everyone">Everyone</h6>
                    <img src="/svg/users.png" class="users" alt="">
                    <h6 class="users-circle">Circle</h6>
                  </div>
                </div>
                <!--end-->

        <form action="<?php echo e(route('storeImage')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>


            <div class="row pt-5 ">
                <div class="col-8 offset-2">
                    <div class="row mb-3">
                       <div id="message" class="alert" style="displat:none"></div>
                        <div class="col-md-6">
                        <form  action="<?php echo e(route('storeImage')); ?>" method="POST" enctype="multipart/form-data" id="form" >
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <textarea type="text" id="captionInput" name="caption" placeholder="write a caption !!" class="caption-input" class=" <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('caption')); ?>"
                                required autocomplete="caption" autofocus required></textarea>

                            </div>
                              <?php $__errorArgs = ['caption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <span class="invalid-feedback" role="alert">
                                  <strong><?php echo e($message); ?></strong>
                              </span>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div><h5 class="tag">Everyone can reply</h5></div>
                    <hr class="line">

                    <div class="row">

                        <input type="file" id="uploadInput" name="image" class="input-file">
                         <label for="uploadInput" class="custom-upload-btn">
                                     <img src="/svg/gallery.png" class="gallery" alt="">
                                     <img src="/svg/poll.png" class="gallery1" alt="">

                            </label>


                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    </div>

                    <div class=" btns row pt-3">
                        <button class="btn btn-primary" class="post-btn">Add post</button>
                    </div>

                </div>
                </div>
        </form>
    </div>
</div>
</div>

    </div>
    <form action="<?php echo e(route('like')); ?>" method="POST" name="form">
          <div class="posts">

                   <?php echo csrf_field(); ?>
                    <?php $__currentLoopData = $combinedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="post-form">
                            <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>
                            <div><img src="/svg/point.png" class="point" alt=""></div>
                            <div><h3 class="username-title"><?php echo e($post['user_username']); ?></h3></div>
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
                         <div class="like" ><button type="button" data-postid="<?php echo e($post['id']); ?>_L" data-like=<?php echo e($like_status); ?> class="likes btn <?php echo e($like_status); ?>" >Like <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="likeCount"><?php echo e($like['likeCount']); ?></span></b></span></button></div>
                         <div class="dislike" ><button type="button" data-postid="<?php echo e($post['id']); ?>_D" data-dislike=<?php echo e($dislike_status); ?> class="dislikes btn <?php echo e($dislike_status); ?>" >Dislike <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="dislikeCount"><?php echo e($like['dislikeCount']); ?></span></b></span></button></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </form>





</div>
<script src="<?php echo e(url('/js/like.js')); ?>"></script>
<script src="<?php echo e(url('/js/modal.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/home.blade.php ENDPATH**/ ?>
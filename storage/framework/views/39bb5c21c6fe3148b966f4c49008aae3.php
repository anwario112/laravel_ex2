<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="nav-side">
    <div class="dashboard">Main</div>
      <div class="dash">
        <img src="/svg/dashboard2.png" class="img"  alt="">
        <button class="btn  text-white dropdown-toggle menu" type="button"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">profile</a></li>
        <li><a class="dropdown-item" href="#">charts</a></li>
    </ul>
    </div>
    <button class="create-btn" id="create-btn"> <ion-icon name="create-outline" class="create"></ion-icon>create</button>

   </div>
   <div class="profile">
    <div class="pro-image">
    <img src="/svg/profile.png" class="rounded-circle profile-image" alt="">
    </div>
    <div class="profile-username">
        <h2 class="username"><?php echo e($user->username); ?></h2>
    </div>
    <div class="profile-caption">
        <p class="pro-caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum dolore labore reiciendis ipsam deserunt magnam quos omnis nulla doloremque, pariatur, unde architecto rem officiis eveniet sint quam voluptas dignissimos. Illo?</p>
    </div>
    <div class="profile-email">
        <a href="" class="pro-email"><?php echo e($user->email); ?></a>
     </div>
       </div>

       <!-- Modal -->
       <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeModalBtn">&times;</span>
            <h2>Add New Post</h2>
            <form action="<?php echo e(route('storeImage')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row ">

                </div>
                <div class="row pt-5 ">
                    <div class="col-8 offset-2">
                        <div class="row mb-3">
                           <div id="message" class="alert" style="displat:none"></div>
                            <div class="col-md-6">
                            <form  action="<?php echo e(route('storeImage')); ?>" method="POST" enctype="multipart/form-data" id="form" >
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <textarea type="text" id="captionInput" name="caption" placeholder="write a caption" class="caption-input" class=" <?php $__errorArgs = ['caption'];
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

                        <div class="row">

                            <input type="file" id="uploadInput" name="image" class="input-file">
                             <label for="uploadInput" class="custom-upload-btn">
                                         <span>select from computer</span>
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
                        <div class="row pt-3">
                            <button class="btn btn-primary">Add post</button>
                        </div>

                    </div>
                    </div>
            </form>

        </div>
    </div>
  <!--end-->
      <div>
    </div>
   </div>
</div>
<script src="<?php echo e(url('/js/modal.js')); ?>"></script>
<script src="<?php echo e(url('/js/uploadpost.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/profiles/index.blade.php ENDPATH**/ ?>
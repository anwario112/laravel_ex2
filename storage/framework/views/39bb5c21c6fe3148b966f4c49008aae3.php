<?php $__env->startSection('content'); ?>
<div class="container">

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
            <form action="<?php echo e(route('storeImage')); ?>" method="POST" enctype="multipart/form-data" name="formPost">
                <?php echo csrf_field(); ?>
                <div class="row pt-5 ">
                    <div class="col-8 offset-2">
                        <div class="row mb-3">
                           <div id="message" class="alert" style="displat:none"></div>
                            <div class="col-md-6">
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
                        <div><a href="" class="tag"><ion-icon name="globe" class="tag2"></ion-icon>Everyone can reply</a></div>
                        <hr class="line">

                        <div class="row">
                            <input type="file" id="uploadInput" name="image" class="input-file">
                             <label for="uploadInput" class="custom-upload-btn">
                                         <img src="/svg/gallery.png" class="gallery" alt="">
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
                           <div class=" btns">
                              <button class="btn-post">Add post</button>
                           </div>

                        </div>
                      </div>
                 </div>
               </form>
            </div>
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



</div>
<script src="<?php echo e(url('/js/modal.js')); ?>"></script>
<script src="<?php echo e(url('/js/uploadpost.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/profiles/index.blade.php ENDPATH**/ ?>
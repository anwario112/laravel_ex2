<?php $__env->startSection('content'); ?>
<div class="container">
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
   <div class="profile">
    <div class="profile-data">
        <img src="/svg/profile.png" class="rounded-circle profile-img" alt="">
        <div>
            <h2 class="user"><?php echo e($user->username); ?></h2>
            <h2 class="email"><a href=""><?php echo e($user->email); ?></a></h2>
            <div class="description"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Consectetur quam quos, ut laboriosam quisquam alias blanditiis architecto explicabo rerum nobis enim, id illum! Ab sint libero quos magni, deleniti iusto.</p></div>
        </div>
        <div>
            <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#edit-profile">
                Edit profile
              </button>

              <div class="modal fade" id="edit-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                       <?php if($errors->any()): ?>
                         <div class="alert alert-danger">
                             <ul>
                                 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <li><?php echo e($error); ?></li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </ul>
                         </div>
                     <?php endif; ?>
                    <form action="">
                        <?php echo csrf_field(); ?>
                    <div class="modal-body">
                       <div>
                        <img src="/svg/profile.png" class="rounded-circle img-modal" alt="">
                       </div>
                       <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" class="image" name="">
                      </div>

                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="textarea" class="form-control" name="descripton" class="detail">
                      </div>
                    </div>
                     </form>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
       </div>
      <div>
    </div>

    <div>
        <a href="/p/create"  class="btn btn-danger btn-post" >post</a>

        <div class="modal fade" id="post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" caption='caption'
                     data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="profile" enctype="multipart/form-data" method="post"></form>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                  <div>

                    <input type="text" class="input-modal"  name="caption" placeholder="Type something">

                    <?php $__errorArgs = ['name'];
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
                  <div>

                    <input type="file" placeholder="image"  name="image"class="image-modal">


                    <?php $__errorArgs = ['name'];
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">add</button>
                </div>
              </div>
            </div>
          </div>


    </div>

    <div class="posts">
        <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>

        <?php $__currentLoopData = $userPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <div><h3><?php echo e($post->caption); ?></h3></div>
           <div><img src="<?php echo e(asset('storage/images' . $post->images)); ?>"></div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


   </div>
</div>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/profiles/index.blade.php ENDPATH**/ ?>
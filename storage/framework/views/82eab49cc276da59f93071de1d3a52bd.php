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
                    <form action="" enctype="multipart/form-data" method="post">
                        <?php echo csrf_field(); ?>
                    <div class="modal-body">
                       <div>
                        <img src="/svg/profile.png" class="rounded-circle img-modal" alt="">
                       </div>
                       <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" class="image" name="image">
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
        <a href=""  class="btn btn-danger btn-post"  data-bs-toggle="modal" data-bs-target="#post">post</a>

        <div class="modal fade" id="post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div><input type="text" class="input-modal" placeholder="Type something"></div>
                  <div><input type="file" placeholder="image" class="image-modal"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>


    </div>

    <div class="posts">
        <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>
        <div><h5 class="user-post"><?php echo e($user->username); ?></h5></div>
        <div><h3 class="post-caption">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, suscipit distinctio dolorem corrupti placeat ducimus, facilis atque reprehenderit deserunt officia porro, nulla doloremque rerum tempora odio dolorum impedit adipisci earum?</h3></div>

    </div>

   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\project\resources\views/index.blade.php ENDPATH**/ ?>
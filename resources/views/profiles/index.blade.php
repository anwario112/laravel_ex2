@extends('layouts.app')

@section('content')
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
            <h2 class="user">{{$user->username}}</h2>
            <h2 class="email"><a href="">{{$user->email}}</a></h2>
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
                       @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     @endif
                    <form action="">
                        @csrf
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
                @csrf
                <div class="modal-body">
                  <div>

                    <input type="text" class="input-modal"  name="caption" placeholder="Type something">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                  <div>

                    <input type="file" placeholder="image"  name="image"class="image-modal">


                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

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

   </div>
</div>


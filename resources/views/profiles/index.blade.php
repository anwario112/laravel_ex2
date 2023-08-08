@extends('layouts.app')

@section('content')
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
        <h2 class="username">{{$user->username}}</h2>
    </div>
    <div class="profile-caption">
        <p class="pro-caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum dolore labore reiciendis ipsam deserunt magnam quos omnis nulla doloremque, pariatur, unde architecto rem officiis eveniet sint quam voluptas dignissimos. Illo?</p>
    </div>
    <div class="profile-email">
        <a href="" class="pro-email">{{$user->email}}</a>
     </div>
       </div>

       <!-- Modal -->
       <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeModalBtn">&times;</span>
            <h2>Add New Post</h2>
            <form action="{{ route('storeImage') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row ">

                </div>
                <div class="row pt-5 ">
                    <div class="col-8 offset-2">
                        <div class="row mb-3">
                           <div id="message" class="alert" style="displat:none"></div>
                            <div class="col-md-6">
                            <form  action="{{route('storeImage')}}" method="POST" enctype="multipart/form-data" id="form" >
                                @csrf
                                <div class="form-group">
                                    <textarea type="text" id="captionInput" name="caption" placeholder="write a caption" class="caption-input" class=" @error('caption') is-invalid @enderror" value="{{ old('caption') }}"
                                    required autocomplete="caption" autofocus required></textarea>

                                </div>
                                  @error('caption')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>

                        <div class="row">

                            <input type="file" id="uploadInput" name="image" class="input-file">
                             <label for="uploadInput" class="custom-upload-btn">
                                         <span>select from computer</span>
                                </label>
                                

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

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
<script src="{{url('/js/modal.js')}}"></script>
<script src="{{url('/js/uploadpost.js')}}"></script>

@endsection


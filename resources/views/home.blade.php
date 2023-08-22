
@extends('layouts.app')
@section('content')

<div class="containers">
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
        <form action="{{ route('storeImage') }}" method="POST" enctype="multipart/form-data" name="formPost">
            @csrf
            <div class="row pt-5 ">
                <div class="col-8 offset-2">
                    <div class="row mb-3">
                       <div id="message" class="alert" style="displat:none"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea type="text" id="captionInput" name="caption" placeholder="write a caption !!" class="caption-input" class=" @error('caption') is-invalid @enderror" value="{{ old('caption') }}"
                                required autocomplete="caption" autofocus required></textarea>

                              @error('caption')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div><a href="" class="tag"><ion-icon name="globe" class="tag2"></ion-icon>Everyone can reply</a></div>
                    <hr class="line">

                    <div class="row">
                        <input type="file" id="uploadInput" name="image" class="input-file">
                         <label for="uploadInput" class="custom-upload-btn">
                                     <img src="/svg/gallery.png" class="gallery" alt="">
                            </label>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
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



         <!--post-form-->
           <form action="{{route('like')}}" method="POST" name="form">
            @csrf
              <div class="posts">
                      @foreach ($combinedData as $post)
                          <div class="post-form">
                              <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>
                              <div><img src="/svg/point.png" class="point" alt=""></div>
                              <div><h3 class="username-title">{{$post['user_username']}}</h3></div>

                              <div class="user-image"><img src="{{ asset($post['image']) }}"></div>
                              <div class="user-caption"><h3>{{ $post['caption'] }}</h3></div>
                           @php

                              $like_status="btn-secondary";
                              $dislike_status="btn_secondary";
                          @endphp

                                  @foreach ($post['likes'] as $like)
                                         @php
                                          if($like['likeCount'] && $like['user_id']==Auth::user()->id){
                                              $like_status="btn-success";
                                            }
                                           if($like['dislikeCount'] && $like['user_id']==Auth::user()->id){
                                                     $dislike_status="btn-danger";
                                 }
                                      @endphp
                           @endforeach
                           <div class="like" ><button type="button" data-postid="{{$post['id']}}_L" data-like={{$like_status}} class="likes btn {{$like_status}}" >Like <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="likeCount">{{$like['likeCount']}}</span></b></span></button></div>
                           <div class="dislike" ><button type="button" data-postid="{{$post['id']}}_D" data-dislike={{$dislike_status}} class="dislikes btn {{$dislike_status}}" >Dislike <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="dislikeCount">{{$like['dislikeCount']}}</span></b></span></button></div>

                  </div>
                  @endforeach
            </div>
         </form>
         <!--endpost-form-->

         <form action="{{route('search')}}" method ="post">
            @csrf
         <div class="search">
            <input type="search" name="search" class="search-btn" id="search" placeholder="search">
           </div>
        </form>

          <div id="user_list"></div>



</div>

<script src="{{url('/js/like.js')}}"></script>
<script src="{{url('/js/modal.js')}}"></script>
<script src="{{url('/js/search.js')}}"></script>





@endsection

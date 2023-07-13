
@extends('layouts.app')
@section('content')

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

    @foreach ($postArray as $post)

       <div class="user-image"><img src="{{asset($post['image'])}}"></div>
       <div class="user-caption"><h3>{{$post['caption']}}</h3></div>
       @endforeach


       @php
       $like_count=0;
       $dislike_count=0;

       $like_status="btn-secondary";
       $dislike_status="btn-secondary";
       @endphp
    @foreach($postArray['likes'] as $like )

         @php
         if($like->Like==1){
            $like_count++;
         }
         if($like->like==0){
            $dislike_count++;
         }
         if($like->like ==1  && $like->user_id == Auth::user_id()->id){
            $like_status="btn-success";
         }
         if($like->like ==0 && $like->user_id == Auth::user_id()->id){
            $dislike_status="btn-danger";
         }

         @endphp
    @endforeach
      <div class="like"><button type="button" class="btn ">Like <span class="glyphicon glyphicon-chevron-right"></span> <span><b>{{$like_count}}</b></span></button></div>
       <div class="dislike"><button type="button" class="btn ">Dislike <span class="glyphicon glyphicon-thumbs-down"> <span><b>{{$dislike_count}}</b></span></span></button></div>


</div>




@endsection

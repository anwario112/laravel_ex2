
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

    @foreach ($userPost as $post)
       <div class="user-caption"><h3>{{$post->caption}}</h3></div>
       <div class="user-image"><img src="{{asset($post->image)}}"></div>


       <div class="like"><a href="{{url('liked /' .$post->id. '/')}}"><ion-icon name="heart-outline" class="like-icon"></ion-icon><span>like</span></a></div>
       <div class="dislike"><a href=""><ion-icon name="heart-dislike-outline" class="dislike-icon"></ion-icon><span>dislike</span></a></div>

       @endforeach

</div>




@endsection

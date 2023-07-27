
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
   <form action="{{route('like')}}" method="POST">
    @csrf
   <div class="posts">
    <div><img src="/svg/profile.png" class=" rounded-circle img-post" alt=""></div>

    @foreach ($combinedData as $post)
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
        @endforeach

        <div class="like" ><button type="button" data-postid="{{$post['id']}}_L" data-like={{$like_status}} class="likes btn {{$like_status}}" >Like <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="likeCount">{{$like['likeCount']}}</span></b></span></button></div>
        <div class="dislike" ><button type="button" data-postid="{{$post['id']}}_D" data-dislike={{$dislike_status}} class="dislikes btn {{$dislike_status}}" >Dislike <span class="glyphicon glyphicon-chevron-right"></span> <span><b><span class="dislikeCount">{{$like['dislikeCount']}}</span></b></span></button></div>



</form>

</div>
<script src="{{url('/js/like.js')}}"></script>


@endsection

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }
    public function getallUserposts(){
        $id = Auth::user()->id;
        $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
        ->where('user_id', $id)
        ->select('posts.*', 'users.username as user_username')
        ->get();


        // Fetch likes for all posts in one query
        $likes = DB::table('posts AS p')
        ->select('p.user_id', 'p.id AS post_id')
        ->selectRaw('SUM(CASE WHEN l.likes = 1 THEN 1 ELSE 0 END) AS likeCount')
        ->selectRaw('SUM(CASE WHEN l.likes = 0 THEN 1 ELSE 0 END) AS dislikeCount')
        ->leftJoin('likes AS l', 'p.id', '=', 'l.post_id')
        ->groupBy('p.user_id', 'p.id')
        ->get();

        $combinedData = [];
        foreach ($posts as $post) {
            $postArray = [
                'id' => $post->id,
                'image' => $post->image ?? null,
                'caption' => $post->caption ?? null,
                'user_username' => $post->user_username,
                'likes' => [],

            ];

            // Fetch likes for the current post and add them to the 'likes' array
            foreach ($likes as $like) {
                if ($like->post_id === $post->id) {
                    $postArray['likes'][] = [
                        'likes' => $like->likeCount,     // Use 'likeCount' instead of 'likes'
                        'likeCount' => $like->likeCount,
                        'dislikeCount' => $like->dislikeCount,
                        'user_id' => $like->user_id,
                        'post_id' => $like->post_id,
                    ];
                }
            }

            $combinedData[] = $postArray;
        }

        return view('home')->with('combinedData', $combinedData);
     }




     public function search(Request $request) {

            if($request->ajax()){
                $data=USER::where('name','like',$request->search.'%')->get();
                $output='';
                if(count($data)>0){
                    $output='<ul class="list-group" style="display:block;position:relative;z-index:1">';
                    foreach($data as $row){
                        $output.='<li class="list-group-item">'.$row->name.'<li>';
                    }
                    $output.='<ul>';
                }else{
                    $output.='<li class="list-group-item">no data found</li>';
                }
                return $output;
            }

            return view('search');

    }


}

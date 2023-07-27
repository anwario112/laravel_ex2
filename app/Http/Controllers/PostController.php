<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\likes;
use App\User;
use Illuminate\Support\Facades\Session;





class PostController extends Controller
{
    public function __construction(){

        $this->middleware('auth');

    }
    public function create(){

         return view('posts.create');

    }




        public function storeImage(Request $request){


            $request->validate([
                'caption' => 'required',
                'image' => 'required|image | mimes:jpg,jpeg,png|max:2048',
            ]);

            $user = auth()->user();

            $post=new Post();
            $post->caption = $request->input('caption');


            if($request->hasfile('image')){
                $image=$request->file('image');
                $name=$image->getClientOriginalName();
                $filename='public/images/'.$name;
                $image->move('public/images',$filename);
                $post->image=$filename;
            }




            $user->posts()->save($post);

            return redirect('/home');
        }

        public function getallUserposts(){
            $id = Auth::user()->id;
            $posts = Post::where('user_id', $id)->get();

            // Fetch likes for all posts in one query
            $likes = DB::table('likes')
            ->select('post_id', 'likes', DB::raw('MAX(user_id) as user_id'), DB::raw('COUNT(*) as likes_count'))
            ->whereIn('post_id', function ($query) use ($posts) {
                $query->select('id')
                      ->from('posts')
                      ->whereIn('id', $posts->pluck('id'));
            })
            ->groupBy('post_id', 'likes')
            ->get();



            $combinedData = [];
            foreach ($posts as $post) {
                // Initialize like and dislike counts for each post
                $likeCount = 0;
                $dislikeCount = 0;

                // Calculate like and dislike counts for the current post
                foreach ($likes as $like) {
                    if ($like->post_id === $post->id) {
                        if ($like->likes == 1) {
                            $likeCount = $like->likes_count;
                        } elseif ($like->likes == 0) {
                            $dislikeCount = $like->likes_count;
                        }
                    }
                }

                $postArray = [
                    'id' => $post->id,
                    'image' => $post->image ?? null,
                    'caption' => $post->caption ?? null,
                    'likes' => [],

                ];

                // Fetch likes for the current post and add them to the 'likes' array
                foreach ($likes as $like) {
                    if ($like->post_id === $post->id) {
                        $postArray['likes'][] = [
                            'likes' => $like->likes,
                            'likeCount' => $likeCount,
                            'dislikeCount' => $dislikeCount,
                            'user_id' => $like->user_id,
                            'post_id' => $like->post_id,
                        ];
                    }
                }


                $combinedData[] = $postArray;

            }

            return view('home')->with('combinedData', $combinedData);



            }


            public function like(Request $request){

                $post_id=$request->post_id;

                $like=DB::table('likes')->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->first();
                   $user_id =Auth::user()->id;
                   $change_like=0;

                if(!$like){
                    $new_like=new likes;
                    $new_like->post_id=$post_id;
                    $new_like->user_id=$user_id;
                    $new_like->likes= 1;
                    $new_like->save();
                    $is_like=1;
                }elseif($like->likes==1){
                    DB::table('likes')
                    ->where('post_id',$post_id)
                    ->where('user_id',Auth::user()->id)
                    ->Delete();
                    $is_like=0;
                }elseif($like->likes==0){
                    DB::table('likes')
                    ->where('post_id',$post_id)
                    ->where('user_id',Auth::user()->id)
                    ->update(['likes' => 1] );
                    $is_like=1;
                    $CHANGE_LIKE=1;
                }

                $response=array(
                    'is_like'=>$is_like,
                    'change_like'=>$change_like,
                );

                return response()->json($response ,200);


            }




        public function dislike(Request $request){

            $post_id=$request->post_id;
            $dislike=DB::table('likes')->where('post_id',$post_id)
            ->where('user_id',Auth::user()->id)
            ->first();
               $user_id =Auth::user()->id;
               $change_dislike=0;

            if(!$dislike){
                $new_like=new likes;
                $new_like->post_id=$post_id;
                $new_like->user_id=$user_id;
                $new_like->likes= 0;
                $new_like->save();
                $is_dislike=1;
            }elseif($dislike->likes==0){
                DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->Delete();
                $is_dislike=0;
            }elseif($dislike->likes==1){
                DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->update(['likes' => 1] );
                $is_dislike=1;
                $change_dislike=1;
            }

            $response=array(
                'is_dislike'=>$is_dislike,
                'change_dislike'=>$change_dislike,
            );

            return response()->json($response ,200);


        }
    }




















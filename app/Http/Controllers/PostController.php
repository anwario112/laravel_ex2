<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\modals\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\models\likes;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; // Import the Str class




class PostController extends Controller
{
    public function __construction(){

        $this->middleware('auth');

    }
    public function create(){

         return view('posts.create');

    }




        public function storeImage(Request $request){


            $validator = Validator::make($request->all(), [
                'caption' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = Auth::user();
            if ($validator->passes()) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();

                // Generate a unique filename by prepending the timestamp to the original name
                $imageName = time() . '_' . $originalName;


                $image->move(public_path('public/images'), $imageName);


                $data = [
                    'caption' => $request->caption,
                    'image' => 'public/images/' . $imageName,
                    'user_id' => $user->id,
                ];

                // Create a new Post instance with the data and save it to the database
                Post::create($data);

                return response()->json([
                    'success' => 'Image uploaded and saved to the database successfully',
                    'class_name' => 'alert-success',
                ]);


            }
            return response()->json(['error'=>$validator->errors()->all()]);



        }

        public function getallUserposts(){
            $id = Auth::user()->id;
            $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->where('user_id', $id)
            ->select('posts.*', 'users.username as user_username')
            ->get();

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
                    'user_username' => $post->user_username,
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

                $like_s = $request->like_s;
                $post_id = $request->post_id;

                $like = DB::table('likes')
                    ->where('post_id', $post_id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

                $change_like = 0;


                if (!$like) {
                    $new_like = new Likes;
                    $new_like->post_id = $post_id;
                    $new_like->user_id = Auth::user()->id; // Update this line
                    $new_like->likes = 1;
                    $new_like->save();
                    $is_like = 1;
                } elseif ($like->likes == 1) {
                    DB::table('likes')
                        ->where('post_id', $post_id)
                        ->where('user_id', Auth::user()->id)
                        ->delete();
                    $is_like = 0;
                } elseif ($like->likes == 0) {
                    DB::table('likes')
                        ->where('post_id', $post_id)
                        ->where('user_id', Auth::user()->id)
                        ->update(['likes' => 1]);
                    $is_like = 1;
                    $change_like = 1;
                }

                $response = [
                    'is_like' => $is_like,
                    'change_like' => $change_like,
                ];

                return response()->json($response, 200);


            }




        public function dislike(Request $request){


            $like_s = $request->like_s;
            $post_id = $request->post_id;

            $dislike = DB::table('likes')
                ->where('post_id', $post_id)
                ->where('user_id', Auth::user()->id)
                ->first();

            $change_dislike = 0;
            $is_dislike = 0; // Initialize the variable outside the conditional blocks

            if (!$dislike) {
                $new_like = new Likes;
                $new_like->post_id = $post_id;
                $new_like->user_id = Auth::user()->id;
                $new_like->likes = 0; // Set likes to 0 to represent dislike
                $new_like->save();
                $is_dislike = 1;
            } elseif ($dislike->likes == 1) {
                DB::table('likes')
                    ->where('post_id', $post_id)
                    ->where('user_id', Auth::user()->id)
                    ->delete();
                // No need to set $is_like here; it seems like an error and can be removed.
            } elseif ($dislike->likes == 0) {
                DB::table('likes')
                    ->where('post_id', $post_id)
                    ->where('user_id', Auth::user()->id)
                    ->update(['likes' => 1]);
                $is_dislike = 0;
                $change_dislike = 1;
            }

            $response = [
                'is_dislike' => $is_dislike,
                'change_dislike' => $change_dislike,
            ];

            return response()->json($response, 200);








        }
    }




















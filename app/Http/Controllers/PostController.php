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
use Carbon\Carbon;





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
                'caption' => 'required|min:5',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'text.required'=>'Add something ....',
                'text.min'=>'It is short'
            ]

        );

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




















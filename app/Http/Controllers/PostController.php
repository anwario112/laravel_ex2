<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

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
                'image' => 'required|image',
            ]);

            $user = auth()->user();

            $caption = $request->input('caption');
            $image = $request->file('image')->store('public/images');

            $post= new Post([
                'caption' => $caption,
                'image' => $image,
            ]);




            $user->posts()->save($userPost);

            $userPost = [
                'caption' => $caption,
                'image' => $image,
            ];


            return view('profiles.index');
        }

        public function getallposts(){
            Auth::user()->id;
            print_r($id);
        }




}








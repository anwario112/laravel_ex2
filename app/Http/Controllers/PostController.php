<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




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

           $id=Auth::user()->id;
             $userPost=Post::all();
             return view('home',compact('userPost'));

               }




}








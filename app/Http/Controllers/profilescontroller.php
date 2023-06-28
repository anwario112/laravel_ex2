<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\models\Profile;
use App\Http\Controllers\Postscontroller;

class profilescontroller extends Controller
{
    public function index($user){
    $user= User::findOrFail($user);

    return view('profiles.index',[
        'user' => $user,

    ]);

    
    }





}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class likes extends Model
{

protected $fillable=['user_id','post_id','id'];


public function User(){
    return $this->belongsTo(User::class);
}
public function post(){
    return $this->belongTo(Post::class);
}

}

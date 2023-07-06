<?php

namespace App\Models;

use App\Post;
use App\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class likes extends Model
{
protected $fillable=['user_id','post_id','id'];

}
public function user(){
    return $this->belongsTo('user');
}
public function post(){
    return $this->belongTo('Post');
}

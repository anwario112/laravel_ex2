<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{

    protected $fillable=['caption','image','user_id','id'];

    public function user(){
        return $this->belongTo(User::class);
    }
    public function likes(){
        return $this->hasMany(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ThreadPost extends Model
{
    use HasFactory;

    public function createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }

    public function votes(){
        return $this->hasMany(UserPostVote::class,'thread_post_id','id');
    }

    public function voted(){
        return $this->hasMany(UserPostVote::class,'thread_post_id','id');
    }
}

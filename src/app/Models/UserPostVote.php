<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostVote extends Model
{
    use HasFactory;

    protected $table = 'user_post_vote';
}

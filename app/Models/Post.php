<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'post_img',
        'public_flag',
        'created_by',
        'updated_by',
    ];
}

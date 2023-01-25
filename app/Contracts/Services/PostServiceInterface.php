<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface PostServiceInterface{
    public function getPostList();

    public function detailPost($post_id);
}
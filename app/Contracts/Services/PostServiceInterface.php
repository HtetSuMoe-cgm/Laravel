<?php
namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface PostServiceInterface{
    public function getPostList();

    // public function savePost($request);

    // public function editPost($id);

    // public function updatePost($request,$id);

    // public function deletePost($id);
}
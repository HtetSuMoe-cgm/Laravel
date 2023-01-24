<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface PostDaoInterface{
    public function getPostList();

    // public function savePost($request);

    // public function editPost($id);

    // public function updatePost($request,$id);

    // public function deletePost($id);
}
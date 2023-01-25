<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface PostDaoInterface{
    public function getPostList();

    public function detailPost($post_id);
}
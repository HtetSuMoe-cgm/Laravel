<?php

namespace App\Contracts\Dao;

interface PostDaoInterface{
    public function getPostList();

    public function detailPost($post_id);
}
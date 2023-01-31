<?php
namespace App\Contracts\Services;

interface PostServiceInterface
{
    public function getPostList();

    public function detailPost($post_id);
}

<?php

namespace App\Services\Post;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface{
    protected $postDao;

    public function __construct(PostDaoInterface $postDaoInterface){
        $this->postDao = $postDaoInterface;
    }

    public function getPostList()
    {
        // $postlist = $this->postDao->getPostList();
        // return $postlist; 
        return $this->postDao->getPostList();
    }

    public function detailPost($post_id){
        return $this->postDao->detailPost($post_id);
    }
}

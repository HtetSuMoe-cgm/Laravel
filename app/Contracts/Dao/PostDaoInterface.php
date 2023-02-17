<?php

namespace App\Contracts\Dao;

interface PostDaoInterface
{
    public function getPostList();

    public function getPublicPostList();
    
    public function detailPost($post_id);

    public function dbAddPost($input);

    public function editPostForm($id);

    public function editPost($data, $id);

    public function getExistingImage($id);

    public function deletePost($id);
}

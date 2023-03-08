<?php

namespace App\Contracts\Dao;

interface PostDaoInterface
{
    public function getPostList();

    public function getPublicPostList();

    public function getPostsByUserId($userId);

    public function detailPost($postId);

    public function createPost($input);

    public function editPostForm($id);

    public function editPost($data, $id);

    public function getExistingImage($id);

    public function deletePost($id);
}

<?php
namespace App\Contracts\Services;

interface PostServiceInterface
{
    public function getPostList();

    public function getPublicPostList();

    public function getPostsByUserId($userId);

    public function detailPost($postId);

    public function createPost($request);

    public function editPostForm($id);

    public function editPost($request, $id);

    public function deletePost($id);
}

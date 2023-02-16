<?php
namespace App\Contracts\Services;

interface PostServiceInterface
{
    public function getPostList();

    public function detailPost($post_id);

    public function doAddPost($request);

    public function editPostForm($id);

    public function editPost($request, $id);

    public function deletePost($id);
}

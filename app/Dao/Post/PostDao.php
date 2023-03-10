<?php

namespace App\Dao\Post;

use App\Contracts\Dao\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    /**
     * Get Post List
     */
    public function getPostList()
    {
        $postList = Post::orderBy('id')
            ->wherenull('posts.deleted_at')
            ->get();
        return $postList;
    }

    /**
     * Get Public Post Lists
     */
    public function getPublicPostList()
    {
        $publicPost = Post::where('public_flag', '=', config('constants.PUBLIC_FLAG.PUBLIC'))
            ->wherenull('posts.deleted_at')
            ->paginate(5);
        return $publicPost;
    }

    /**
     * Get Posts by user id
     */
    public function getPostsByUserId($userId)
    {
        $posts = Post::where('created_by', $userId)
            ->wherenull('posts.deleted_at')
            ->get();
        return $posts;
    }

    /**
     * Detail Post
     */
    public function detailPost($postId)
    {
        return Post::select('posts.*', 'users.*')
            ->join('users', 'posts.created_by', '=', 'users.id')
            ->where('posts.id', $postId)
            ->get();
    }

    /**
     * Add Post
     */
    public function createPost($input)
    {
        Post::create($input);
    }

    /**
     * View Edit Post Form
     */
    public function editPostForm($id)
    {
        return Post::findOrFail($id);
    }

    /**
     * Edit Post
     */
    public function editPost($data, $id)
    {
        Post::where('id', $id)->update($data);
    }

    /**
     * Get existing image in post update
     */
    public function getExistingImage($id)
    {
        return Post::select('post_img')->where('id', $id)->first();
    }

    /**
     * Delete Post
     */
    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
    }
}

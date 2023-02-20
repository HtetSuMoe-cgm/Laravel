<?php

namespace App\Services\Post;

use App\Contracts\Dao\PostDaoInterface;
use App\Contracts\Services\PostServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostService implements PostServiceInterface
{
    protected $postDao;

    /**
     *
     */
    public function __construct(PostDaoInterface $postDaoInterface)
    {
        $this->postDao = $postDaoInterface;
    }

    /**
     * Get Post List
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    /**
     * Get Public Post List
     */
    public function getPublicPostList()
    {
        return $this->postDao->getPublicPostList();
    }

    /**
     * Get Posts by user id
     */
    public function getPostsByUserId($userId){
        return $this->postDao->getPostsByUserId($userId);
    }

    /**
     * Detail Post
     */
    public function detailPost($post_id)
    {
        return $this->postDao->detailPost($post_id);
    }

    /**
     * Add Post
     */
    public function doAddPost($request)
    {
        if ($request->hasFile('post_img')) {
            $image = $this->getImage($request);
        } else {
            $image = "";
        }
        $data = $this->getPostData($request, $image);
        $this->postDao->dbAddPost($data);
    }

    /**
     * View Edit Post Form
     */
    public function editPostForm($id)
    {
        return $this->postDao->editPostForm($id);
    }

    /**
     * Edit Post
     */
    public function editPost($request, $id)
    {
        $post = $this->postDao->editPostForm($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->public_flag = $request->public_flag;
        $hidden_post_img = $request->hidden_post_img;
        $image = "";
        if ($request->hasFile('post_img')) {
            $image = $this->getImage($request);
        } else {
            $image = $hidden_post_img;
        }
        $post = $this->updatePostData($request, $image);
        $this->postDao->editPost($post, $id);
    }

    /**
     * Get Image path
     */
    private function getImage($request)
    {
        if ($image = $request->file('post_img')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
        }
        return $postImage;
    }

    /**
     * Create Post Data
     */
    private function getPostData($request, $image)
    {
        return [
            'post_img' => $image,
            'title' => $request['title'],
            'description' => $request['description'],
            'public_flag' => $request['public_flag'],
            'created_by' => Auth::id(),
            'created_at' => now(),
        ];
    }

    /**
     * Update Post Data
     */
    private function updatePostData($request, $image)
    {
        return [
            'post_img' => $image,
            'title' => $request->title,
            'description' => $request->description,
            'public_flag' => $request->public_flag,
            'updated_by' => Auth::id(),
            'updated_at' => now(),
        ];
    }

    /**
     * Delete post
     */
    public function deletePost($id)
    {
        $this->postDao->deletePost($id);
    }
}

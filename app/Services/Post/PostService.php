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
    public function getPublicPostList(){
        return $this->postDao->getPublicPostList();
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
        $file = $this->getImage($request);
        $data = $this->getPostData($request, $file);
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
        if ($request->hasFile('post_img')) {
            $file = $this->getImage($request);
        } else {
            $file = $this->postDao->getExistingImage($id);
        }
        $post = $this->updatePostData($request, $file);
        $this->postDao->editPost($post, $id);
    }

    private function getImage($request)
    {
        if ($image = $request->file('post_img')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['post_img'] = "$postImage";
        }
        return $input;
    }

    private function getPostData($request, $image)
    {
        return [
            'post_img' => $image['post_img'],
            'title' => $request['title'],
            'description' => $request['description'],
            'public_flag' => $request['public_flag'],
            'created_by' => Auth::id(),
            'created_at' => now(),
        ];
    }

    private function updatePostData($request, $image)
    {
        return [
            'post_img' => $image['post_img'],
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

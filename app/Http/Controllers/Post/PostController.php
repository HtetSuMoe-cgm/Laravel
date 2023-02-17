<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postService = $postServiceInterface;
    }

    /**
     * Home
     */
    public function Home()
    {
        $publicPost = $this->postService->getPublicPostList();
        return view('dashboard.home', compact('publicPost'));
    }

    /**
     * Detail Post
     */
    public function DetailPost($post_id)
    {
        $postData = $this->postService->detailPost($post_id);
        return view('posts.detailPost')->with(['postData' => $postData[0]]);
    }

    /**
     * Post List
     */
    public function postList()
    {
        $postList = $this->postService->getPostList();
        return view('posts.postList', compact('postList'));
    }

    /**
     * Create Post Form
     */
    public function createPostForm()
    {
        return view('posts.createPost');
    }

    /**
     * Create Post by User
     */
    public function createPost(CreatePostRequest $request)
    {
        $request->validated();
        $this->postService->doAddPost($request);
        return redirect()->route('postList.show');
    }

    /**
     * Edit Post Form
     */
    public function editPostForm($id)
    {
        $post = $this->postService->editPostForm($id);
        return view('posts.editPost', compact('post'));
    }

    /**
     * Edit Post
     */
    public function editPost(UpdatePostRequest $request, $id)
    {
        $request->validated();
        $this->postService->editPost($request, $id);
        return redirect()->route('postList.show');
    }

    /**
     * Delete Post
     */
    public function deletePost($id)
    {
        $this->postService->deletePost($id);
        return redirect()->route('postList.show');
    }
}

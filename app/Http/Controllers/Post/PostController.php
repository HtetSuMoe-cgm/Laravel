<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Post;
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
        $postList = $this->postService->getPostList();
        return view('dashboard.home', compact('postList'));
    }

    /**
     * Detail Post
     */
    public function DetailPost($post_id)
    {
        $postData = $this->postService->detailPost($post_id);
        return view('posts.detailPost')->with(['postData' => $postData[0]]);
        //return view('posts.detailPost', compact('postData'));
    }
}

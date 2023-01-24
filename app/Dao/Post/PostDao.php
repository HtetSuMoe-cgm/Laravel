<?php 

namespace App\Dao\Post;
use App\Models\Post;
use App\Contracts\Dao\PostDaoInterface;
use Illuminate\Http\Request;

class PostDao implements PostDaoInterface
{
    public function getPostList(){
        $postList = Post::orderBy('id')->get();
        return $postList;
    }

   
}
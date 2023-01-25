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

    public function detailPost($post_id){
        return Post::select('posts.*')
        ->where('posts.id',$post_id)
        ->get();
    }
}
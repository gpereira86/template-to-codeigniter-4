<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Post as PostModel;

class Post extends BaseController
{
    public function index(string $slug)
    {
        $post = new PostModel();
        $post = $post->select('
            posts.id,
            posts.title,
            posts.slug,
            posts.description,
            posts.visits,
            posts.created_at,
            categories.name as categoryName,
        ')->where('posts.slug', $slug)->join(
            'categories',
            'posts.category_id = categories.id',
        )->first();
        
        return view('post', ['post' => $post]);

    }
}

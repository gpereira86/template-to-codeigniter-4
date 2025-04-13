<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use CodeIgniter\HTTP\ResponseInterface;

class Trending extends BaseController
{
    public function index()
    {
        $post = new Post();
        $posts = $post->select('
            posts.title,
            posts.slug,
            users.firstName as userFirstName,
            users.lastName as userLastName,           
        ')->orderBy(
            'visits',
            'desc'
        )->join(
            'users',
            'users.id = posts.user_id',
        )->findAll(5);

        return view('_partials/_trending', ['posts' => $posts]);
    }
}

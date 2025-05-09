<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use CodeIgniter\HTTP\ResponseInterface;

class CategorySidebarPartials extends BaseController
{
    public function index(string $category)
    {
        $order = match($category){
            'popular' => ['visits', 'asc'],
            'trending' => ['visits', 'desc'],
            'latest' => ['posts.id', 'desc'],
            default => ['posts.id', 'asc']
        };

        $post = new Post();
        $posts = $post->select('
            posts.image,
            posts.title,
            posts.slug,
            posts.created_at,
            users.firstName as userFirstName,
            users.lastName as userLastName,
            categories.name as categoryName
        ')->join(
            'users',
                'users.id = posts.user_id',
        )->join(
            'categories',
            'categories.id = posts.category_id',
        )->orderBy($order[0], $order[1])->findAll(5);

        return view('_partials/_sidebar_tabs', ['posts'=>$posts]);

    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Category as CategoryModel;

class Category extends BaseController
{
    public function index(string $slug)
    {
        helper('text');

        $category = new CategoryModel();
        $category = $category->select('id')->where('slug', $slug)->first();

        $post = new Post();
        $post->select('
            posts.id,
            posts.image,
            posts.title,
            posts.description,
            categories.name as categoryName,
            users.firstName as userFirstName,
            users.lastName as userLastName,
            users.image as userAvatar,
            posts.slug,
            posts.created_at            
        ')->join(
            'users',
            'users.id = posts.user_id',
        )->join(
            'categories',
            'categories.id = posts.category_id',
        )->where('category_id', $category->id);


        return view('category', ['posts' => $post->paginate(5), 'pager' => $post->pager]);
    }
}

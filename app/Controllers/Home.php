<?php

namespace App\Controllers;



use App\Models\Post;

class Home extends BaseController
{
    public function index(): string
    {

        if (! $posts = cache('posts')) {
            var_dump('create cashe');
            $posts = (new Post())->findAll(10);

            cache()->save('posts', $posts, 60);
        }

        echo "<pre>";
        var_dump($posts);
        echo "</pre>";
        die();

        return view('home', ['title' => 'Home']);
    }
}

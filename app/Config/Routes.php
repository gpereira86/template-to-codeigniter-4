<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/search', 'Search::index', ['as' => 'search']);

// Chamadas views fetch
// Alternativa 1 -> Colocar tudo dentro de um único controller (HomeFetch ou o nome que quiser):
/*
    $routes->get('/banner/home', 'HomeFetch::banner', ['as' => 'home.banner']);
    $routes->get('/trendings', 'HomeFetch::trending', ['as' => 'home.trending']);
*/

// Alternativa 2 -> Criar controllers separados por fetch:
$routes->get('/banner/home', 'BannerHome::index', ['as' => 'banner']);
$routes->get('/trendings', 'Trending::index', ['as' => 'trending']);
$routes->get('/recent', 'Recent::index', ['as' => 'recent']);
$routes->get('/category/(:alpha)', 'Category::index/$1', ['as' => 'category.culture']);

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/search', 'Search::index', ['as' => 'search']);
$routes->get('/banner/home', 'BannerHome::index', ['as' => 'banner.home']);

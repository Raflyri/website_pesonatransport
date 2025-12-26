<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Login Routes
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::attempt');

// app/Config/Routes.php

$routes->group('admin', ['filter' => 'authGuard'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // CRUD Banners
    $routes->resource('banners', ['controller' => 'Admin\Banners']);
    
    // CRUD Fleets
    $routes->resource('fleets', ['controller' => 'Admin\Fleets']);
    
    // CRUD News
    $routes->resource('news', ['controller' => 'Admin\News']);
    
    // Settings / Company Profile
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
});


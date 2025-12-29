<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Login Routes
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// app/Config/Routes.php

$routes->group('admin', ['filter' => 'authGuard'], function($routes) {
    $routes->addRedirect('/', 'admin/dashboard');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // CRUD Banners
    $routes->resource('banners', ['controller' => 'Admin\Banners']);
    
    // CRUD Fleets
    $routes->resource('fleets', ['controller' => 'Admin\Fleets']);
    
    // CRUD News
    $routes->resource('news', ['controller' => 'Admin\News']);
    
    // Settings / Company Profile
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');

    $routes->resource('categories', ['controller' => 'Admin\Categories']);
    $routes->resource('fleets', ['controller' => 'Admin\Fleets']);
    
});


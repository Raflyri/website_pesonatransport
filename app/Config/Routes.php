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
$routes->get('/tentang-kami', 'Home::about');

// app/Config/Routes.php

$routes->group('admin', ['filter' => 'authGuard'], function($routes) {
    $routes->addRedirect('/', 'admin/dashboard');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    $routes->resource('banners', ['controller' => 'Admin\Banners']);
    
    $routes->resource('fleets', ['controller' => 'Admin\Fleets']);
    
    $routes->resource('news', ['controller' => 'Admin\News']);
    
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');

    $routes->resource('categories', ['controller' => 'Admin\Categories']);
    $routes->resource('fleets', ['controller' => 'Admin\Fleets']);

    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/update', 'Admin\Profile::update');

    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
    
});

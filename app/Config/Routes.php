<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Halaman Utama
$routes->get('/', 'Home::index');

// Auth
$routes->get('login', 'Auth::login');
$routes->post('login/auth', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// Halaman Statis Lainnya
$routes->get('/tentang-kami', 'Home::about');
$routes->get('/armada', 'Home::armada');

// --- INI ROUTE BERITA PUBLIK YANG BENAR ---
// Pastikan ini ada DI ATAS group admin
$routes->get('/news', 'Home::news'); 
$routes->get('/news/(:segment)', 'Home::news_detail/$1');

$routes->get('/coming-soon', 'Home::coming_soon');

$routes->get('secreetMigration-12', function() {
    $migrate = \Config\Services::migrations();
    try {
        $migrate->latest();
        echo "Migrasi Sukses!";
    } catch (\Throwable $e) {
        echo "Gagal: " . $e->getMessage();
    }
});

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

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/shop', 'HomeController::shop');
$routes->get('/about', 'HomeController::about');
$routes->get('/contact', 'HomeController::contact');
$routes->get('/detail_produk/(:any)', 'HomeController::detail_produk/$1');

$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/submit', 'AuthController::registerSubmit');
$routes->post('/login/submit', 'AuthController::loginSubmit');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/admin/dashboard', 'AdminController::dashboard', ['filter' => 'admin_filter']);
$routes->get('/admin/produk', 'ProdukController::produk', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/tambah', 'ProdukController::produkTambah', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/submit', 'ProdukController::produkSubmit', ['filter' => 'admin_filter']);

$routes->get('/keranjang', 'KeranjangController::index', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/tambah/(:any)', 'KeranjangController::tambah/$1', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/ubah/(:any)', 'KeranjangController::ubah/$1', ['filter' => 'konsumen_filter']);


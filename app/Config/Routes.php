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

$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/produk', 'ProdukController::produk');
$routes->get('/admin/produk/tambah', 'ProdukController::produkTambah');
$routes->post('/admin/produk/submit', 'ProdukController::produkSubmit');

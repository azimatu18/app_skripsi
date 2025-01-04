<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/shop', 'HomeController::shop');
$routes->get('/about', 'HomeController::about');
$routes->get('/contact', 'HomeController::contact');

$routes->get('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/produk', 'AdminController::produk');

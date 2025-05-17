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
$routes->get('/admin/konsumen', 'AdminController::konsumen', ['filter' => 'admin_filter']);
$routes->get('/admin/produk', 'ProdukController::produk', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/tambah', 'ProdukController::produkTambah', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/submit', 'ProdukController::produkSubmit', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/edit/(:num)', 'ProdukController::produkEdit/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/update/(:num)', 'ProdukController::produkUpdate/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/hapus/(:num)', 'ProdukController::produkHapus/$1', ['filter' => 'admin_filter']);

$routes->get('/admin/chat', 'ChatController::admin', ['filter' => 'admin_filter']);
$routes->get('/admin/chat/detail/(:num)', 'ChatController::adminDetail/$1', ['filter' => 'admin_filter']);

$routes->get('/admin/pemesanan', 'AdminPemesananController::index', ['filter' => 'admin_filter']);
$routes->post('/admin/pemesanan/submit', 'AdminPemesananController::submit', ['filter' => 'admin_filter']);
$routes->get('/admin/pemesanan/detail/(:any)', 'AdminPemesananController::detail/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/pemesanan/konfirmasi', 'AdminPemesananController::konfirmasi', ['filter' => 'admin_filter']);
$routes->post('/admin/pemesanan/lunas', 'AdminPemesananController::konfirmasi_lunas', ['filter' => 'admin_filter']);
$routes->post('/admin/pemesanan/kirim', 'AdminPemesananController::kirim', ['filter' => 'admin_filter']);
$routes->get('/admin/pemesanan/cetak/surat_jalan/(:any)', 'AdminPemesananController::cetak_surat_jalan/$1', ['filter' => 'admin_filter']);
$routes->get('/admin/pemesanan/cetak/faktur_penjualan/(:any)', 'AdminPemesananController::cetak_faktur_penjualan/$1', ['filter' => 'admin_filter']);

$routes->get('/keranjang', 'KeranjangController::index', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/tambah/(:any)', 'KeranjangController::tambah/$1', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/ubah/(:any)', 'KeranjangController::ubah/$1', ['filter' => 'konsumen_filter']);

$routes->get('/pemesanan', 'PemesananController::index', ['filter' => 'konsumen_filter']);
$routes->get('/daftar-pemesanan', 'PemesananController::daftar', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/submit', 'PemesananController::submit', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/detail/(:any)', 'PemesananController::detail/$1', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/dp/upload', 'PemesananController::dp_submit', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/lunas/upload', 'PemesananController::lunas_submit', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/cetak/invoice/(:any)', 'PemesananController::cetak_invoice/$1', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/konfirmasi/(:any)', 'PemesananController::konfirmasi/$1', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/cetak/faktur_penjualan/(:any)', 'PemesananController::cetak_faktur_penjualan/$1', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/cetak/berita_acara/(:any)', 'PemesananController::cetak_berita_acara/$1', ['filter' => 'konsumen_filter']);

$routes->post('/chat/tambah', 'ChatController::tambah');
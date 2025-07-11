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
$routes->post('/admin/konsumen/reset-password/(:num)', 'AdminController::konsumenResetPassword/$1', ['filter' => 'admin_filter']);

$routes->get('/admin/produk', 'ProdukController::produk', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/tambah', 'ProdukController::produkTambah', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/submit', 'ProdukController::produkSubmit', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/edit/(:num)', 'ProdukController::produkEdit/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/update/(:num)', 'ProdukController::produkUpdate/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/hapus/(:num)', 'ProdukController::produkHapus/$1', ['filter' => 'admin_filter']);

$routes->get('/admin/produk/pengajuan_edit_produk', 'ProdukController::pengajuanEditProduk', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/pengajuan_edit_produk/(:num)', 'ProdukController::pengajuanEdit/$1', ['filter' => 'admin_filter']);
$routes->get('/admin/produk/pengajuan_edit_produk/detail/(:num)', 'ProdukController::detailPengajuanEditProduk/$1', ['filter' => 'admin_filter']);


$routes->post('/admin/produk/pengajuanDisetujui/(:num)', 'ProdukController::pengajuanDisetujui/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/produk/pengajuanDitolak/(:num)', 'ProdukController::pengajuanDitolak/$1', ['filter' => 'admin_filter']);


$routes->post('/admin/validasi_dokumen/kirim', 'ValidasiDokumenController::kirim', ['filter' => 'admin_filter']);
$routes->get('/admin/validasi_dokumen', 'ValidasiDokumenController::daftar', ['filter' => 'admin_filter']);
$routes->get('/admin/validasi_dokumen/detail/(:num)', 'ValidasiDokumenController::detail/$1');
// $routes->get('/admin/validasi_dokumen/detail/(:num)/(:any)', 'AdminController::detail/$1/$2');

$routes->post('/admin/validasi_dokumen/diSetujui/(:num)', 'ValidasiDokumenController::disetujui/$1', ['filter' => 'admin_filter']);


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
$routes->get('/admin/pemesanan/cetak/berita_acara/(:any)', 'AdminPemesananController::cetak_berita_acara/$1');

$routes->get('/keranjang', 'KeranjangController::index', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/tambah/(:any)', 'KeranjangController::tambah/$1', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/ubah/(:any)', 'KeranjangController::ubah/$1', ['filter' => 'konsumen_filter']);
$routes->post('/keranjang/hapus/(:any)', 'KeranjangController::hapus/$1', ['filter' => 'konsumen_filter']);

$routes->get('/pemesanan', 'PemesananController::index', ['filter' => 'konsumen_filter']);
$routes->get('/daftar-pemesanan', 'PemesananController::daftar', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/submit', 'PemesananController::submit', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/detail/(:any)', 'PemesananController::detail/$1', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/dp/upload', 'PemesananController::dp_submit', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/lunas/upload', 'PemesananController::lunas_submit', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/cetak/invoice/(:any)', 'PemesananController::cetak_invoice/$1', ['filter' => 'konsumen_filter']);
$routes->post('/pemesanan/konfirmasi/(:any)', 'PemesananController::konfirmasi/$1', ['filter' => 'konsumen_filter']);
$routes->get('/pemesanan/cetak/faktur_penjualan/(:any)', 'PemesananController::cetak_faktur_penjualan/$1', ['filter' => 'konsumen_filter']);
// $routes->get('/pemesanan/cetak/berita_acara/(:any)', 'PemesananController::cetak_berita_acara/$1', ['filter' => 'konsumen_filter']);

$routes->post('/chat/tambah', 'ChatController::tambah');
$routes->get('/chat/load', 'ChatController::load');

$routes->get('/admin/staf', 'StafController::staf', ['filter' => 'admin_filter']);
$routes->post('/admin/staf/submit', 'StafController::stafSubmit', ['filter' => 'admin_filter']);
$routes->post('/admin/staf/update/(:num)', 'StafController::stafUpdate/$1', ['filter' => 'admin_filter']);
$routes->post('/admin/staf/hapus/(:num)', 'StafController::stafHapus/$1', ['filter' => 'admin_filter']);

$routes->get('/lupa-password', 'AuthController::lupa_password');
$routes->post('/lupa-password/submit', 'AuthController::lupa_password_submit');

$routes->get('/reset-password/(:any)', 'AuthController::reset_password/$1');
$routes->post('/reset-password/submit', 'AuthController::reset_password_submit');

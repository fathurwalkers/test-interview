<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
$routes->get('/login', 'Dashboard::login');
$routes->post('/postlogin', 'Dashboard::postlogin');
$routes->get('/register', 'Dashboard::register');
$routes->get('/postregister', 'Dashboard::postregister');
$routes->get('/logout', 'Dashboard::logout');

// Generate Data 
$routes->get('/generate/produk', 'Generate::generate_produk');
$routes->get('/generate/toko', 'Generate::generate_toko');

// PRODUK 
$routes->get('/produk/daftar-produk', 'Produk::daftar_produk');

// TOKO 
$routes->get('/toko/daftar-toko', 'Toko::daftar_toko');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

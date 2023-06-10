<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'kegiatan::index');
$routes->get('/kegiatan/(:any)', 'kegiatan::detail/$1');

$routes->get('/login', 'auth::index');
$routes->post('/login', 'auth::login');
$routes->get('/register', 'auth::register');
$routes->get('/logout', 'auth::logout');

$routes->get('/admin', 'admin::index');
$routes->get('/admin/kegiatan', 'admin::kegiatan');
$routes->get('/admin/kegiatan/add', 'admin::create');
$routes->post('/admin/kegiatan/save', 'admin::save');
$routes->delete('admin/kegiatan/(:num)', 'admin::delete/$1');
$routes->get('/admin/kegiatan/(:any)', 'admin::edit/$1');
$routes->put('/admin/kegiatan/(:num)', 'admin::update/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

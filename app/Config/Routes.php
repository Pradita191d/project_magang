<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//route untuk 
$routes->get('/', 'Halaman::index');
$routes->get('/buku/tambah', 'Buku::tambah');
$routes->delete('/buku/(:num)', 'Buku::delete/$1');
$routes->get('/buku/edit/(:segment)', 'Buku::edit/$1');
$routes->get('/buku/(:any)', 'Buku::detail/$1');
$routes->get('/anggota/tambah', 'Anggota::tambah');
$routes->delete('/anggota/(:num)', 'Anggota::delete/$1');
$routes->get('/anggota/edit(:segment)', 'Anggota::edit/$1');
$routes->get('/bmi', 'Bmi::index');
$routes->post('/bmi/calculate', 'Bmi::calculate');











//codeigniter akan membuat jalur ketika ada akses yg metode requestnya = get
//alamatnya->'/' (route->base URL->localhost:8080) 
//diarahkan ke controller Home->method index
// $routes->get('/kursus/index', 'Kursus::index');
// jika auto route = false, maka perlu membuat routes baru

// $routes->get('home/coba', 'Home::coba');
// $routes->get('/about', 'Page::about');
// $routes->get('/contact', 'Page::contact');
// $routes->get('/faqs', 'Page::faqs');
// $routes->get('/coba/index', 'Coba::index');
// $routes->get('/tos', 'Page::tos');
// $routes->get('/belajar', function () {
//     echo "Ini belajar routes.";
// });
// $routes->get('/coba/(:any)', 'Page::about/$1'); //$1->placeholder
// $routes->get('/users', 'Admin\Users::index');

// $routes->get('users', 'Users::list');
// $routes->get('users/1/23', 'Users::list/1/23');
//Ketika ada permintaan HTTP GET ke URL `users/1/23` (localhost:8080/users/1/23), akan diarahkan ke method `list` dalam controller `Users` dengan dua parameter, yaitu `1` dan `23`.(jika ada)

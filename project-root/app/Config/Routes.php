<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/register', 'Register::index');
$routes->post('/regUser', 'Register::regUser');
$routes->get('/login', 'Login::index');
$routes->post('/logUser', 'Login::index');
$routes->get('/profile', 'Profile::index');
$routes->post('profile/updateUser', 'Profile::updateUser');
$routes->get('/logout', 'Login::logOut');
$routes->get('/admin', 'Admin::index');
$routes->post('/admin','Admin::index');
$routes->post('admin/createAdmin', 'Admin::createAdmin');
$routes->post('admin/deleteUser/(:num)', 'Admin::deleteUser/$1');
$routes->post('admin/deleteMenu/(:num)', 'Admin::deleteMenu/$1');
$routes->post('admin/createMenu', 'Admin::createMenu/$1');
$routes->get('admin/logoutAdmin', 'Admin::logoutAdmin');


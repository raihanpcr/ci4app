<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'auth'], function($routes) {
      $routes->get('/', 'Home::index');

      $routes->get('/categories', 'CategoryController::index');
      $routes->get('/categories/create', 'CategoryController::create');
      $routes->post('/categories/store', 'CategoryController::store');
      $routes->get('/categories/edit/(:num)', 'CategoryController::edit/$1');
      $routes->post('/categories/update/(:num)', 'CategoryController::update/$1');
      $routes->delete('/categories/(:num)', 'CategoryController::delete/$1');

      $routes->resource('products', ['controller' => 'ProductController']);
      $routes->resource('incomings', ['controller' => 'IncommingController']);
      $routes->resource('outgoings', ['controller' => 'OutgoingController']);
      $routes->resource('purchases', ['controller' => 'PurchaseController']);

      $routes->get('logout', '\Myth\Auth\Controllers\AuthController::logout');
});

// Auth routes
$routes->get('login', '\Myth\Auth\Controllers\AuthController::login', ['as' => 'login']);
$routes->post('login', '\Myth\Auth\Controllers\AuthController::attemptLogin');
$routes->get('register', '\Myth\Auth\Controllers\AuthController::register', ['as' => 'register']);
$routes->post('register', '\Myth\Auth\Controllers\AuthController::attemptRegister');

<?php

spl_autoload_register(function (string $className) {
	if (file_exists('' . str_replace('\\', '/', $className) . '.php'))
    	require_once '' . str_replace('\\', '/', $className) . '.php';
});

use Vendors\Router\Router;
use Utils\Functions;

session_start();

$router = new Router();

$router->setBasePath('/');

$router->set404(function () {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
	echo '404, route not found!';
});

$router->get('/', 'Controllers\WorkController@index');
$router->match('GET|POST', '/edit/([0-9]+)', 'Controllers\WorkController@edit');
$router->match('GET|POST', '/create', 'Controllers\WorkController@create');

$router->get('/auth', 'Controllers\UserController@auth');
$router->post('/login', 'Controllers\UserController@login');
$router->get('/logout', 'Controllers\UserController@logout');

$router->run();

exit();
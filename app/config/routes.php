<?php

// Create the router
$router = new MyRouter();
$router->removeExtraSlashes(true);

// Define a route
$router->add('/', array('controller' => 'home', 'action' => 'index'), null, 0)->setName('homepage');

$router->add('/:controller/:action', array('controller' => 1, 'action' => 2), null, 100);
$router->add('/pagina/login', array('controller' => 'login', 'action' => 'index'), null, 11)->setName('pagina/login');
$router->add('/pagina/autenticacao', array('controller' => 'login', 'action' => 'auth'), null, 11)->setName('/login/auth');
$router->add('/pagina/profile', array('controller' => 'login', 'action' => 'profile'), null, 11)->setName('pagina/profile');
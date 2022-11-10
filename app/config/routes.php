<?php

// Create the router
$router = new MyRouter();
$router->removeExtraSlashes(true);

// Define a route
$router->add('/', array('controller' => 'home', 'action' => 'index'), null, 0)->setName('homepage');

$router->add('/:controller/:action', array('controller' => 1, 'action' => 2), null, 100);
$router->add('/servidor/apache', array('controller' => 'info', 'action' => 'apache'), null, 11)->setName('info/apache');
$router->add('/servidor/php', array('controller' => 'info', 'action' => 'php'), null, 11)->setName('info/php');

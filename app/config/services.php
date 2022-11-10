<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Http\Response;

$di->set('dispatcher', function () use ($di) {

  $eventsManager = new EventsManager;

  /**
   * Handle exceptions and not-found exceptions using NotFoundPlugin
   */
  $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin);

  $dispatcher = new MyDispatcher;
  $dispatcher->setEventsManager($eventsManager);

  return $dispatcher;
});

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
  return include APP_PATH . '/config/config.php';
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
  $config = $this->getConfig();

  $url = new MyUrl();
  $url->setBaseUri($config->application->baseUri);
  // $url->setStaticBaseUri($config->application->staticBaseUri);

  return $url;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('tag', function () {
  return new Phalcon\Tag();
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
  $config = $this->getConfig();

  $view = new View();
  $view->setDI($this);
  $view->setViewsDir($config->application->viewsDir);

  $view->registerEngines([
    '.volt' => function ($view) {
      $config = $this->getConfig();

      $volt = new VoltEngine($view, $this);

      $volt->setOptions([
        'compiledPath' => $config->application->cacheDir,
        'compiledSeparator' => '_'
      ]);

      $volt->getCompiler()->addExtension(new VoltPhpFunctionExtension());

      return $volt;
    },
    '.phtml' => PhpEngine::class
  ]);

  return $view;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
  return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 * 
 * @author Luciano Stegun
 * Aqui vamos verificar se a chamada em 
 */
$di->setShared('session', function () {

  $config = $this->getConfig();

  $options = [
    'host'       => $config->session->host,
    'port'       => $config->session->port,
    'persistent' => true,
    'adapter'    => 'redis',
    'lifetime'   => strtotime('tomorrow') - time(),
    'prefix'     => '-newzzer-',
    'index'      => 1,
  ];

  $session = Phalcon\Session\Factory::load($options);

  $session->start();

  return $session;
});

$di->setShared('cache', function () {

  $config = $this->getConfig();

  $redis = new \MyRedis;
  $redis->connect($config->cache->host, $config->cache->port);

  return $redis;
});

$di->set('cookies', function () {
  $cookies = new Phalcon\Http\Response\Cookies();
  $cookies->useEncryption(false);
  return $cookies;
});

$di->set('router', function () {
  require __DIR__ . '/routes.php';
  return $router;
});

$di->setShared('static', function () {

  return new StaticWrapper();
});

<?php

use Phalcon\Di\FactoryDefault;

$app = 'frontend';

$serverName = strtolower($_SERVER['SERVER_NAME']);
$httpHost   = strtolower($_SERVER['HTTP_HOST']);
$subdomain  = preg_replace('/\..*/', '', $httpHost);

/**
 * @author Luciano Stegun
 * @since 1.0 - Jul 17, 2019
 * Quando a API for chamada via ajax diretamente ela envia uma requisição do tipo OPTIONS primeiro
 * para verificar se o servidor aceita requisições cross-domain
 * Então para não ter que executar todo o código do framework, se a requisição for do tipo OPTIONS já vamos encerrar o processamento
 * e o servidor já vai retornar os headers de resposta que a requisição precisa
 */
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  exit(1);
}

//if (version_compare(PHP_VERSION, '7.0.0') < 0) {
//  error_log('PHP version should be at least 7.0.0. Current version: ' . PHP_VERSION);
//}

define('ENVIRONMENT', $_SERVER['ENVIRONMENT']);

require_once('config_dev.php');
require_once('config.php');

try {

  require(BASE_PATH . '/library/Util.php');
  require(BASE_PATH . '/library/NewzzerException.php');
  /**
   * The FactoryDefault Dependency Injector automatically registers
   * the services that provide a full stack framework.
   */
  $di = new FactoryDefault();

  /**
   * Read services
   */
  include APP_PATH . '/config/services.php';

  /**
   * Get config service for use in inline setup below
   */
  $config = $di->getConfig();

  /**
   * Include Autoloader
   */
  include APP_PATH . '/config/loader.php';
  /**
   * Handle the request
   */
  $application = new \Phalcon\Mvc\Application($di);

  echo $application->handle()->getContent();
} catch (Exception $e) {
  echo $e->getMessage() . '<br>';
  echo '<pre>' . $e->getTraceAsString() . '</pre>';
}

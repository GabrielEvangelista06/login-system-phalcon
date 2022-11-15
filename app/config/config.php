<?php

defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
  'session' => [
    'handler'  => 'files',
  ],
  'database' => [
    'adapter' => 'Postgresql',
    'host' => 'host.docker.internal',
    'username' => 'postgres',
    'password' => '1234',
    'dbname' => 'logindb',
    'port'     => 5432,
  ],
  'project' => [
    'libraryDir'    => BASE_PATH . '/library/',
    'vendorDir'     => BASE_PATH . '/library/vendor/',
    'modelsDir'     => BASE_PATH . '/models/',
    'modelsBaseDir' => BASE_PATH . '/models/base/',
  ],
  'application' => [
    'appDir'         => APP_PATH . '/',
    'controllersDir' => APP_PATH . '/controllers/',
    'modelsDir'      => APP_PATH . '/models/',
    'modelsBaseDir'  => APP_PATH . '/models/base/',
    'migrationsDir'  => APP_PATH . '/migrations/',
    'viewsDir'       => APP_PATH . '/views/',
    'pluginsDir'     => APP_PATH . '/plugins/',
    'libraryDir'     => APP_PATH . '/library/',
    'vendorDir '     => APP_PATH . '/library/vendor/',
    'cacheDir'       => BASE_PATH . '/cache/',
    // This allows the baseUri to be understand project paths that are not in the root directory
    // of the webpspace.  This will break if the public/index.php entry point is moved or
    // possibly if the web server rewrite rules are changed. This can also be set to a static path.
    'baseUri'        => '/',
    'staticBaseUri'  => '/',
  ],
]);

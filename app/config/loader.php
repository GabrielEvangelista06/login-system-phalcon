<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
  [
    $config->application->controllersDir,
    $config->application->modelsDir,
    $config->application->modelsBaseDir,
    $config->application->libraryDir,
    $config->application->libraryDir . '/validation',
    $config->application->pluginsDir,
    $config->project->libraryDir,
    $config->project->vendorDir,
    $config->project->modelsBaseDir,
    $config->project->modelsDir,
  ]
);

require $config->project->vendorDir . 'autoload.php';

$loader->register();

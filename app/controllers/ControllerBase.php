<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller {

  public $metadataOptions = array();

  public function initialize() {

    $this->controllerName = $this->dispatcher->getControllerName();
    $this->actionName     = $this->dispatcher->getActionName();

    $this->tag->prependTitle('Phalcon 3.4.5');
    $this->tag->setTitle('Volkker Tech');

    $this->assets->collection('header')
      ->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css')
      ->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap-theme.min.css')
      ->addCss('/css/app.css');

    $this->assets->collection('footer')
      ->addJs('https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js')
      ->addJs('/js/app.js');

    $this->view->setMainView('layout');
  }

  public function afterExecuteRoute($dispatcher) {
  }
}

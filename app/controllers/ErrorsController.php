<?php

class ErrorsController extends ControllerBase {

  public function initialize() {

    parent::initialize();
  }

  public function show404Action() {
    $this->tag->setTitle('Página não encontrada');
  }

  public function show403Action() {
    $this->tag->appendTitle(' > Acesso negado');
  }

  public function show500Action($exception) {

    $this->view->exception = $exception;

    $errorCode = $exception->getCode();

    if ($errorCode == 404) {
      return $this->dispatcher->forward(array('controller' => 'errors', 'action' => 'show404'));
    }

    if ($errorCode == 403) {
      return $this->dispatcher->forward(array('controller' => 'errors', 'action' => 'show403'));
    }

    $this->tag->setTitle('Erro');
  }
}

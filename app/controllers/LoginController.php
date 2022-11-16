<?php

use Phalcon\Http\Request;
use Phalcon\Http\Response;

class LoginController extends ControllerBase {

  public function initialize() {
    parent::initialize();
    $this->view->setMainView('login');
  }

  public function indexAction() {
  }

  public function authAction() {
  }

  public function profileAction() {
  }

  public function logoutAction() {
  }
}

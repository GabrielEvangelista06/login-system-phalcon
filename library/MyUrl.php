<?php

class MyUrl extends Phalcon\Mvc\Url {

  const PREFIX = '';
  //
  //	public function get($uri = NULL, $args = NULL, $local = NULL){
  //		
  //		if( is_string($uri) && !preg_match('/^\/(css|js|images|vendor|fonts)/', $uri) )
  //			$uri = MyUrl::PREFIX . '/' . trim($uri, '/');
  //		
  //		return parent::get($uri, $args, $local);
  //	}
  //	
  public function route($uri = NULL, $args = NULL, $local = NULL) {

    $uri = array('for' => $uri);

    if (!is_null($args)) {

      $uri = array_merge($uri, $args);
      $args = null;
    }

    return MyUrl::PREFIX . $this->get($uri, $args, $local);
  }
}

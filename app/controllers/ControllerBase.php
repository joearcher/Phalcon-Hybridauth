<?php

class ControllerBase extends \Phalcon\Mvc\Controller
{
	function __construct(){
		parent::__construct();
		$config   = dirname(__DIR__) . '/libraries/hybridauth/config.php';
  		require_once( "hybridauth/Hybrid/Auth.php" );
		$this->hybridauth = new Hybrid_Auth( $config );
	}
}
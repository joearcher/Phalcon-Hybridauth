<?php

class AuthController extends ControllerBase
{
	function IndexAction(){
		require_once( "Hybrid/Auth.php" );
		require_once( "Hybrid/Endpoint.php" ); 

		Hybrid_Endpoint::process();
	}
}
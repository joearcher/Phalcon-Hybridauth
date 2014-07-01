<?php

class AuthController extends ControllerBase
{
	function IndexAction(){
		require_once( "hybridauth/Hybrid/Auth.php" );
		require_once( "hybridauth/Hybrid/Endpoint.php" ); 

		Hybrid_Endpoint::process();
	}
}
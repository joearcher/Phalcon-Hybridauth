<?php

class LoginController extends ControllerBase
{
	public function __construct(){
		$config   = dirname(__DIR__) . '/libraries/hybridauth/config.php';
  		require_once( "hybridauth/Hybrid/Auth.php" );
		$this->hybridauth = new Hybrid_Auth( $config );
	}
	public function indexAction(){
		
  		
	  try{
	  	// create an instance for Hybridauth with the configuration file path as parameter
	  	$this->hybridauth = new Hybrid_Auth( $config );
	  
	  	// try to authenticate the user with twitter, 
	  	// user will be redirected to Twitter for authentication, 
	  	// if he already did, then Hybridauth will ignore this step and return an instance of the adapter
	  	$twitter = $this->hybridauth->authenticate( "Twitter" );  
	 
	  	// get the user profile 
	  	$twitter_user_profile = $twitter->getUserProfile();
	  
	  	$this->session->set('auth-identity', array(
            'id' => $twitter_user_profile->identifier,
            'username' => $twitter_user_profile->displayName,
            'pic' => $twitter_user_profile->photoURL
        ));
	 	
	 	 return $this->response->redirect('');
	  	 
	  }
	  catch( Exception $e ){  
	  	// Display the recived error, 
	  	// to know more please refer to Exceptions handling section on the userguide
	  	switch( $e->getCode() ){ 
	  	  case 0 : echo "Unspecified error."; break;
	  	  case 1 : echo "Hybriauth configuration error."; break;
	  	  case 2 : echo "Provider not properly configured."; break;
	  	  case 3 : echo "Unknown or disabled provider."; break;
	  	  case 4 : echo "Missing provider application credentials."; break;
	  	  case 5 : echo "Authentification failed. " 
	  	              . "The user has canceled the authentication or the provider refused the connection."; 
	  	           break;
	  	  case 6 : echo "User profile request failed. Most likely the user is not connected "
	  	              . "to the provider and he should authenticate again."; 
	  	           $twitter->logout(); 
	  	           break;
	  	  case 7 : echo "User not connected to the provider."; 
	  	           $twitter->logout(); 
	  	           break;
	  	  case 8 : echo "Provider does not support this feature."; break;
	  	} 
	 
	  	// well, basically your should not display this to the end user, just give him a hint and move on..
	  	echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();  
	  }
	}

	public function logoutAction(){
		$this->session->remove('auth-identity');
		$this->hybridAuth->logoutAllProviders();
		return $this->response->redirect('');
	}

}
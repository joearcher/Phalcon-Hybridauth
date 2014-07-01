<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$config   = dirname(__DIR__) . '/libraries/hybridauth/config.php';
  		require_once( "hybridauth/Hybrid/Auth.php" );
  
	  try{
	  	// create an instance for Hybridauth with the configuration file path as parameter
	  	$hybridauth = new Hybrid_Auth( $config );
	  
	  	// try to authenticate the user with twitter, 
	  	// user will be redirected to Twitter for authentication, 
	  	// if he already did, then Hybridauth will ignore this step and return an instance of the adapter
	  	$twitter = $hybridauth->authenticate( "Twitter" );  
	 
	  	// get the user profile 
	  	$twitter_user_profile = $twitter->getUserProfile();
	  
	  	echo "Ohai there! U are connected with: <b>{$twitter->id}</b><br />"; 
	  	echo "As: <b>{$twitter_user_profile->displayName}</b><br />"; 
	  	echo "And your provider user identifier is: <b>{$twitter_user_profile->identifier}</b><br />"; 
	 
	  	// debug the user profile
	  	echo('<pre>');print_r( $twitter_user_profile );echo('</pre>');
	 
	  	// exp of using the twitter social api: Returns settings for the authenticating user.
	  	$account_settings = $twitter->api()->get( 'account/settings.json' );
	 
	  	// print recived settings 
	  	echo "Your account settings on Twitter: <pre>" . print_r( $account_settings, true )."</pre>";
	 
	  	// disconnect the user ONLY form twitter
	  	// this will not disconnect the user from others providers if any used nor from your application
	  	echo "Logging out.."; 
	  	$twitter->logout(); 
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

}


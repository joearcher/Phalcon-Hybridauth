<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	if (!$this->session->has('auth-identity')) {
             $this->view->setVar("auth", array("status" => "0"));
        }
        else{
        	$user = $this->session->get('auth-identity');
        	print_r($user);
        	$auth = array(
        		"status" => "1", 
        		'profile' => $user
        	 );

        	$this->view->setVar("auth", $auth);
        }
    }

}


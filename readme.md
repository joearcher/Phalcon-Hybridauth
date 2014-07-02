Social Authentication for Phalcon PHP
=========================================================================

About
-----
A very simple example of how to get Hybridauth working with Phalcon.

This is based on the [single module skeleton app from Phalcon's repository](https://github.com/phalcon/skeleton-single)

Utilising the excellent [Hybridauth](http://hybridauth.sourceforge.net/) social authentication library and their [simple example](http://hybridauth.sourceforge.net/userguide/Integrating_HybridAuth_SignIn.html.) code.

**This example utilises the Twitter sign in API but the process is the same for any supported provider. See the [hybridauth documentation](http://hybridauth.sourceforge.net/userguide.html) for other examples and list of supported providers.**


I have kept this as simple as possible, it is purely for demonstrative purposes.

I have assumed that you know how to go on and integrate this into an app. 

Special thanks to my clipboard.

Requirements
------------
A working [PhalconPHP](http://phalconphp.com/) installation which is accessible from the web.

An API Key and Secret for Twitter. 

Twitter callback URL should be set to **http://[ yourdomain ]/auth** when requesting your API keys.

(Obviously social sign in will not work if the code is hosted locally.)


Installation
------------
1.	Edit app/libraries/hybridauth/config.php adding the base url (this should be the url to the auth controller I.E **http://[ yourdomain ]/auth**) and API keys.
2.	Upload to webroot.
3.	Visit http://[ yourdomain ]
4.	Profit.




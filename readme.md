Social Authentication with Hybridauth and Phalcon PHP
=========================================================================

About
-----
A very simple example of how to get Hybridauth working with Phalcon.

This is based on the [single module skeleton app from Phalcon's repository](https://github.com/phalcon/skeleton-single)

Utilising the excellent [Hybridauth](http://hybridauth.sourceforge.net/) social authentication library and their [simple example](http://hybridauth.sourceforge.net/userguide/Integrating_HybridAuth_SignIn.html.) code.


Requirements
------------
A working [PhalconPHP](http://phalconphp.com/) installation.

An API Key and Secret for each sign in provider you wish to use.

Sign in provider callback URL will be <yourdomain>/auth
(Obviously social sign in will not work when the code is hosted locally)

Installation
------------
*	Edit app/libraries

<?php

// Configuration
if (is_file('config.php')) {
  require_once('config.php');
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

// Registry
$registry = new Registry();

// Loader
$loader = new Loader($registry);
$registry->set('load', $loader);

// Request
$request = new Request();
$registry->set('request', $request);

//check if local or live
if( $request->server['SERVER_ADDR'] == '127.0.0.1' ) {
  define('localAccess', true);
  dbConst();
  localDomains();
} else {
  liveDbConst();
  liveDomain();
}

//DB
$db = new mPDO( DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE );
$registry->set('db', $db);

// Config
$config = new Config();
$registry->set('config', $config);

//Cookie
$cookie = new Cookie($registry);
$registry->set('cookie', $cookie);

//Input Test
$userinput = new userInput();
$registry->set('inputest', $userinput);

// Response
$response = new Response();
$registry->set('response', $response);

// Document
$registry->set('document', new Document());

//Language
$registry->set('language', new Language());

$config->set('config_url', HTTP_SERVER);
$config->set('config_ssl', HTTPS_SERVER);

// url
$registry->set('url', new url($config->get('config_url'), $config->get('config_secure') ? $config->get('config_ssl') : $config->get('config_url')));

// Encryption
$registry->set('encryption', new Encryption($config->get('config_encryption')));

// Site Image
$registry->set('siteimage', new SiteImage());

$loader->controller( "load/controller" );

?>
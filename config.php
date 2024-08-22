<?php
// HTTP
define('HTTP_SERVER', 'http://app.wtsongs.com/');

// HTTPS
define('HTTPS_SERVER', 'http://app.wtsongs.com/');

// DIR
define('DIR_APPLICATION', 'M:/xampp/htdocs/sites/ongoing/app.wtsongs.com/app/');
define('DIR_SYSTEM', 'M:/xampp/htdocs/sites/ongoing/app.wtsongs.com/system/');
define('DIR_LANGUAGE', 'M:/xampp/htdocs/sites/ongoing/app.wtsongs.com/app/language/');
define('DIR_TEMPLATE', 'M:/xampp/htdocs/sites/ongoing/app.wtsongs.com/app/view/theme/');

//Domains
function localDomains() {
  define( 'IMG_DOMAIN' , 'http://img.wtsongs.com/' );
  define( 'CDN_DOMAIN',  'http://app.wtsongs.com/' );
  define( 'JS_DOMAIN',   'http://app.wtsongs.com/' );
  define( 'CSS_DOMAIN',  'http://app.wtsongs.com/' );
}

//live domains
function liveDomain() {
  define( 'IMG_DOMAIN' , 'http://app.wtsongs.com/' );
  define( 'CDN_DOMAIN',  'http://app.wtsongs.com/' );
  define( 'JS_DOMAIN',   'http://app.wtsongs.com/' );
  define( 'CSS_DOMAIN',  'http://app.wtsongs.com/' );
}


//DBConst
function dbConst() {
  define('DB_DRIVER', 'mysqli');
  define('DB_HOSTNAME', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'wtsongs');
}

//Live Db Const
function liveDbConst() {
  define('DB_DRIVER', 'mysqli');
  define('DB_HOSTNAME', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'wtsongs');
}

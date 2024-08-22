<?php

function commonConstants() {

  //define directory constants
  define( 'ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] );
  define( 'CONTROLLER_DIR', ROOT_DIR . '/application/controller' );
  define( 'MODEL_DIR', ROOT_DIR . '/application/model' );
  define( 'VIEW_DIR', ROOT_DIR . '/application/view' );
  define( 'DB_DIR', ROOT_DIR . '/db' );
  define( 'JS_DOMAIN', 'http://app.wtsongs.com/testwt' );
  define( 'CSS_DOMAIN', 'http://app.wtsongs.com/testwt' );
  define( 'IMG_DOMAIN', 'http://app.wtsongs.com/testwt');
  define( 'BASE_URL', 'http://app.wtsongs.com/testwt' );

}

?>
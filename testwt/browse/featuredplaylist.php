<?php

if( is_file( '../config/conf.common.php' ) ) {
  require_once('../config/conf.common.php');
  commonConstants();
} else exit();

if( is_file( CONTROLLER_DIR . '/css_js_file_loader.php' ) ) {
  require_once( CONTROLLER_DIR . '/css_js_file_loader.php' );
  require_once( VIEW_DIR . '/common/common_html.tpl' );
}

if( is_file( CONTROLLER_DIR . '/header_content_loader.php' ) ) {
  require_once( CONTROLLER_DIR . '/header_content_loader.php' );
  $head_data = new headerContent();
  $head_data->homePageHead();
}

require_once( CONTROLLER_DIR . '/class.page_top_styles.php' );

if( is_file( MODEL_DIR . '/home.php' ) ) {
  require_once( MODEL_DIR . '/home.php' );
  $data_obj = new homeContent();
  list( $fpData ) = $data_obj->fPlaylistSql();
}

require_once( VIEW_DIR . '/home_album.tpl' );

?>
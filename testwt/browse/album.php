<?php

if( is_file( '../config/conf.common.php' ) ) {
  require_once('../config/conf.common.php');
  commonConstants();
} else exit();

if( is_file( CONTROLLER_DIR . '/css_js_file_loader.php' ) ) {
  require_once( CONTROLLER_DIR . '/css_js_file_loader.php' );
  require_once( VIEW_DIR . '/common/common_html.tpl' );
}

if( is_file( MODEL_DIR . '/common_class.php' ) ) {
  require_once( MODEL_DIR . '/common_class.php' );
  $common_class = new commonClass();
} else exit();

if( is_file( CONTROLLER_DIR . '/class.generic.php' ) ) {
  require_once( CONTROLLER_DIR . '/class.generic.php' );
  $generic = new generic_class();
}

if( is_file( CONTROLLER_DIR . '/header_content_loader.php' ) ) {
  require_once( CONTROLLER_DIR . '/header_content_loader.php' );
  $head_data = new headerContent();
  if( isset($_GET['name']) && $_GET['name'] !== "" ) {
    // album section
    $album_title = $common_class->testitle( $_GET['name'] );
  } elseif( isset($_GET['song']) && isset($_GET['al']) ) {
    // track section
    $track_name      = $common_class->testitle( $_GET['song'] );
    $album_title     = $common_class->testitle( $_GET['al'] );
    $download_detail = $common_class->is_track_exist_in_album( $track_name, $album_title );
    if( !$download_detail ) exit();
  }
  if( !$common_class->is_al_exist($album_title) ) exit();
  $head_data->albumPageHead( $album_title );
}

$album_img = $generic->get_images( "album", $album_title, "_175x175" );

//get album section detail
require_once( MODEL_DIR . "/album_detail.php" );
$al_detail = new albumDetail();
list( $data_detail ) = $al_detail->basicDetail($album_title);

if( !$data_detail ) exit();

list( $track_detail ) = $al_detail->alTrackSql( $album_title );
if( isset($track_name) ) $data_detail['download'] = $download_detail;

require_once( VIEW_DIR . '/album_content.tpl' );

?>
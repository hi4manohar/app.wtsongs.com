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

if( is_file( CONTROLLER_DIR . '/header_content_loader.php' ) ) {
  require_once( CONTROLLER_DIR . '/header_content_loader.php' );
  $head_data = new headerContent();
  $album_title = $common_class->testitle( $_GET['name'] );
  if( !$common_class->is_pl_exist($album_title) ) exit();
  $head_data->PlaylistPageHead( $album_title );
}

if( is_file( CONTROLLER_DIR . '/class.generic.php' ) ) {
  require_once( CONTROLLER_DIR . '/class.generic.php' );
  $generic = new generic_class();
  $album_img = $generic->get_images( "playlist", $album_title, "_175x175" );
}

//get album section detail
require_once( MODEL_DIR . "/playlist_detail.php" );
$pl_detail = new playlistDetail();
$data_detail = $pl_detail->basicDetail($album_title);
$data_detail['album_title'] = $album_title;

if( !$data_detail ) exit();

list( $track_detail ) = $pl_detail->playlistTrack( $album_title );
$track_detail['playlist_name'] = $album_title;

require_once( VIEW_DIR . '/playlist_content.tpl' );

?>
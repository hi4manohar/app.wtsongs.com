<?php

class loadHomeData {

  public function getTopImageSlider( $data ) {
    $this->getHeadBodyTag();
    require_once( VIEW_DIR . '/home/home.top_image.tpl' );
  }

  public function getPlaylistSlider( $rcData ) {
    require_once( VIEW_DIR . '/home/home.playlist_slider.tpl' );
  }

  public function getAdvSlider( $data ) {
    require_once( VIEW_DIR . '/home/home.adv_slider.tpl' );
  }

  public function getAlbumSlider( $nrData ) {
    require_once( VIEW_DIR . '/home/home.album_slider.tpl' );
  }

  public function getCategorySlider( $data ) {
    require_once( VIEW_DIR . '/home/home.category_slider.tpl' );
  }

  public function getAdvSlider2( $data ) {
    require_once( VIEW_DIR . '/home/home.adv_slider2.tpl' );
  }

  public function getCommonBar() {
    require_once( VIEW_DIR . '/common/nav_bar.tpl' );
    require_once( VIEW_DIR . '/common/menu_bar.tpl' );
  }

  public function getLangBar() {
    echo '<div class="inner_containner">'
    ;
    require_once( VIEW_DIR . '/common/lang_select.tpl' );
  }
}

?>
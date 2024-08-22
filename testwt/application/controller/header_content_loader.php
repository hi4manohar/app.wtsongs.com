<?php

class_exists("seo") ? "" : require_once( CONTROLLER_DIR . '/seo-optimized.php' );

require_once( CONTROLLER_DIR . '/css_js_file_loader.php' );

class headerContent extends seo {

  public function homePageHead() {
    $this->initializeHtml();
    $this->displayHeadSeo();
    commonTopCssFileLoader();
    $this->endHeadTag();
  }

  public function PlaylistPageHead( $playlistTitle ) {
    $this->initializeHtml();
    $this->playlistSeo( $playlistTitle );
    commonTopCssFileLoader();
    $this->endHeadTag();
  }

  public function albumPageHead( $albumTitle ) {
    $this->initializeHtml();
    if( isset($_GET['song']) ) {
      $this->albumSongSeo( $albumTitle );
    } else $this->albumSeo( $albumTitle );
    commonTopCssFileLoader();
    $this->endHeadTag();
  }

  public function initializeHtml() {

?>

<!DOCTYPE html>
<html>
  <head>

<?php

  }

  public function endHeadTag() {
    echo "
    </head>
    ";
  }

}

?>
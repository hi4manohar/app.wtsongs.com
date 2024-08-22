<body>
  <?php include VIEW_DIR . "/common/header.tpl"; ?>
<div id="main">
  <div class="inner_containner margin">
    <?php
    if( isset($track_name) ) {
      albumName( $track_name );
    } else albumName( $data_detail['al_title'] ); ?>
     <div class="login_form">
      <?php albumImg( $album_img, $album_title ); ?>
      <?php if( isset($data_detail['download']) ) downloadTrack( $data_detail['download']['track_id'] ); ?>
      <div class="seller_d_container">
      <!-- common part -->        
        <!-- album detail container -->
        <?php
        require_once( VIEW_DIR . '/common/album_detail_section.tpl' );
        detail_section( $data_detail );
        ?>
        <hr>
        <div class="price_detail">
          <div class="price_detail_h">Tracks</div>
          <?php
            require_once( VIEW_DIR . '/common/album_song_container.tpl' );
            songContainer( $track_detail, $data_detail );
          ?>
          <hr>
        </div>
      </div>
      <div class="submit drs_f_r">
        <input type="submit" value="Like us on Facebook" title="like">
      </div>
    </div>
  </div>
</div>
  <?php include VIEW_DIR . "/common/footer.tpl"; ?>
  <?php commonFileJsLoader(); ?>
  <div id="modal" class="modal"><!-- Place at bottom of page --></div>
</body>
</html>
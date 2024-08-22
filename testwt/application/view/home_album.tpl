<body>
  <?php include VIEW_DIR . "/common/header.tpl"; ?>
  <div id="main">
    <?php (isset( $fpData )) ? homePageStyles() : homePlaylistStyles(); ?>
    <?php category(); ?>
    <div class="content_wrapper" id="main_content">
      <?php lang(); ?>
      <?php
      if( !isset( $fpData ) ) {
        require_once( VIEW_DIR . "/album_tabs.tpl" );
        albumTabs($nrData);
      } else {
        require_once( VIEW_DIR . "/playlist_tab.tpl" );
        albumTabs($fpData);
      }
      ?>
    </div>
  </div>
  <?php include VIEW_DIR . "/common/footer.tpl"; ?>
  <?php loadModalHtml(); ?>
  <?php commonFileJsLoader(); ?>
</body>
</html>
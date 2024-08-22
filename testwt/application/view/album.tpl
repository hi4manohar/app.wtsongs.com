<!DOCTYPE html>
<html>
<head>
  <title>wtsongs.com</title>
  <?php commonTopCssFileLoader(); ?>
  <noscript>
    <style>
      .es-carousel ul{
        display:block;
      }
    </style>
  </noscript>
</head>
<body>
  <?php include VIEW_DIR . "/common/header.tpl"; ?>
<div id="main">
  <div class="inner_containner margin">
    <h2 class="ad_submit_header">Hate Story 3</h2>
     <div class="login_form">
      <form>
      <div class="add_image">
      <i class="fa fa-play-circle-o m_al_plyer"></i>
        <img src="/public/img/5.jpg">
      </div>
      <div class="seller_d_container">
      <!-- common part -->        
         <div class="price_detail">
          <div class="price_detail_h">
            Hate Story 3-2015
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Featured Artist</p>
            </div>
            <div class="input_t fl_r br">
              <p class="fl_r f_s_p dotes wdth">Kumar Sanu, Sonu Nigam, Honey Singh</p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Last Update</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth">27-12-2015</p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Total Tracks</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth">12</p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Cast</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth">Amitabh Bachhan, Honey Singh</p>
            </div>
          </div>
        </div>
        <hr>
        <!-- user detail-->
          <div class="price_detail">
          <div class="price_detail_h">
            Tracks
          </div>
          <?php for( $i = 0; $i <10; $i++ ) { ?>
          <div class="a_f_song">
            <div class="player fl_l">
              <i class="fa fa-play-circle f_plyer" style="position: absolute; top: 34px; left: 33px; font-size: 34px; z-index: 5;"></i>
            </div>
            <div class="a_f_song_title fl_l">
              <a href="" title="song name"class="f_song_name dotes">Neendein Khul Jaati Hain</a>
              <a href="" title="artist"class="f_song_artist dotes">Mika Singh</a>
            </div>
            <div class="f_song_b fl_r">
              <a href="" title="share this song"class="share_icon fl_r">
                <i class="fa fa-share-alt"style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
              </a>
              <a href="" title="download thi song"class="d_icon fl_r">
                <i class="fa fa-arrow-down" style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
              </a>
            </div>
          </div>
          <?php } ?>
        <hr>
        <!-- terms and condition -->
      </div>
      <div class="views">
        <p class="view">VIEWS 30</p>
      </div>
      </div>
      <div class="submit drs_f_r">
        <input type="submit" value="Like us on Facebook" title="like">
      </div>
      </form>
    </div>
    <!-- carousel -->
   <div class="container">     
        <div class="content">
          <div id="rg-gallery" class="rg-gallery">
            <div class="rg-thumbs">
              <!-- Elastislide Carousel Thumbnail Viewer -->
              <div class="es-carousel-wrapper">
                <div class="es-nav">
                  <span class="es-nav-prev">Previous</span>
                  <span class="es-nav-next">Next</span>
                </div>
                <?php include VIEW_DIR . '/carousel.tpl'; ?>
              </div>
              <!-- End Elastislide Carousel Thumbnail Viewer -->
            </div><!-- rg-thumbs -->
          </div><!-- rg-gallery -->
        </div><!-- content -->
    </div><!-- container-->
  </div>
   <a href="/for_sell.php">
    <div class="fix_sell_button">
      <p>Show</p>
    </div>
  </a>
  <?php include VIEW_DIR . "/common/footer.tpl"; ?>
</div>
<?php commonFileJsLoader(); ?>
  <div id="modal" class="modal"><!-- Place at bottom of page --></div>
</body>
</html>
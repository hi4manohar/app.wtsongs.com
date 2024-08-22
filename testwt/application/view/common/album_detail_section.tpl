      <?php function detail_section( $data ) { ?>
        <div class="price_detail">
          <div class="price_detail_h capt"><?php echo $data['album_title']; ?></div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Language</p>
            </div>
            <div class="input_t fl_r br">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['album_lang']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Category</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['album_genre']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Artist</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['artist']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Released on</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php $date = date_create( $data['released'] ); echo date_format($date,"d-m-Y"); ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
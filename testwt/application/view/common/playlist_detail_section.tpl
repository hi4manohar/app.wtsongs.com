      <?php function detail_section( $data ) { ?>
        <div class="price_detail">
          <div class="price_detail_h capt"><?php echo $data['album_title']; ?></div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Total Favourite</p>
            </div>
            <div class="input_t fl_r br">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['tf']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Created On</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['created_on']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Total Tracks</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['total_track']; ?></p>
            </div>
          </div>
          <div class="d_p_first">
            <div class="label_t fl_l">
              <p class="f_s">Created By</p>
            </div>
            <div class="input_t fl_r br ">
              <p class="fl_r f_s_p dotes wdth"><?php echo $data['pl_user']; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
<?php

function albumTabs($fpData) {

?>
<?php foreach ($fpData['pl_title_index'] as $key => $value) { ?>
<a href="/playlists/<?php echo $fpData['img_name_array'][$key]; ?>" data-push="true" data-target="#main" title="<?php echo $fpData['pl_title_index'][$key]; ?>">
  <div class="first_add">
    <div class="first_add_img">
      <img src="<?php echo $fpData['full_img_src'][$key]; ?>" alt="<?php echo $fpData['pl_title_index'][$key]; ?>">
      <i class="fa fa-play-circle" style="position: absolute; top: 34px; left: 33px; font-size: 34px; z-index: 5;"></i>
    </div>
    <div class="first_add_details">
      <div class="book_title drs_book_details">
        <h2 class="dotes"><?php echo $fpData['pl_title_index'][$key]; ?></h2>
      </div>
      <div class="book_location drs_book_details">
        <p  class="loc_text dotes">Total Tracks : <?php echo $fpData['t_track_index'][$key]; ?></p>
      </div>
      <div class="book_holder drs_book_details">
        <p class="ad_owner dotes">Artists : <?php echo $fpData['track_artist'][$key*2]; ?></p>
      </div>
      <div class="book_price drs_book_details">
        <div class="m_price">
          <span>Download</span>
        </div>
      </div>
    </div>
  </div>
</a>

<?php } ?>
<?php } ?>
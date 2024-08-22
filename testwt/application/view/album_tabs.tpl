<?php

function albumTabs($nrData) {
?>
<?php foreach ($nrData['al_title'] as $key => $value) { ?>
<a href="/album/<?php echo $nrData['imageName'][$key]; ?>" data-push="true" data-target="#main" title="<?php echo $nrData['al_title'][$key]; ?>">
  <div class="first_add">
    <div class="first_add_img">
      <img src="<?php echo $nrData['imgArray'][$key]; ?>" alt="<?php echo $value; ?>">
      <i class="fa fa-play-circle" style="position: absolute; top: 34px; left: 33px; font-size: 34px; z-index: 5;"></i>
    </div>
    <div class="first_add_details">
      <div class="book_title drs_book_details">
        <h2 class="dotes"><?php echo $value; ?></h2>
      </div>
      <div class="book_location drs_book_details">
        <p  class="loc_text dotes">Category : <?php echo $nrData['category'][$key]; ?></p>
      </div>
      <div class="book_holder drs_book_details">
        <p class="ad_owner dotes">Artists : <?php echo $nrData['al_artist'][$key]; ?></p>
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
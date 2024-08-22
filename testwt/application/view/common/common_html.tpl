
<?php
function category() {

?>

<div class="h_menu">
  <a href="/playlist/featuredplaylist" title="category" data-push="true" data-target="#main">
    <button class="h_nav_button cat">Playlist</button>
  </a>
  <a href="/" title="home" data-push="true" data-target="#main">
    <button class="h_nav_button ho">Album</button>
  </a>
</div>

<?php

}

function lang() {

?>

<div class="filter">
  <select class="select_f rel">
    <option>Choose Language</option>
    <option>Hindi</option>
    <option>English</option>
    <option>Bhojpuri</option>
    <option>BBA</option>
    <option>MBA</option>
    <option>BCA</option>
    <option>B.Pharma</option>
  </select>
  <i class="fa fa-caret-down fa_select"></i>
</div>

<?php

}

function albumName( $name ) {
  echo '<h2 class="ad_submit_header capt dotes" title="' . $name . '">' . $name . '</h2>';
}

function downloadTrack( $track_id ) {
  echo '<a href="http://www.wtsongs.com/download?id=' . $track_id . '"><h2 class="ad_submit_header capt dotes download_section" title="Download This Song">Click here to download this song</h2></a>';
}

function albumImg( $img, $alt ) {

?>

<div class="add_image">
  <i class="fa fa-play-circle-o m_al_plyer"></i>
  <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>">
</div>

<?php

}
?>
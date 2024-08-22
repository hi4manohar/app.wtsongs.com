<?php
function songContainer( $plData ) {
  foreach ($plData['track_title'] as $key => $value) {
    $jsonData = array(
      'id' => $plData['track_id'][$key],
      'trackTitle' => $value,
      'fp_title' => $plData['playlist_name'],
      'albumId' => $plData['album_id'][$key],
      'albumTitle' => $plData['album_name_with_year'][$key],
      'artist' => $plData['artist_name'][$key],
      'album_lang' => $plData['track_al_lang'][$key],
      'audio_cover' => "http://img.wtsongs.com/images/albums/" . $plData['album_name_with_year'][$key] . "/" . $plData['track_album_img'][$key] . "_80x80.jpg",
      'trackShareUrl' => "http://www.wtsongs.com/song/" . $plData['song_url'][$key]
    );
?>
<div class="a_f_song">
  <div class="trackList">
    <span class="jsontrack row<?php echo $plData['track_id'][$key]; ?>" style="display:none;"><?php echo json_encode($jsonData); ?></span>
    <div class="player fl_l">
      <i class="fa fa-play-circle f_plyer" style="position: absolute; top: 34px; left: 33px; font-size: 34px; z-index: 5;"></i>
    </div>
    <div class="a_f_song_title fl_l">
      <span title="song name" class="f_song_name dotes"><?php echo $value; ?></span>
      <span title="artist" class="f_song_artist dotes"><?php echo $plData['artist_name'][$key]; ?></span>
    </div>
  </div>
  <div class="f_song_b fl_r">
    <a href="" title="share this song" class="share_icon fl_r">
      <i class="fa fa-share-alt" style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
    </a>
    <a href="/song/<?php echo $plData['song_url'][$key]; ?>/album/<?php echo $plData['album_url'][$key]; ?>" title="download this song" class="d_icon fl_r" data-push="true" data-target="#main">
      <i class="fa fa-arrow-down" style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
    </a>
  </div>
</div>
<?php } } ?>
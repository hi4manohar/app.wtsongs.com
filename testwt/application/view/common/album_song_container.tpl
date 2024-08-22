<?php
function songContainer( $alTrackData, $data ) {
  foreach ( $alTrackData['track_id'] as $key => $value ) {
    $jsonData = array(
      'id' => $alTrackData['track_id'][$key],
      'trackTitle' => $alTrackData['track_title'][$key],
      'fp_title' => '',
      'albumId' => $data['album_id'],
      'albumTitle' => $data['album_title'],
      'artist' => $alTrackData['track_artist'][$key],
      'album_lang' => $data['album_lang'],
      'audio_cover' => "http://img.wtsongs.com/images/albums/" . $data['album_title'] . "/" . $data['album_title'] . "_80x80.jpg",
      'trackShareUrl' => "http://www.wtsongs.com/song/" . $alTrackData['song_url'][$key]
    );
?>
<div class="a_f_song">
  <div class="trackList">
    <span class="jsontrack row<?php echo $alTrackData['track_id'][$key]; ?>" style="display:none;"><?php echo json_encode($jsonData); ?></span>
    <div class="player fl_l">
      <i class="fa fa-play-circle f_plyer" style="position: absolute; top: 34px; left: 33px; font-size: 34px; z-index: 5;"></i>
    </div>
    <div class="a_f_song_title fl_l">
      <span title="song name" class="f_song_name dotes"><?php echo $alTrackData['track_title'][$key]; ?></span>
      <span title="artist" class="f_song_artist dotes"><?php echo $alTrackData['track_artist'][$key]; ?></span>
    </div>
  </div>
  <div class="f_song_b fl_r">
    <a href="" title="share this song" class="share_icon fl_r">
      <i class="fa fa-share-alt" style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
    </a>
    <a href="/song/<?php echo $alTrackData['song_url'][$key]; ?>/album/<?php echo $alTrackData['album_url']; ?>" title="download this song" class="d_icon fl_r" data-push="true" data-target="#main">
      <i class="fa fa-arrow-down" style="font-size:20px;color:black; padding:6px 0px 0px 5px;"></i>
    </a>
  </div>
</div>
<?php } } ?>
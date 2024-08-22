<?php

class_exists( "commonClass" ) ? "" : require_once( MODEL_DIR . "/common_class.php" );

class albumDetail extends commonClass {

  function basicDetail( $album_name ) {
    $headerSql = "SELECT t.artist_name, al.last_updated_on, al.album_id, l.lang_title, al.release_year, gn.genre_title, COUNT(`artist_name`) as tt 
FROM wt_tracks as t, wt_albums as al, wt_lang as l, wt_genre as gn
WHERE al.album_title = '" . $album_name . "' AND al.album_id = t.album_id AND al.lang_id=l.lang_id AND al.genre_id=gn.genre_id LIMIT 1";
    $headerSqlResult = $this->execute_query( $headerSql );
    if( mysqli_num_rows( $headerSqlResult ) > 0 ) {
      while( $dataRow = mysqli_fetch_assoc( $headerSqlResult ) ) {
        $header['album_id'] = $dataRow['album_id'];
        $header['album_lang'] = $dataRow['lang_title'];
        $header['album_genre'] = $dataRow['genre_title'];

        $header['artist'] = $dataRow['artist_name'];
        $header['released'] = $dataRow['last_updated_on'];
        $header['total_track'] = $dataRow['tt'];
        $header['rlease_year'] = $dataRow['release_year'];
      }

      //remove year for header
      $alTitleCheck = substr( $album_name, -4 );
      if(is_numeric( $alTitleCheck )) {
        $header['al_title'] = substr( $album_name, 0, -5 );
      } else {
        $header['al_title'] = $album_name;
      }
      $header['album_title'] = $album_name;

      unset( $alImg, $alImg3, $alImg2, $favSql, $headeSql );

      return array( $header );
    } else return false;
  }

  function alTrackSql( $album_name ) {
    $al_t_sql = "SELECT t.track_id, t.track_title, t.artist_name, t.play_hits FROM wt_tracks as t, wt_albums as al WHERE al.album_title = '" . $album_name . "' AND al.album_id = t.album_id";

    $al_t_result = $this->execute_query( $al_t_sql );

    if( mysqli_num_rows( $al_t_result ) > 0 ) {
      while( $tDataRow = mysqli_fetch_assoc( $al_t_result ) ) {

        $alTrack['track_id'][] = $tDataRow['track_id'];
        $alTrack['track_title'][] = $tDataRow['track_title'];
        $alTrack['track_artist'][] = $tDataRow['artist_name'];
        $alTrack['play_hits'][] = $tDataRow['play_hits'];

      }
      $alTrack['song'] = str_replace(' ', '+', $alTrack['track_title']);
      $alTrack['song_url'] = array_map('strtolower', $alTrack['song']);
      $alTrack['album_url'] = strtolower( str_replace(' ', '+', $album_name) );
      return array( $alTrack );
    } else return false;
  }

}

?>
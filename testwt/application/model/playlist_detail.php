<?php

class_exists( "commonClass" ) ? "" : require_once( MODEL_DIR . "/common_class.php" );

class playlistDetail extends commonClass {

  function basicDetail( $playlist_name ) {
    $detail_query = "SELECT pl.playlist_id, pl.playlist_title, (SELECT COUNT(*) FROM wt_playlist_data as pd WHERE pl.playlist_id=pd.playlist_id) as tt, (SELECT COUNT(*) FROM wt_usermeta as u WHERE u.object_id=pl.playlist_id AND u.term_id='9' AND is_fav='1') as tf, pl.creation_date, u.firstname, t.album_id, al.album_title FROM wt_playlists as pl, wt_playlist_data as pd, wt_users AS u, wt_tracks AS t, wt_albums AS al WHERE pl.playlist_title='" . $playlist_name . "' AND pl.user_id=u.id AND pl.playlist_id=pd.playlist_id AND pd.track_id=t.track_id AND al.album_id=t.album_id LIMIT 1";
    $row_result = $this->execute_query( $detail_query );
    if( mysqli_num_rows( $row_result ) ) {
      while( $row = mysqli_fetch_assoc( $row_result ) ) {
        $header['total_track'] = $row['tt'];
        $header['created_on'] = $row['creation_date'];
        $header['playlist_id'] = $row['playlist_id'];
        $header['pl_user'] = $row['firstname'];
        $header['first_album_title'] = $row['album_title'];
        $header['tf'] = $row['tf'];
      }
      return $header;
    } else return false;
  }

  function playlistTrack( $playlist_name ) {
    $track_query = "SELECT wt.track_id, wt.track_title, wt.play_hits, al.album_id, al.album_title, wt.artist_name, lg.lang_title FROM wt_playlists as pl, wt_playlist_data as pd, wt_tracks as wt, wt_albums as al, wt_lang as lg WHERE pl.playlist_title='" . $playlist_name . "' AND pd.playlist_id=pl.playlist_id AND wt.track_id=pd.track_id AND al.album_id=wt.album_id AND al.lang_id=lg.lang_id";
    $row_result = $this->execute_query( $track_query );
    if( mysqli_num_rows( $row_result ) ) {
      //loop through data
      while( $pl_track_row = mysqli_fetch_assoc($row_result) ) {

        //new
        $pl['track_title'][] = $pl_track_row['track_title'];
        $pl['artist_name'][] = $pl_track_row['artist_name'];
        $plAlbumTitle = $pl_track_row['album_title'];
        $pl['album_name_with_year'][] = $plAlbumTitle;
        $pl['track_id'][] = $pl_track_row['track_id'];
        $pl['album_id'][] = $pl_track_row['album_id'];
        $pl['track_al_lang'][] = $pl_track_row['lang_title'];
        $pl['track_play_hits'][] = $pl_track_row['play_hits'];

        //check album year numeric
        if( is_numeric( substr($plAlbumTitle, -4) ) ) {
          $pl['album_name_without_year'][] = substr($plAlbumTitle, 0, -5);
        } else $pl['album_name_without_year'][] = $plAlbumTitle;
      }
      $pl['album_without_space'] = str_replace(' ', '+', $pl['album_name_with_year']);
      $pl['album_url'] = array_map('strtolower', $pl['album_without_space']);
      unset( $pl['album_without_space'] );

      $pl['song_url_arrange'] = str_replace(' ', '+', $pl['track_title']);
      $pl['song_url'] = array_map('strtolower', $pl['song_url_arrange']);

      $pl['track_album_img'] = str_replace(' ', '+', $pl['album_name_with_year']);
      return array( $pl );
    } else return false;
  }

}

?>
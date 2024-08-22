<?php

class ModelHomeHomeAlbum extends Model {

  public function getHomeNewAlbum() {
    
    $home_albums = $this->db->query("SELECT al.album_id, al.album_title, t.artist_name, gn.genre_title FROM wt_albums as al, wt_tracks as t, wt_term_taxonomy as tt, wt_genre as gn WHERE tt.taxonomy_id=al.album_id AND tt.term_id=42 AND tt.term_group_id=27 AND al.album_id=t.album_id AND al.genre_id=gn.genre_id GROUP BY album_id ORDER BY tt.id DESC LIMIT 30");

    if($home_albums->num_rows > 0) {
      return $home_albums->rows;
    }
  }
}

?>
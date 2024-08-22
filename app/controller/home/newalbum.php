<?php

class ControllerHomeNewAlbum extends Controller {

  public function index() {

    $this->load->model('home/homealbum');

    $data['language'] = $this->load->language('home/homeapp');

    $this->document->setTitle($this->language->get('heading_title'));

    $data['album_data'] = $this->model_home_homealbum->getHomeNewAlbum();

    foreach ($data['album_data'] as $key => $value) {
      extract($value);
      $data['album_data'][$key]['album_title_w_year'] = substr($album_title, 0, -5);

      $artists_name = array_map( 'trim', explode(",", $artist_name) );

      $data['album_data'][$key]['album_artists'] = $artists_name;
      $data['album_data'][$key]['artist_url'] = array_map( 'strtolower', str_replace(' ', '+', $artists_name) );

      $data['album_data'][$key]['album_url'] = strtolower(str_replace(' ', '+', $album_title));
      //$data['album_data'][$key]['album_img'] = $this->siteimage->get_images( "album", $album_title, "_175x175" );
    }

    print_r($data);

  }
}

?>
<?php

class ControllerCommonHeader extends Controller {
  public function index() {
    $data['title'] = $this->document->getTitle();

    if ($this->request->server['HTTPS']) {
      $server = $this->config->get('config_ssl');
    } else {
      $server = $this->config->get('config_url');
    }

    $data['base'] = $server;

    return $data;
  }
}

?>
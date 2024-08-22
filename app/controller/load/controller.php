<?php

class ControllerLoadController extends Controller {
  public function index() {
    $this->load->controller("home/newalbum");
  }
}

?>
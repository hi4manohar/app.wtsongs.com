<?php

function commonFileJsLoader() {

  $array_common_bottom_js_file = array(
    'jquery_1.9.1'         => JS_DOMAIN . '/public/js/lib/jquery-1.9.1/jquery-1.9.1.min.js',
    'jquery_ui'            => JS_DOMAIN . '/public/js/lib/jquery-1.9.2.custom/jquery-ui-1.9.2.custom.min.js',
    'minigrid_js'          => JS_DOMAIN . '/public/js/lib/minigrid/minigrid.js',
    'custom_interface.js'  => JS_DOMAIN . '/public/js/custom/interface.js',
    'audio_player'         => JS_DOMAIN . '/public/js/custom/audio_player.js',
    'jquery_tmpl.js'       => JS_DOMAIN . '/public/js/lib/carousel/jquery.tmpl.min.js',
    'jquery_easing'        => JS_DOMAIN . '/public/js/lib/carousel/jquery.easing.1.3.js',
    'elastic_slide'        => JS_DOMAIN . '/public/js/lib/carousel/jquery.elastislide.js',
    'cariousel_gallery.js' => JS_DOMAIN . '/public/js/lib/carousel/gallery.js',
    'wiselinks'            => JS_DOMAIN . '/public/js/lib/wiselink/wiselinks-1.2.2.min.js'
  );

  foreach ($array_common_bottom_js_file as $key => $value) {
?>
<script type="text/javascript" src="<?php echo $value; ?>"></script>
<?php
  }
}

function commonTopCssFileLoader() {
  $array_common_top_css_file = array(
    'home.css'          => CSS_DOMAIN . '/public/css/custom/home.css',
    'font_awesome.css'  => CSS_DOMAIN . '/public/css/lib/font-awesome-4.4.0/css/font-awesome.min.css',
    'style.css'         => CSS_DOMAIN . '/public/css/lib/carousel/style.css',
    'elastic_slide.css' => CSS_DOMAIN . '/public/css/lib/carousel/elastislide.css',
    'ad_gallery.css'    => CSS_DOMAIN . '/public/css/lib/ad_gallery/ad_gallery.css'
  );
  foreach ($array_common_top_css_file as $key => $value) {
?>
<link rel="stylesheet" type="text/css" href="<?php echo $value; ?>">
<?php
  }
}

function loadModalHtml() {
  echo '<div id="modal" class="modal"><!-- Place at bottom of page --></div>';
}

?>
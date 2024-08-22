<?php

$dir = dirname($_SERVER['DOCUMENT_ROOT'])."/protected_content";
$filename = "123";
$file = "https://306f119a039b6932792d8268b707e9596c9f8ce3.googledrive.com/host/0B4Ph2Cz5L9_pckV2RU4xRlEyb3M/assets/mp3/123.mp3";

$extension = "mp3";
$mime_type = "audio/mpeg, audio/x-mpeg, audio/x-mpeg-3, audio/mpeg3";

    header('Content-type: {$mime_type}');
    header('Content-length: ' . filesize($file));
    header('Content-Disposition: filename="' . $filename);
    header('X-Pad: avoid browser bug');
    header('Cache-Control: no-cache');
    readfile($file);


?>
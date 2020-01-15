<?php

require "vendor/autoload.php";

use Google\Cloud\Vision\VisionClient;

date_default_timezone_set('Asia/Jakarta');

$vision = new VisionClient(['keyFile' => json_decode(file_get_contents("key.json"), true)]);

$familyPhotoSource = fopen("image.jpg", 'r');

$image = $vision->image($familyPhotoSource, ['FACE_DETECTION', 'WEB_DETECTION']);

$result = $vision->annotate($image);

echo "<pre>";
print_r($result);
echo "</pre>";
die();
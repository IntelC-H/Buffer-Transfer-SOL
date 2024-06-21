<?php
// This is Imagick sample using local image
// https://phpimagick.com/
$image = new \Imagick(realpath('image.jpg'));
header("Content-Type: image/jpg");
echo $image;
?>

<!-- <?php
// This is Imagick sample using online image
// https://phpimagick.com/
$imageurl = "http://localhost/upload/70a14c4a1a0685b37ce04dca9b7fd0b2qrcode.jpg";
$imageBlob = file_get_contents($imageurl);
$image = new \Imagick();
$image->readImageBlob($imageBlob);
header("Content-Type: image/jpg");
echo $image;
?> -->

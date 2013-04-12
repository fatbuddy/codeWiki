<?php
$image = imagecreatefrompng('http://www.phpied.com/files/filter/nathalie.png');
imagefilter($image, IMG_FILTER_COLORIZE, 0, 100, 0);
imagepng($image, 'img_filter_colorize_0_100_0.png');
echo imagepng($image);
imagedestroy($image);
?>
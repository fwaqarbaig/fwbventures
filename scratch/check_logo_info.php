<?php

$size = getimagesize('public/images/fwb-logo-official.png');
echo 'Width: '.$size[0].' | Height: '.$size[1].' | Mime: '.$size['mime']."\n";

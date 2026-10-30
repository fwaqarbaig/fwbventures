<?php

$uploaded = 'C:/Users/Farrukh/.gemini/antigravity/brain/c4d17b3c-9fab-4a50-9b4c-6e6f81ac5ab6/.user_uploaded/media_1792759116709_53ce57ce.png';
$logoOrig = 'd:/CMS/fwb/public/images/logo-original.png';
$logo1Orig = 'd:/CMS/fwb/public/images/logo-1-original.png';

$uInfo = getimagesize($uploaded);
$oInfo = file_exists($logoOrig) ? getimagesize($logoOrig) : null;
$o1Info = file_exists($logo1Orig) ? getimagesize($logo1Orig) : null;

echo 'Uploaded image: '.$uInfo[0].'x'.$uInfo[1].' ('.filesize($uploaded).' bytes, '.$uInfo['mime'].")\n";
if ($oInfo) {
    echo 'logo-original: '.$oInfo[0].'x'.$oInfo[1].' ('.filesize($logoOrig).' bytes, '.$oInfo['mime'].")\n";
}
if ($o1Info) {
    echo 'logo-1-original: '.$o1Info[0].'x'.$o1Info[1].' ('.filesize($logo1Orig).' bytes, '.$o1Info['mime'].")\n";
}

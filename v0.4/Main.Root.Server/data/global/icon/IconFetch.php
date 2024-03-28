<?php
// Olması gereken dosyalar
$files = [
    __DIR__ . "/IconSupport.php"
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

// Header | JSON
header("Content-Type: application/json; charset=UTF-8");

// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);
$ICON = (isset($ARR_URL[2]) && !empty($ARR_URL[2])) ? ($ARR_URL[2]) : (NULL);

// ICON
switch(NULL) {
    case $ICON:
        echo json_encode(NULL);
    default:
        echo json_encode(IconSupport::GetIcon(IconData::$key_iquestion));
}

// Daha fazla veri akışını engellemek için dosya sonu
exit;
?>
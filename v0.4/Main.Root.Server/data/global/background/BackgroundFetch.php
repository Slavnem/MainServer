<?php
// Olması gereken dosyalar
$files = [
    __DIR__ . "/BackgroundFunction.php"
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

// Yönlendirilmek istenen kısım
$REDIRECT_URL = array_slice($ARR_URL, 2, 1)[0];

// Sınıf fonksiyonunu kullanrak işlem yapma
BackgroundFunction::GetBackground(intval($REDIRECT_URL));

// Daha fazla işlem kabulü olmaması için dosyayı sonlandır
exit;
?>
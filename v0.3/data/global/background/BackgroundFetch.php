<?php
// Verileri almamızı sağlayan fonksiyonu tutan sınıfı içe aktarma
if(!file_exists(__DIR__ . "/BackgroundFunction.php")) {
    http_response_code(404); // dosya bulunamadı
    exit; // sonlandır
}

// Destek dosyası var, içeri aktar
require_once (__DIR__ . "/BackgroundFunction.php");

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
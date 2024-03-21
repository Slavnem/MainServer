<?php
// Verileri almamızı sağlayan fonksiyonu tutan sınıfı içe aktarma
if(!file_exists(__DIR__ . "/LanguageSupport.php")) {
    http_response_code(404); // dosya bulunamadı
    exit; // sonlandır
}

// Destek dosyası var, içeri aktar
require_once (__DIR__ . "/LanguageSupport.php");

// Header | JSON
header("Content-Type: application/json; charset=UTF-8");

// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);

// Yönlendirilmek istenen kısım
$REDIRECT_URL = array_slice($ARR_URL, 2, 3);

// DATA
$LANGUAGEID = strval(urldecode($REDIRECT_URL[0]));
$SUBLANGUAGEID = strval(urldecode($REDIRECT_URL[1]));
$KEYID = strval(urldecode($REDIRECT_URL[2]));

// Sınıf fonksiyonunu kullanarak veriyi getirmek
LanguageSupport::GetLanguage($LANGUAGEID, $SUBLANGUAGEID, $KEYID);

// Daha fazla işlem kabulü olmaması için dosyayı sonlandır
exit;
?>
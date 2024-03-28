<?php
define("LANGUAGE_BASIC", "basic");
define("LANGUAGE_DETAILED", "large");

// Olması gereken dosyalar
$files = [
    __DIR__ . "/LanguageSupport.php"
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
$REDIRECT_URL = array_slice($ARR_URL, 2, 4);

// DATA
$FETCHTYPE = strval(urldecode($REDIRECT_URL[0])); // basic - detailed
$LANGUAGEID = strval(urldecode($REDIRECT_URL[1]));
$SUBLANGUAGEID = strval(urldecode($REDIRECT_URL[2]));
$KEYID = strval(urldecode($REDIRECT_URL[3]));

// Sınıf fonksiyonunu kullanarak veriyi getirmek
switch($FETCHTYPE) {
    case LANGUAGE_BASIC:
        LanguageSupport::GetBasicLanguage($LANGUAGEID, $SUBLANGUAGEID, $KEYID);
    break;
    case LANGUAGE_DETAILED:
        LanguageSupport::GetDetailedLanguage($LANGUAGEID, $SUBLANGUAGEID, $KEYID);
    break;
}

// Daha fazla işlem kabulü olmaması için dosyayı sonlandır
exit;
?>
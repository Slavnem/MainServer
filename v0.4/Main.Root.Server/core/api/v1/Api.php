<?php
define("API_USERS", "users");

define("DIR_API", __DIR__);
define("DIR_API_DATABASE", DIR_API . "/database/");
define("DIR_API_ERROR", DIR_API . "/error/");
define("DIR_API_USERS", DIR_API . "/users/");
define("DIR_API_SIGN", DIR_API . "/sign/");

// Olması gereken dosyalar
$files = [
    DIR_API_DATABASE . "Database.php", // Veritabanı
    DIR_API_ERROR . "ErrorHandler.php" // Hata Denetleyici
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

// Veri Dönüşü json Olacağı İçin Sayfa İçeriği json
header("Content-Type: application/json; charset=UTF-8");

set_error_handler("ErrorHandler::handleError"); // Hata Döndürecek
set_exception_handler("ErrorHandler::handleException"); // Beklenmedik Durum Döndürecek

// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);
$ARR_URL = array_slice($ARR_URL, 1, (count($ARR_URL) - 1));

// Değerleri saklayacak değişkenleri oluşturmak
$API_SELECTOR;
$API_TYPE;

// Değerleri almak
try {
    $API_SELECTOR = strval(urldecode($ARR_URL[0]));
    $API_TYPE = strval(urldecode($ARR_URL[1]));
} catch(Exception $e) {
    exit;
}

// Veritabanı Bağlantısı
$databaseconn = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWD);

// yapılmak istenen işleme göre
switch($API_SELECTOR) {
    case API_USERS:
        if(!file_exists(DIR_API_SIGN . "Sign.php"))
            exit;

        // Giriş, kayıt işlemlerini kontrol eden kontrolcü
        require DIR_API_SIGN . "Sign.php";
        break;
}

// Daha fazla istek gelmeden api bağlantısı sonlandırma
exit;
?>
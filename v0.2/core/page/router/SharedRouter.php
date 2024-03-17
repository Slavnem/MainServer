<?php
// Gidilebilecek sayfa isimlendirmeleri
define("ID_ROUTE_PAGE_MAIN", 0);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_SHARED", $_SERVER['DOCUMENT_ROOT'] . "/core/page/shared/");

// Sayfalar
$pages = [
    "main" // ana sayfa
];

// Gidilebilecek dosyaları dizi de saklama
$routes = [
    ADDR_SHARED . "Main.php"
];

// Gitmek istenen sayfa isimini url parçalayıp al
$addr = strtolower(explode("/", $_SERVER["REQUEST_URI"])[1]);

// İlk yönlendirme kodu dönsün sonra sayfaya göndersin
switch($addr) {
    case $pages[ID_ROUTE_PAGE_MAIN]:
        if(file_exists($routes[ID_ROUTE_PAGE_MAIN])) {
            require $routes[ID_ROUTE_PAGE_MAIN];
            break;
        }
        else {
            header("Location: /");
            exit;
        }
        break;
    // HATA
    default:
        header("Location: /");
        exit;
}
?>

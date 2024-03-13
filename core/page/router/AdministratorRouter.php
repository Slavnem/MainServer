<?php
// Gidilebilecek sayfa isimlendirmeleri
define("ID_ROUTE_PAGE_ADMIN", 0);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_ADMINISTRATOR", $_SERVER['DOCUMENT_ROOT'] . "/core/page/administrator/");

// Sayfalar
$pages = [
    "admin" // ana sayfa
];

// Gidilebilecek dosyaları dizi de saklama
$routes = [
    ADDR_ADMINISTRATOR . "Admin.php"
];

// Gitmek istenen sayfa isimini url parçalayıp al
$addr = strtolower(explode("/", $_SERVER["REQUEST_URI"])[2]);

// İlk yönlendirme kodu dönsün sonra sayfaya göndersin
switch($addr) {
    case $pages[ID_ROUTE_PAGE_ADMIN]:
        if(file_exists($routes[ID_ROUTE_PAGE_ADMIN])) {
            require $routes[ID_ROUTE_PAGE_ADMIN];
            break;
        }
        else {
            http_response_code(404);
            header("Location: /404");
            exit;
        }
        break;
    // HATA
    default:
        http_response_code(404);
        header("Location: /");
        exit;
}
?>
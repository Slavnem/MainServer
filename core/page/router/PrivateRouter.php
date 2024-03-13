<?php
// Gidilebilecek sayfa isimlendirmeleri
define("ID_ROUTE_PAGE_LOGOUT", 0);
define("ID_ROUTE_PAGE_SETTINGS", 1);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_PRIVATE", $_SERVER['DOCUMENT_ROOT'] . "/core/page/private/");

// Sayfalar
$pages = [
    "logout", // çıkış yap
    "settings" // ayarlar
];

// Gidilebilecek dosyaları dizi de saklama
$routes = [
    ADDR_PRIVATE . "Logout.php",
    ADDR_PRIVATE . "Settings.php"
];

// Gitmek istenen sayfa isimini url parçalayıp al
$addr = strtolower(explode("/", $_SERVER["REQUEST_URI"])[2]);

// İlk yönlendirme kodu dönsün sonra sayfaya göndersin
switch($addr) {
    case $pages[ID_ROUTE_PAGE_LOGOUT]:
        if(file_exists($routes[ID_ROUTE_PAGE_LOGOUT])) {
            require $routes[ID_ROUTE_PAGE_LOGOUT];
            break;
        }
        else {
            http_response_code(404);
            header("Location: /");
            exit;
        }
        break;
    case $pages[ID_ROUTE_PAGE_SETTINGS]:
        if(file_exists($routes[ID_ROUTE_PAGE_SETTINGS])) {
            require $routes[ID_ROUTE_PAGE_SETTINGS];
            break;
        }
        else {
            http_response_code(404);
            header("Location: /");
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
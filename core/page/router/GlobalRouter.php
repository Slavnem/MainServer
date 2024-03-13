<?php
// Gidilebilecek sayfa isimlendirmeleri
define("ID_ROUTE_PAGE_HOMEPAGE", 0);
define("ID_ROUTE_PAGE_LOGIN", 1);
define("ID_ROUTE_PAGE_REGISTER", 2);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_GLOBAL", $_SERVER['DOCUMENT_ROOT'] . "/core/page/global/");

// Sayfalar
$pages = [
    "homepage", // anasayfa
    "login", // giriş yap
    "register" // kayıt ol
];

// Gidilebilecek dosyaları dizi de saklama
$routes = [
    ADDR_GLOBAL . "Homepage.php",
    ADDR_GLOBAL . "Login.php",
    ADDR_GLOBAL . "Register.php",
];

// Gitmek istenen sayfa isimini url parçalayıp al
$addr = strtolower(explode("/", $_SERVER["REQUEST_URI"])[1]);

// İlk yönlendirme kodu dönsün sonra sayfaya göndersin
switch($addr) {
    case $pages[ID_ROUTE_PAGE_HOMEPAGE]:
        if(file_exists($routes[ID_ROUTE_PAGE_HOMEPAGE])) {
            require $routes[ID_ROUTE_PAGE_HOMEPAGE];
            break;
        }
        else {
            http_response_code(404);
            header("Location: /");
            exit;
        }
        break;
    case $pages[ID_ROUTE_PAGE_LOGIN]:
        if(file_exists($routes[ID_ROUTE_PAGE_LOGIN])) {
            require $routes[ID_ROUTE_PAGE_LOGIN];
            break;
        }
        else {
            http_response_code(404);
            header("Location: /");
            exit;
        }
        break;
    case $pages[ID_ROUTE_PAGE_REGISTER]:
        if(file_exists($routes[ID_ROUTE_PAGE_REGISTER])) {
            require $routes[ID_ROUTE_PAGE_REGISTER];
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
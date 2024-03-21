<?php
// İçe Aktarılacak Olan Dosyalar
$files = [
    DIR_KERNEL . "KernelSession.php", // Oturum Çekirdeği
    DIR_DATA_GLOBAL_LANGUAGE . "LanguageSupport.php" // Dil Desteği
];

// Dosyaların uzunluğu
$length_files = count($files);

// Eklenen dosyalar için sayaç
$filecounter = 0;

// Döngü ile dosyaları içe aktarma
for($kernelcounter = 0; $kernelcounter < $length_files; $kernelcounter++) {
    $file = $files[$kernelcounter]; // o turdaki dosya

    // Dosya bulunmuyorsa
    if(!file_exists($file))
        exit;

    require $file; // içe aktar dosyayı
    ++$filecounter; // sayacı 1 arttır
}

// Yönlendirilecek sayfaların dosyaları
$pages = [
    [ // ADMINISTRATOR
        DIR_PAGE_ADMINISTRATOR . "Admin.php"
    ],
    [ // GLOBAL
        DIR_PAGE_GLOBAL . "Homepage.php",
        DIR_PAGE_GLOBAL . "Login.php",
        DIR_PAGE_GLOBAL . "Register.php"
    ],
    [ // PRIVATE
        DIR_PAGE_PRIVATE . "Logout.php",
        DIR_PAGE_PRIVATE . "Settings.php"
    ],
    [ // SHARED
        DIR_PAGE_SHARED . "Main.php"
    ]
];

// Yönlendirilecek sayfaların kısaltmaları
$pages_short = [
    [ // ADMINISTRATOR
        "administrator/admin"
    ],
    [ // GLOBAL
        "homepage",
        "user/login",
        "user/register"
    ],
    [ // PRIVATE
        "account/logout",
        "account/settings"
    ],
    [ // SHARED
        "global/main"
    ]
];

// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);

// Yönlendirilmek istenen kısım
$REDIRECT_URL = implode("/", array_slice($ARR_URL, 0, 2));

// Oturum kontrolü
switch($sessionFunction->SessionCheck($_SESSION)) {
    case false:
        SessionFunction::SessionAutoNew();
        break;
}

// Yönlendirme
switch($REDIRECT_URL) {
    // ADMINISTRATOR
    case $pages_short[0][0]: // admin
        // admin kontrolü başarısızsa sonlandırsın
        if(!$sessionFunction->SessionCheck($_SESSION)) {
            http_response_code(401);
            header("Location: /");
            exit;
        }
        else if(!$sessionFunction->SessionAdmin($_SESSION)) {
            http_response_code(401);
            header("Location: /");
            exit;
        }

        // sayfayı içe aktarma
        switch($REDIRECT_URL) {
            case $pages_short[0][0]:
                require $pages[0][0];
                break;
        }
        break;
    // GLOBAL
    case $pages_short[1][0]: // homepage
    case $pages_short[1][1]: // login
    case $pages_short[1][2]: // register
        // sayfayı içe aktarma
        switch($REDIRECT_URL) {
            case $pages_short[1][0]:
                require $pages[1][0];
                break;
            case $pages_short[1][1]:
                require $pages[1][1];
                break;
            case $pages_short[1][2]:
                require $pages[1][2];
                break;
            default: // unknown
                exit;
        }
        break;
    // PRIVATE
    case $pages_short[2][0]: // logout
    case $pages_short[2][1]: // settings
        // oturum kontrölü başarısızsa sonlandırsın
        if(!$sessionFunction->SessionCheck($_SESSION)) {
            http_response_code(401);
            header("Location: /");
            exit;
        }

        // sayfayı içe aktarma
        switch($REDIRECT_URL) {
            case $pages_short[2][0]:
                require $pages[2][0];
                break;
            case $pages_short[2][1]:
                require $pages[2][1];
                break;
            default: // unknown
                exit;
        }
        break;
    // SHARED
    case $pages_short[3][0]: // main
        // sayfayı içe aktarma
        switch($REDIRECT_URL) {
            case $pages_short[3][0]:
                require $pages[3][0];
                break;
            default: // unknown
                exit;
        }
        break;
    // UNKNOWN
    default:
        // Eğer kullanıcı giriş yapmış bir kullanıcı ise
        // direk paylaşımlı sayfaya, değilse ana sayfaya yönlendirsin
        if(!$_SESSION[SessionStruct::$session_login])
            require $pages[1][0]; // homepage
        else
            require $pages[3][0]; // main
        break;
}
?>
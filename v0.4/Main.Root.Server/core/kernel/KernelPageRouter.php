<?php
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

// Sayfa Yönlendirmesi
try {
    switch($REDIRECT_URL) {
        // ADMINISTRATOR
        case $pages_short[0][0]: // admin
            // admin kontrolü başarısızsa sonlandırsın
            switch(false) {
                case SessionFunction::SessionCheck($_SESSION):
                case SessionFunction::SessionAdmin($_SESSION):
                    http_response_code(401);
                    header("Location: /");
                    exit;
            }
    
            // sayfayı içe aktarma
            switch($REDIRECT_URL) {
                case $pages_short[0][0]:
                        if(!file_exists($pages[0][0]))
                            exit;

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
                    if(!file_exists($pages[1][0]))
                        exit;

                    require $pages[1][0];
                    break;
                case $pages_short[1][1]:
                    if(!file_exists($pages[1][1]))
                        exit;

                    require $pages[1][1];
                    break;
                case $pages_short[1][2]:
                    if(!file_exists($pages[1][2]))
                        exit;

                    require $pages[1][2];
                    break;
                default: exit;
            }
        break;
        // PRIVATE
        case $pages_short[2][0]: // logout
        case $pages_short[2][1]: // settings
            // oturum kontrolü başarısızsa sonlandırsın
            switch(false) {
                case SessionFunction::SessionCheck($_SESSION):
                    http_response_code(401);
                    header("Location: /");
                    exit;
            }

            // sayfayı içe aktarma
            switch($REDIRECT_URL) {
                case $pages_short[2][0]:
                    if(!file_exists($pages[2][0]))
                        exit;

                    require $pages[2][0];
                    break;
                case $pages_short[2][1]:
                    if(!file_exists($pages[2][1]))
                        exit;

                    require $pages[2][1];
                    break;
                default: exit;
            }
        break;
        // SHARED
        case $pages_short[3][0]: // main
            // sayfayı içe aktarma
            switch($REDIRECT_URL) {
                case $pages_short[3][0]:
                    if(!file_exists($pages[3][0]))
                        exit;

                    require $pages[3][0];
                break;
                default: exit;
            }
        break;
        // UNKNOWN
        default:
            // Eğer kullanıcı giriş yapmış bir kullanıcı ise
            // direk paylaşımlı sayfaya, değilse ana sayfaya yönlendirsin
            switch(false) {
                case SessionFunction::SessionCheck($_SESSION): // anasayfa
                    if(!file_exists($pages[1][0]))
                        exit;

                    require $pages[1][0];
                break;
                default: // paylaşımlı
                    if(!file_exists($pages[3][0]))
                        exit;

                    require $pages[3][0];
                break;
            }
        break;
    }
} catch(Exception $e) {
    exit;
}
?>
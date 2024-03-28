<?php
////////////////////////////
// ANA DOSYAYI İÇE AKTARMA VE TANIMLAMA
////////////////////////////
// Tür dönüşümü engellemeyi tanımla
declare(strict_types = 1);

// İçe Aktarılacak Olan Dosyalar
$files = [
    __DIR__ . "/DirectoryTree.php" // Klasör Ağaç Yapısı
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

////////////////////////////
// URL PARÇALAMA
////////////////////////////
// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);

// Yönlendirilmek istenen kısım
$REDIRECT_URL = implode("/", array_slice($ARR_URL, 0, 2));

////////////////////////////
// ALT DOSYALARI İÇE AKTARMA
////////////////////////////
// Ana kök dosya yapısı içeri aktarıldaktan sonraki alt dosyalar
$subfiles = [
    DIR_SESSION . "Session.php" // Oturum işlemlerini yapan dosyaları içeren dosya
];

// Döngü ile dosyaları içe aktarma
foreach($subfiles as $subfile) {
    if(!file_exists($subfile)) // dosya yok
        exit; // çıkış

    require $subfile; // dosyayı içe aktar
}

////////////////////////////
// SORGU İŞLEMLERİ
///////////////////////////
// Oturum İşlemleri
define("SESSION_NEW", "session/new");
define("SESSION_UPDATE", "session/update");
define("SESSION_DESTROY", "session/estroy");
define("SESSION_FETCH", "session/fetch");
define("SESSION_DEBUG", "session/debug");

switch($REDIRECT_URL) {
    case SESSION_DEBUG: // oturum testleri için
        echo "session debug";
        exit;
    case SESSION_NEW: // yeni oturum için
        // Veri Dönüşü json Olacağı İçin Sayfa İçeriği json
        header("Content-Type: application/json; charset=UTF-8");

        // Otomatik oturum verileri oluşturma
        try {
            // eğer veri alınmışsa oturumu güncelle
            $NEWSESSION = SessionFunction::SessionAutoNew();
        } catch(Exception $e) {
            // yeni oturum bile oluşturulamıyor
            // oturumu boşlukla doldur
            $NEWSESSION = [];
        } finally {
            // Oturuma yeni verileri aktar
            $_SESSION = $NEWSESSION;
        }

        echo json_encode($_SESSION);
        exit;
    case SESSION_UPDATE:
        // Veri Dönüşü json Olacağı İçin Sayfa İçeriği json
        header("Content-Type: application/json; charset=UTF-8");

        try {
            // post verileri alma
            $POSTDATA = json_decode(file_get_contents('php://input'), true);

            // parametreler
            $PARAMS = array(
                "username" => $POSTDATA["username"],
                "password" => $POSTDATA["password"]
            );

            // Kullanıcı verilerini alıyoruz
            $USERDATA = SessionFunction::SessionUserToSessionConvert($PARAMS);

            // Veriler boş değilse oturuma kaydet
            // Ve oturum da önemli bilgiler değişmişse sayfayı yenile
            switch(count($USERDATA) > 0) {
                case true; // kullanıcı verisi var
                    // Kullanıcı bilgilerinin dönüştürülmüş halini oturuma kaydet
                    $_SESSION = $USERDATA;

                    // oturum verisi döndür
                    echo json_encode($_SESSION);
                    exit;
            }
        } catch(Exception $e) {
            echo json_encode(["Session Update: " => false, "Error: " => $e->getMessage()]);
        }
        exit;
    case SESSION_FETCH: // verileri getir
        // Veri Dönüşü json Olacağı İçin Sayfa İçeriği json
        header("Content-Type: application/json; charset=UTF-8");

        // Oturum verilerini döndür
        echo json_encode($_SESSION);
        exit;
}

////////////////////////////
// SAYFA YÖNLENDİRMEYİ İÇE AKTARMA
///////////////////////////
$routefiles = [
    DIR_KERNEL . "KernelPageRouter.php" // Sayfa Yönlendirme Çekirdeği
];

// Döngü ile dosyaları içe aktarma
foreach($routefiles as $routefile) {
    if(!file_exists($routefile)) // dosya yok
        exit; // çıkış

    require $routefile; // dosyayı içe aktar
}

////////////////////////////
// OTURUM İŞLEMLERİ
////////////////////////////
// Eğer oturum yoksa yeni bir tane oluştursun
try {
    switch(boolval(SessionFunction::SessionCheck($_SESSION))) {
        // oturum yeni oluştur
        case false:
            try {
                // Eğer bir oturum yoksa
                switch(NULL) {
                    case $_SESSION: // oturum yok
                        // yeni oturum oluşturma için sorgu gönderme
                        $_SESSION = SessionFunction::SessionAutoNew();
                    break;
                }
            } catch(Exception $e) {
                echo "Session Cannot Creatable. Email: \"kafkasrevan@gmail.com\" Send ScreenShot To This Email";
                break;
            }
            break;
    }
} catch(Exception $e) {}
?>
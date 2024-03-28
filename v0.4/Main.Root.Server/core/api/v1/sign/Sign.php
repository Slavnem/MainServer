<?php
define("USER_VERIFY", "verify");
define("USER_NEW", "new");
define("USER_GET", "data");

// Olması gereken dosyalar
$files = [
    DIR_API_USERS . "UsersStruct.php",
    DIR_API_USERS . "UsersGateway.php",
    DIR_API_USERS . "UsersController.php"
];

// Kullanıcı işlemleri yapmayı sağlayacak olan dosyaları çağırma
// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

// Kullanıcı kontrol ve veri yolu
$gateway = new UsersGateway($databaseconn);
$usercontroller = new UsersController($gateway);

// Veri Dönüşü json Olacağı İçin Sayfa İçeriği json
header("Content-Type: application/json; charset=UTF-8");

// İşlem türüne göre işlem için
switch($API_TYPE) {
    case USER_VERIFY:
        try {
            // post verileri alma
            $POSTDATA = json_decode(file_get_contents('php://input'), true);

            // alınan verilerle kullanıcı durumu kontrolü
            $USERVERIFY = $usercontroller->UserVerify(strval($POSTDATA["username"]), strval($POSTDATA["password"]));
    
            // alınan veriler ile sonuç döndürme
            echo json_encode($USERVERIFY);
        } catch(Exception $e) {
            // kullanıcı giriş denemesi başarısız
            echo json_encode(false);
        }
        exit;
    case USER_NEW:
        echo json_encode(["Kullanıcı Oluşturması: " => false]);
        exit;
    case USER_GET:
        try {
            // post verileri alma
            $POSTDATA = json_decode(file_get_contents('php://input'), true);

            // verileri alma
            $USERDATA = $usercontroller->UserData(strval($POSTDATA["username"]), strval($POSTDATA["password"]));
    
            // alınan veriler ile sonuç döndürme
            echo json_encode($USERDATA);
        } catch(Exception $e) {
            // kullanıcı giriş denemesi başarısız
            echo json_encode(null);
        }
        exit;
}

// manuel olarak dosyayı sonlandırma
exit;
?>
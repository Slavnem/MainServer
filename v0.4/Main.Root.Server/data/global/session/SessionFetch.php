<?php
// Olması gereken dosyalar
$files = [
    // __DIR__ . "/SessionData.php"
];

// Kullanıcı işlemleri yapmayı sağlayacak olan dosyaları çağırma
// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

// Header | JSON
header("Content-Type: application/json; charset=UTF-8");

// Sınıf fonksiyonunu kullanrak işlem yapma
echo json_encode($_SESSION);

// Daha fazla işlem kabulü olmaması için dosyayı sonlandır
exit;
?>
<?php
// Eğer oturum başlamamışsa başlatsın
if(session_status() !== PHP_SESSION_ACTIVE)
    session_start();

// Olması gereken dosyalar
$files = [
    DIR_SESSION . "SessionFunction.php", // Oturum Dosyaları
    DIR_SESSION . "SessionStruct.php", // Oturum Yapısı
    DIR_KERNEL ."KernelApi.php" // API Çekirdeği
];

// Dosyaların uzunluğu
$length_files = count($files);

// Eklenen dosyalar için sayaç
$filecounter = 0;

// Döngü ile dosyaları içe aktarma
for($sessioncounter = 0; $sessioncounter < $length_files; $sessioncounter++) {
    $file = $files[$sessioncounter]; // o turdaki dosya

    // Dosya bulunmuyorsa
    if(!file_exists($file))
        exit;

    require_once $file;
    $filecounter++;
}

/*
    NOT: Oturum varsa ve gelen istek oturum girişi
    zorunlu ise ona göre yönlendirme sayfasına bilgi gönderecek
    bu sayede yönlendirme sayfası da ona göre kullanıcı
    bilgilerini alıp sadece kullanıcıların veya paylaşımlı
    kısımların kullanıldığı sayfalarda bu verileri kullanacak
*/

// URL
$URL = substr(strtolower($_SERVER["REQUEST_URI"]), 1);

// URL PARTS
$ARR_URL = explode("/", $URL);

// Oturum kontrolü
$sessionFunction = new SessionFunction($databaseconn);
?>
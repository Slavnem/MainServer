<?php
$files = [
    DIR_SESSION . "SessionStarter.php", // Oturum Başlatıcı
    DIR_SESSION . "SessionStruct.php", // Oturum Dosyaları
    DIR_SESSION . "SessionFunction.php" // Oturum Yapısı
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}
?>
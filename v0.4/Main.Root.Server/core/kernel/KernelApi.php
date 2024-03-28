<?php
// Olması gereken dosyalar
$files = [
    $_SERVER["DOCUMENT_ROOT"] . "/core/api/v1/Api.php" // API
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}
?>
<?php
// Olması gereken dosyalar
$files = [
    DIR_API_ACTIVE . "Api.php" // API
];

// Dosyaların uzunluğu
$length_files = count($files);

// Eklenen dosyalar için sayaç
$filecounter = 0;

// Döngü ile dosyaları içe aktarma
for($apicounter = 0; $apicounter < $length_files; $apicounter++) {
    $file = $files[$apicounter]; // o turdaki dosya

    // Dosya bulunmuyorsa
    if(!file_exists($file))
        exit;

    require_once $file;
    $filecounter++;
}
?>
<?php
// Olması gereken dosyalar
$files = [
    DIR_SESSION . "Session.php", // Oturum
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
?>
<?php
// Gerekli dosya/dosyalar yoksa
if(!file_exists(__DIR__ . "/DirectoryTree.php"))
    exit;

// Gerekli dosyayı/dosyaları içe aktar
require (__DIR__ . "/DirectoryTree.php");

// İçe Aktarılacak Olan Dosyalar
$files = [
    DIR_KERNEL . "KernelSession.php" // Oturum Çekirdeği
];

// Dosyaların uzunluğu
$length_incfiles = count($files);

// Eklenen dosyalar için sayaç
$incfilecounter = 0;

// Döngü ile dosyaları içe aktarma
for($kernelcounter = 0; $kernelcounter < $length_incfiles; $kernelcounter++) {
    $file = $files[$kernelcounter]; // o turdaki dosya

    // Dosya bulunmuyorsa
    if(!file_exists($file))
        exit;

    require $file; // içe aktar dosyayı
    ++$filecounter; // sayacı 1 arttır
}
?>
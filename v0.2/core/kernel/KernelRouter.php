<?php
// Tür dönüşümü engellemeyi tanımla
declare(strict_types = 1);

// Gerekli dosya/dosyalar yoksa
if(!file_exists(__DIR__ . "/Kernel.php"))
    exit;

// Gerekli dosyayı/dosyaları içe aktar
require (__DIR__ . "/Kernel.php");
?>
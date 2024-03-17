<?php
// Tür dönüşümü engellemeyi tanımla
declare(strict_types = 1);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_KERNEL", $_SERVER['DOCUMENT_ROOT'] . "/core/kernel/");

// Dosyaları saklayan dizi
$loads = [
    ADDR_KERNEL . "Kernel.php" // çekirdek
];

// Eklenen dosyalar için sayaç
$count = 0;

// Döngü ile ekle
foreach($loads as $load) {
    $file = $load; // dosya

    // eğer dosya varsa ekle
    if(file_exists($file)) {
        require $file; // dosyayı içe aktar
        $count++; // sayacı arttır
        continue; // sonraki tura geç
    }
    else {
        http_response_code(404); // hata kodu
        header("Location: /404"); // hata yönlendirme konumu
        exit; // çık
    }
}
?>
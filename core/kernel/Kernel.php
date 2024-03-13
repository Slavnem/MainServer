<?php
// Dosyaları saklayan dizi
$loads = [
    "core/session/SessionCore.php", // oturum
    "core/api/KernelApi.php" // api çekirdek
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
        // header("Location: /404"); // hata yönlendirme konumu
        exit; // çık
    }
}
?>
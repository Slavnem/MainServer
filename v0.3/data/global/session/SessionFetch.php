<?php
// Verileri almamızı sağlayan fonksiyonu tutan sınıfı içe aktarma
if(!file_exists(__DIR__ . "/SessionData.php")) {
    http_response_code(404); // dosya bulunamadı
    exit; // sonlandır
}

// Destek dosyası var, içeri aktar
require_once (__DIR__ . "/SessionData.php");

// Header | JSON
header("Content-Type: application/json; charset=UTF-8");

// Sınıf fonksiyonunu kullanrak işlem yapma
SessionData::SessionUser();

// Daha fazla işlem kabulü olmaması için dosyayı sonlandır
exit;
?>
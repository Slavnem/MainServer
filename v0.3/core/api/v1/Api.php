<?php
// Olması gereken dosyalar
$files = [
    DIR_API_DATABASE . "Database.php" // Veritabanı
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

// Veritabanı Bağlantısı
$databaseconn = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWD);
?>
<?php
// Olması gereken dosyalar
$files = [
    __DIR__ . "/IconData.php"
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

class IconSupport {
    public static function GetIcon(string $key_icon): string {
        try {
            $icon = IconData::$Icons[$key_icon];
        } catch(Exception $e) {
            $icon = null;
        } finally {
            return $icon;
        }
    }
}
?>
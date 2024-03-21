<?php
// Verileri almamızı sağlayan fonksiyonu tutan sınıfı içe aktarma
if(!file_exists(__DIR__ . "/BackgroundData.php")) {
    http_response_code(404); // dosya bulunamadı
    exit; // sonlandır
}

// Destek dosyası var, içeri aktar
require_once (__DIR__ . "/BackgroundData.php");

// FONKSİYON SINIFI
class BackgroundFunction {
    public static function GetBackground($random = -1) : void {
        $random = intval($random); // tamsayı

        // Eğer herhangi bir veri yoksa boş dönsün
        if(empty(BackgroundData::$Background)) {
            echo json_encode(null);
            return;
        }

        // sayının numaralandırmasına göre veriyi alma
        switch($random > -1) {
            case true: // istenen değere göre
                if(isset(BackgroundData::$Background[$random]) && !empty(BackgroundData::$Background[$random])) // veri var
                    echo json_encode(BackgroundData::$Background[$random]);
                else // veri yok
                    echo json_encode(null);

                // veri yok
                return;
            default: // rastgele
                echo json_encode(BackgroundData::$Background[rand(0, (count(BackgroundData::$Background) - 1))]);
                return;
        }
    }
}
?>
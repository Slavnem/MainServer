<?php
// Olması gereken dosyalar
$files = [
    __DIR__ . "/BackgroundData.php"
];

// Döngü ile dosyaları içe aktarma
foreach($files as $file) {
    if(!file_exists($file)) // dosya yok
        exit; // çıkış

    require $file; // dosyayı içe aktar
}

// FONKSİYON SINIFI
class BackgroundFunction {
    public static function GetBackground($random = 0) : void {
        $random = intval($random); // tamsayı

        // Eğer herhangi bir veri yoksa boş dönsün
        if(empty(BackgroundData::$Background)) {
            echo json_encode(null);
            return;
        }

        // sayının numaralandırmasına göre veriyi alma
        switch($random > 0) {
            case true: // istenen değere göre
                $random -= 1; // dizi indexi ile uyuşması için 1 azaltıyoruz

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
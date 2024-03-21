<?php
// Language verilerini tutan sınıfı içe aktarma
if(!file_exists(__DIR__ . "/LanguageData.php")) {
    http_response_code(404); // dosya bulunamadı
    exit; // sonlandır
}

// Dil destek dosyası var, içeri aktar
require_once (__DIR__ . "/LanguageData.php");

// LANGUAGE SUPPORT CLASS
class LanguageSupport {
    public static function GetLanguage($LANGUAGEID = NULL, $SUBLANGUAGEID = NULL, $KEYID = NULL) : void {
        // İstenilene göre değer döndürmek
        switch(NULL) {
            case LanguageData::$LANGUAGESDATA: // dil bilgisi yok
                echo json_encode(NULL);
                break;
            case $LANGUAGEID: // sabit bir dil bilgisi istenmiyor
                switch(!NULL) {
                    case $SUBLANGUAGEID:
                        switch(!NULL) {
                            case $KEYID:
                                // Bilgilerin tutulacağı dizi
                                $DataArr = NULL;

                                // İlk döngü ile dili alıp sonra lehçesini döngüyle alacağız
                                foreach(LanguageData::$ALLANGUAGES as $Language) {
                                    // Eğer o dile istenen lehçe yoksa es geçsin
                                    if(!isset(LanguageData::$LANGUAGESDATA[$Language][$SUBLANGUAGEID]))
                                        continue;

                                    // lehçeye ait bilgileri tutacak
                                    $DataSubLanguage[$SUBLANGUAGEID] = LanguageData::$LANGUAGESDATA[$Language][$SUBLANGUAGEID][$KEYID];

                                    // lehçe bilgisini ana bilgiye ekle
                                    $DataArr[$Language] = $DataSubLanguage;
                                }

                                echo json_encode($DataArr);
                                break;
                            default:
                                // Bilgilerin tutulacağı dizi
                                $DataArr = NULL;

                                // İlk döngü ile dili alıp sonra lehçesini döngüyle alacağız
                                foreach(LanguageData::$ALLANGUAGES as $Language) {
                                    $DataSubLanguage = []; // lehçeye ait bilgileri tutacak

                                    // Eğer o dile istenen lehçe yoksa es geçsin
                                    if(!isset(LanguageData::$LANGUAGESDATA[$Language][$SUBLANGUAGEID]))
                                        continue;

                                    // lehçesi uyuşanları al
                                    $DataSubLanguage[$SUBLANGUAGEID] = LanguageData::$LANGUAGESDATA[$Language][$SUBLANGUAGEID];
                                    $DataArr[$Language] = $DataSubLanguage;
                                }

                                echo json_encode($DataArr);
                                break;
                        }
                        break;
                    default: // dil ve lehçesi olmadan veriyi döndürme
                        switch(!NULL) {
                            case $KEYID: // tüm diller ve lehçeler dahil
                                // Bilgilerin tutulacağı dizi
                                $DataArr = NULL;

                                // İlk döngü ile dili alıp sonra lehçesini döngüyle alacağız
                                foreach(LanguageData::$ALLANGUAGES as $Language) {
                                    $DataSubLanguage = []; // lehçeye ait bilgileri tutacak

                                    // lehçeye ait bilgileri alma
                                    foreach(LanguageData::$ALLSUBLANGUAGES[$Language] as $SubLanguage) {
                                        $Key = LanguageData::$LANGUAGESDATA[$Language][$SubLanguage][$KEYID];

                                        // Eğer veri yoksa sonraki tura geç
                                        if(empty($Key))
                                            continue;

                                        // veriyi ekle
                                        $DataSubLanguage[$SubLanguage] = $Key;
                                    }

                                    // eğer o lehçeye ait veri yoksa sonraki tura geç
                                    if(empty($DataSubLanguage))
                                        continue;

                                    // lehçeye ait bilgileri ana dilleri tutan diziye aktarma
                                    $DataArr[$Language] = $DataSubLanguage;
                                }

                                echo json_encode($DataArr);
                                break;
                            default: // tüm bilgileri döndür
                                echo json_encode(LanguageData::$LANGUAGESDATA);
                                break;
                        }
                        break;
                }
                break;
            case $SUBLANGUAGEID: // lehçe yoksa tüm dili al
                switch(!NULL) {
                    case $KEYID:
                        // Bilgilerin tutulacağı dizi
                        $DataArr = NULL;
                        $DataSubLanguage = []; // lehçeye ait bilgileri tutacak

                        // lehçeye ait bilgileri alma
                        foreach(LanguageData::$ALLSUBLANGUAGES[$LANGUAGEID] as $SubLanguage) {
                            $Key = LanguageData::$LANGUAGESDATA[$LANGUAGEID][$SubLanguage][$KEYID];

                            // Eğer veri yoksa sonraki tura geç
                            if(empty($Key))
                                continue;

                            // veriyi ekle
                            $DataSubLanguage[$SubLanguage] = $Key;
                        }

                        // eğer o lehçeye ait veri yoksa sonraki tura geç
                        if(empty($DataSubLanguage))
                            continue;

                        // lehçeye ait bilgileri ana dilleri tutan diziye aktarma
                        $DataArr[$LANGUAGEID] = $DataSubLanguage;

                        echo json_encode($DataArr);
                        break;
                    default:
                        // Bilgilerin tutulacağı dizi
                        $DataArr[$LANGUAGEID] = LanguageData::$LANGUAGESDATA[$LANGUAGEID] ?? NULL;

                        echo json_encode($DataArr);
                        break;
                }
                break;
            case $KEYID: // kelime anahtarı yok ise
                // Bilgilerin tutulacağı dizi
                $DataArr[$LANGUAGEID][$SUBLANGUAGEID] = LanguageData::$LANGUAGESDATA[$LANGUAGEID][$SUBLANGUAGEID];

                echo json_encode($DataArr);
                break;
            default: // hepsi var
                // Bilgilerin tutulacağı dizi
                $DataArr[$LANGUAGEID][$SUBLANGUAGEID][$KEYID] = LanguageData::$LANGUAGESDATA[$LANGUAGEID][$SUBLANGUAGEID][$KEYID];
                
                echo json_encode($DataArr);
                break;
        }
    }
}
?>
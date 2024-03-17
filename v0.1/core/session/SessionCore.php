<?php
// Tür dönüşümü engellemeyi tanımla
declare(strict_types = 1);

// İçe aktarılacak dosya numaralandırmaları
define("ID_SESSIONCORE_INC_DATABASE", 0);

// Yönlendirilecek dosyaların bulunduğu adres
define("ADDR_API", $_SERVER['DOCUMENT_ROOT'] . "/core/api/v1/");

// Olması gereken dosyalar
$includes = [
    ADDR_API . "database/Database.php" // veritabanı
];

// Eklenen dosyalar için sayaç
$count = 0;

// Döngü ile ekle
foreach($includes as $include) {
    $file = $include; // dosya

    // eğer dosya varsa ekle
    if(file_exists($file)) {
        require $file; // dosyayı içe aktar
        $count++; // sayacı arttır
        continue; // sonraki tura geç
    }
    else {
        header("Location: /"); // hata yönlendirme konumu
        exit; // çık
    }
}

class SessionCore {
    // oturum bağlantısı için veritabanı bağlantısı sağlanacak değişken
    private PDO $sessionConnect;

    // sınıf objesi
    public function __construct(Database $database) {
        $this->sessionConnect = $database->getConnection();
    }

    public function SessionCheck(array $datas = []) : bool {
        // veri doğrulaması için sorgu değişkeni
        $sql = SessionStruct::$procedure0;

        // sql bağlantısı için
        $stmt = $this->sessionConnect->prepare($sql);

        // parametreleri tanımlama
        $param_id = (isset($datas[0]) && !empty($datas[0])) ? intval(urlencode($datas[0])) : NULL; // id
        $param_username = (isset($datas[1]) && !empty($datas[1])) ? urlencode($datas[1]) : NULL; // kullanıcı adı
        $param_email = (isset($datas[2]) && !empty($datas[2])) ? urlencode($datas[2]) : NULL; // e-posta
        $param_password = (isset($datas[3]) && !empty($datas[3])) ? urlencode($datas[3]) : NULL; // şifre (şifrelenmiş veya şifrelenmemiş)
        $param_membership = (isset($datas[4]) && !empty($datas[4])) ? urlencode($datas[4]) : NULL; // üyelik
        $param_language = (isset($datas[5]) && !empty($datas[5])) ? intval(urlencode($datas[5])) : NULL; // dil
        $param_verified = (isset($datas[6]) && !empty($datas[6])) ? urlencode($datas[6]) : NULL; // doğrulama türü

        // parametrelerin değerlerini verrme
        $stmt->bindParam(1, $param_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $param_username, PDO::PARAM_STR);
        $stmt->bindParam(3, $param_email, PDO::PARAM_STR);
        $stmt->bindParam(4, $param_password, PDO::PARAM_STR);
        $stmt->bindParam(5, $param_membership, PDO::PARAM_STR);
        $stmt->bindParam(6, $param_language, PDO::PARAM_INT);
        $stmt->bindParam(7, $param_verified, PDO::PARAM_STR);

        // sorgu çalıştırma
        $stmt->execute();

        // eşleşen satır miktarını döndürme
        return ($stmt->rowCount()) ? (true) : (false);
    }
}

// Veritabanı bağlantısı için
$connectDB = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWD);

// Sınıf objesini kullanmak için değişken
$SessionObject = new SessionCore($connectDB);
?>

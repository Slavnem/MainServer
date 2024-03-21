<?php
// CLASS
class SessionFunction {
    // oturum bağlantısı için veritabanı bağlantısı sağlanacak değişken
    private PDO $sessionConnect;

    // sınıf objesi
    public function __construct(Database $database) {
        $this->sessionConnect = $database->getConnection();
    }

    public function SessionFetch(array $datas = []) : array {
        // veri doğrulaması için sorgu değişkeni
        $sql = SessionStruct::$procedure0;

        // sql bağlantısı için
        $stmt = $this->sessionConnect->prepare($sql);

        // parametreleri tanımlama
        $param_id = (isset($datas[0]) && !empty($datas[0])) ? intval(urlencode($datas[0])) : NULL; // id
        $param_username = (isset($datas[1]) && !empty($datas[1])) ? urlencode($datas[1]) : NULL; // isim
        $param_name = (isset($datas[2]) && !empty($datas[2])) ? urlencode($datas[2]) : NULL; // soyisim
        $param_lastname = (isset($datas[3]) && !empty($datas[3])) ? urlencode($datas[3]) : NULL; // kullanıcı adı
        $param_email = (isset($datas[4]) && !empty($datas[4])) ? urlencode($datas[4]) : NULL; // e-posta
        $param_password = (isset($datas[5]) && !empty($datas[5])) ? urlencode($datas[5]) : NULL; // şifre (şifrelenmiş veya şifrelenmemiş)
        $param_membership = (isset($datas[6]) && !empty($datas[6])) ? urlencode($datas[6]) : NULL; // üyelik
        $param_languageid = (isset($datas[6]) && !empty($datas[6])) ? intval(urlencode($datas[6])) : NULL; // dil
        $param_verifiedid = (isset($datas[7]) && !empty($datas[7])) ? urlencode($datas[7]) : NULL; // doğrulama türü
        $param_created = (isset($datas[8]) && !empty($datas[8])) ? urlencode($datas[8]) : NULL; // kullanıcı oluşturulma tarihi
        $param_login = (isset($datas[9]) && !empty($datas[9])) ? boolval(urlencode($datas[9])) : false; // giriş doğruluğu
        $param_time = (isset($datas[10]) && !empty($datas[10])) ? urlencode($datas[10]) : NULL; // oturum süresi

        // parametrelerin değerlerini verrme
        $stmt->bindParam(1, $param_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $param_username, PDO::PARAM_STR);
        $stmt->bindParam(3, $param_email, PDO::PARAM_STR);
        $stmt->bindParam(4, $param_password, PDO::PARAM_STR);
        $stmt->bindParam(5, $param_membership, PDO::PARAM_STR);
        $stmt->bindParam(6, $param_languageid, PDO::PARAM_INT);
        $stmt->bindParam(7, $param_verifiedid, PDO::PARAM_STR);

        // sorgu çalıştırma
        $stmt->execute();

        // herhangi bir kayıt bulunamadı, boş döndür
        if(!$stmt->rowCount())
            return [];

        // tüm bulunan sonuçları dizi halinde döndürme
        return ($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function SessionCheck(array $datas = []) : bool {
        // veri çekmek ve doluluğunu boşluğunu kontrol edip döndürmek
        return (count($this->SessionFetch($datas))) ? (true) : (false);
    }

    public function SessionAdmin(array $datas = []) : bool {
        // veri çekmek ve doluluğunu ve admin durumun kontrol edip döndürmek
        return (intval($this->SessionFetch($datas)[SessionStruct::$column_memberid]) == SessionStruct::$session_admin);
    }

    public static function SessionAutoNew() : void {
        // Otomatik oturum verileri oluşturma
        $_SESSION[SessionStruct::$session_id] = intval(0);
        $_SESSION[SessionStruct::$session_username] = NULL;
        $_SESSION[SessionStruct::$session_name] = NULL;
        $_SESSION[SessionStruct::$session_lastname] = NULL;
        $_SESSION[SessionStruct::$session_email] = NULL;
        $_SESSION[SessionStruct::$session_password] = NULL;
        $_SESSION[SessionStruct::$session_memberedid] = NULL;
        $_SESSION[SessionStruct::$session_languageid] = intval(1); // EN_US
        $_SESSION[SessionStruct::$session_verifiedid] = NULL;
        $_SESSION[SessionStruct::$session_created] = NULL;
        $_SESSION[SessionStruct::$session_login] = boolval(false);
        $_SESSION[SessionStruct::$session_time] = strval(time());
    }

    public static function SessionUpdate(array $datas = []) : bool {
        // Gönderilen veriler
        $data_session__id = $datas[0] ?? NULL;
        $data_session__username = $datas[1] ?? NULL;
        $data_session__name = $datas[2] ?? NULL;
        $data_session__lastname = $datas[3] ?? NULL;
        $data_session__email = $datas[4] ?? NULL;
        $data_session__password = $datas[5] ?? NULL;
        $data_session__memberedid = $datas[6] ?? NULL;
        $data_session__languageid = $datas[7] ?? NULL;
        $data_session__verifiedid = $datas[8] ?? NULL;
        $data_session__created = $datas[9] ?? NULL;
        $data_session__login = $datas[10] ?? NULL;
        $data_session__time = $datas[11] ?? NULL;

        // verileri güncelleme
        switch(NULL) {
            // dolu olması zorunlu olan verilerin boş olması
            case $data_session__id:
            case $data_session__username:
            case $data_session__email:
            case $data_session__password:
            case $data_session__memberedid:
            case $data_session__languageid:
            case $data_session__verifiedid:
            case $data_session__created:
            case $data_session__login:
                return false;
        }

        switch(
            $data_session__id < 1 ||
            $data_session__memberedid < 0 ||
            $data_session__languageid < 1 ||
            $data_session__verifiedid < 0 ||
            $data_session__login != true)
            {
                // geçersiz veriler
                case true:
                    return false;
            }

        // verileri güncelle
        $_SESSION[SessionStruct::$session_id] = intval($data_session__id);
        $_SESSION[SessionStruct::$session_username] = strval($data_session__username);
        $_SESSION[SessionStruct::$session_name] = strval($data_session__name);
        $_SESSION[SessionStruct::$session_lastname] = strval($data_session__lastname);
        $_SESSION[SessionStruct::$session_email] = strval($data_session__email);
        $_SESSION[SessionStruct::$session_password] = strval($data_session__password);
        $_SESSION[SessionStruct::$session_memberedid] = intval($data_session__memberedid);
        $_SESSION[SessionStruct::$session_languageid] = intval($data_session__languageid);
        $_SESSION[SessionStruct::$session_verifiedid] = intval($data_session__verifiedid);
        $_SESSION[SessionStruct::$session_created] = strval($data_session__created);
        $_SESSION[SessionStruct::$session_login] = boolval(true);

        // oturum güncelleme başarılı
        return true;
    }

    public static function SessionGet() {
        return $_SESSION; // oturum verilerini döndür
    }
}
?>
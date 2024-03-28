<?php
// Oturum Güncellemeleri
define("UPDATED_NOPARAM", -1);
define("UPDATED_FAIL", 0);
define("UPDATED_NORMAL", 1); // basit güncelleme
define("UPDATED_NORESET", 2); // yenilemeye ihtiyaç yok
define("UPDATED_RESET", 3); // yenileme şart
define("UPDATED_EMAIL", 4); // email
define("UPDATED_VERIFYID", 5); // doğrulama türü
define("UPDATED_LANGUAGEID", 6); // dil
define("UPDATED_PASSWORD", 7); // şifre
define("UPDATED_MEMBERID", 8); // üyelik
define("UPDATED_USERID", 9); // kullanıcı id
define("UPDATED_USERNAME", 10); // kullanıcı adı

// CLASS
class SessionFunction {
    public static function SessionUserDataFetch(array $datas = []) : array {
        // eğer kullanıcı adı veya şifre parametresi yoksa boş dönsün direk
        if(!isset($datas[SessionStruct::$column_username]) || !isset($datas[SessionStruct::$column_password]))
            return [];

        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/verify";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağalntı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL, // url adresini tanımlatma
                CURLOPT_POST => 1, // post sorgusu için
                CURLOPT_POSTFIELDS => json_encode($PARAMS), // post veri parametreleri
                CURLOPT_RETURNTRANSFER => 1 // veri dönüşü sağlama
            ]);

            // Bağlantıyı kapat
            curl_close($CURL);

            // işlemi gerçekleştir
            $RESPONSE = ((bool)curl_exec($CURL));
        }
        catch(Exception $e) {
            $RESPONSE = false;
        } finally {
            // işlem sonunda doğrulama başarısız ise
            if(!$RESPONSE) {
                return []; // boş dizi döndür
            }
        }

        // Kullanıcı doğrulaması başarılı olduğu için işlem devam ediyor
        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/data";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağlantı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => json_encode($PARAMS),
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json; charset=UTF-8')
            ]);

            // işlemi gerçekleştir
            $DATA = curl_exec($CURL);

            // Gelen json objesini çözüyoruz
            $DATA = (array)json_decode($DATA);

            // Bağlantıyı kapat
            curl_close($CURL);
        } catch(Exception $e) {
            $DATA = [];
        } finally {
            // veri yoksa boş, varsa veriyi döndür
            return (!$DATA || count($DATA) < 1) ? ([]) : ($DATA);
        }
    }

    public static function SessionToParam(array $datas = []): array {
        // kullanıcı adı ve şifre parametresi yoksa sonlansın
        if(!isset($datas[SessionStruct::$session_username]) || !isset($datas[SessionStruct::$session_password]))
            return [];

        try {
            // kullanıcı parametreleri
            $USERPARAM = [
                "username" => $datas[SessionStruct::$session_username],
                "password" => $datas[SessionStruct::$session_password]
            ];
        } catch(Exception $e) {
            $USERPARAM = []; // kullanıcı parametresi boş
        } finally {
            return $USERPARAM; // kullanıcı parametrelerini döndür
        }
    }

    public static function SessionCheck(array $datas = []): bool {
        // kullanıcı adı ve şifre parametresi yoksa sonlansın
        if(!isset($datas[SessionStruct::$column_username]) || !isset($datas[SessionStruct::$column_password]))
            return false;

        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/verify";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağalntı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL, // url adresini tanımlatma
                CURLOPT_POST => 1, // post sorgusu için
                CURLOPT_POSTFIELDS => json_encode($PARAMS), // post veri parametreleri
                CURLOPT_RETURNTRANSFER => 1 // veri dönüşü sağlama
            ]);

            // Bağlantıyı kapat
            curl_close($CURL);

            // işlemi gerçekleştir
            $RESPONSE = ((bool)curl_exec($CURL));
        }
        catch(Exception $e) {
            $RESPONSE = false;
        } finally {
            // işlem değerini döndür
            return (bool)$RESPONSE;
        }
    }

    public static function SessionAdmin(array $datas = []) : bool {
        // kullanıcı adı ve şifre parametresi yoksa sonlansın
        if(!isset($datas[SessionStruct::$column_username]) || !isset($datas[SessionStruct::$column_password]))
            return false;

        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/verify";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağalntı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL, // url adresini tanımlatma
                CURLOPT_POST => 1, // post sorgusu için
                CURLOPT_POSTFIELDS => json_encode($PARAMS), // post veri parametreleri
                CURLOPT_RETURNTRANSFER => 1 // veri dönüşü sağlama
            ]);

            // Bağlantıyı kapat
            curl_close($CURL);

            // işlemi gerçekleştir
            $RESPONSE = ((bool)curl_exec($CURL));
        }
        catch(Exception $e) {
            $RESPONSE = false;
        } finally {
            // işlem sonunda doğrulama başarısız ise
            if(!$RESPONSE) {
                return UPDATED_FAIL;
            }
        }

        // Kullanıcı doğrulaması başarılı olduğu için işlem devam ediyor
        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/data";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağlantı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => json_encode($PARAMS),
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json; charset=UTF-8')
            ]);

            // işlemi gerçekleştir
            $DATA = curl_exec($CURL);

            // Gelen json objesini çözüyoruz
            $DATA = (array)json_decode($DATA);

            // Bağlantıyı kapat
            curl_close($CURL);
        } catch(Exception $e) {
            $DATA = [];
        } finally {
            if(!$DATA || count($DATA) < 1)
                return UPDATED_FAIL;
        }

        // Veri alımı da var ve değerleri kontrol etmeliyiz
        try {
            $ADMIN = true; // işlem devamı için

            // kontrol sonrası başarı durumu değişebilir
            switch(NULL) {
                case strval($DATA[SessionStruct::$column_username]):
                case strval($DATA[SessionStruct::$column_email]):
                case strval($DATA[SessionStruct::$column_password]):
                case strval($DATA[SessionStruct::$column_created]):
                    $ADMIN = false;
                    break;
            }

            // boş değil ama olması gerekenden küçük olanlar
            switch(false) {
                case intval($DATA[SessionStruct::$column_id]) > 0:
                case intval($DATA[SessionStruct::$column_memberedid]) > 0:
                case intval($DATA[SessionStruct::$column_languageid]) > 0:
                case intval($DATA[SessionStruct::$column_verifiedid]) >= 0:
                    $ADMIN = false;
            }

            $ADMIN = (bool)(intval($DATA[SessionStruct::$column_memberedid]) === SessionStruct::$value_session_admin);
        } catch(Exception $e) {
            $ADMIN = false; // yönetici değil başarısız
        } finally {
            // yöneticilik durumunu döndür
            return (bool)$ADMIN;
        }
    }

    public static function SessionAutoNew(): array {
        try {
            // Oluşturulan yeni oturum verilerini içeren diziyi oluştur
            $SESSIONDATA = [
                SessionStruct::$session_id => intval(0),
                SessionStruct::$session_username => strval(NULL),
                SessionStruct::$session_name => strval(NULL),
                SessionStruct::$session_lastname => strval(NULL),
                SessionStruct::$session_email => strval(NULL),
                SessionStruct::$session_password => strval(NULL),
                SessionStruct::$session_memberedid => intval(NULL),
                SessionStruct::$session_languageid => intval(1), // EN
                SessionStruct::$session_languageshortid => intval(0),// US
                SessionStruct::$session_verifiedid => intval(NULL),
                SessionStruct::$session_created => strval(NULL),
                SessionStruct::$session_login => boolval(false),
                SessionStruct::$session_time => strval(time()),
                SessionStruct::$session_status => strval(SessionStruct::$data_session_status_success),
                SessionStruct::$session_token => strval("token-nan")
            ];
        } catch(Exception $e) {
            $SESSIONDATA = []; // hata var, boş yap diziyi
        } finally {
            // diziyi döndür
            return $SESSIONDATA;
        }
    }

    // Var olan kullanıcı bilgisini sadece oturum bilgisi haline çevirme
    public static function SessionOnlySessionConvert(array $datas): array {
        return []; // var olan kullanıcı bilgielrini oturuma döndürecek
    }

    // Oturum bilgilerini kullanıcı bilgileri haline döndürecek
    public static function SessionOnlyUserConvert(array $datas): array {
        return []; // var olan oturum bilgisini sade kulalnıcı bilgisine döndürecek
    }

    // Normal kullanıcı bilgisi alınıp oturum bilgisine dönüştürülecek
    public static function SessionUserToSessionConvert(array $datas = []): array {
        // kullanıcı adı ve şifre parametresi yoksa sonlansın
        if(!isset($datas[SessionStruct::$column_username]) || !isset($datas[SessionStruct::$column_password]))
            return [];

        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/verify";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağalntı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL, // url adresini tanımlatma
                CURLOPT_POST => 1, // post sorgusu için
                CURLOPT_POSTFIELDS => json_encode($PARAMS), // post veri parametreleri
                CURLOPT_RETURNTRANSFER => 1 // veri dönüşü sağlama
            ]);

            // Bağlantıyı kapat
            curl_close($CURL);

            // işlemi gerçekleştir
            $RESPONSE = ((bool)curl_exec($CURL));
        }
        catch(Exception $e) {
            $RESPONSE = false;
        } finally {
            // işlem sonunda doğrulama başarısız ise
            if(!$RESPONSE) {
                return [];
            }
        }

        // Kullanıcı doğrulaması başarılı olduğu için işlem devam ediyor
        try {
            // Bağlantı yapılacak url adresi
            $URL = "http://main.server.com/api/users/data";

            // Parametreler
            $PARAMS = $datas;

            // curl bağlantısı başlatma
            $CURL = curl_init();

            // bağlantı ayarları
            curl_setopt_array($CURL, [
                CURLOPT_URL => $URL,
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => json_encode($PARAMS),
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json; charset=UTF-8')
            ]);

            // işlemi gerçekleştir
            $RUN = curl_exec($CURL);

            // Gelen json objesini çözüyoruz
            $DATA = (array)json_decode($RUN);

            // Bağlantıyı kapat
            curl_close($CURL);
        } catch(Exception $e) {
            $DATA = [];
        } finally {
            if(count($DATA) < 1)
                return [];
        }

        // Veri alımı da var ve değerleri kontrol etmeliyiz
        try {
            $CONTINUE = true; // işlem devamı için

            // kontrol sonrası başarı durumu değişebilir
            switch(NULL) {
                case strval($DATA[SessionStruct::$column_username]):
                case strval($DATA[SessionStruct::$column_email]):
                case strval($DATA[SessionStruct::$column_password]):
                case strval($DATA[SessionStruct::$column_created]):
                    $CONTINUE = false;
                    break;
            }

            // boş değil ama olması gerekenden küçük olanlar
            switch(false) {
                case (bool)(intval($DATA[SessionStruct::$column_id]) >= 1):
                case (bool)(intval($DATA[SessionStruct::$column_memberedid]) >= 0):
                case (bool)(intval($DATA[SessionStruct::$column_languageid]) >= 1):
                case (bool)(intval($DATA[SessionStruct::$column_verifiedid]) >= 0):
                    $CONTINUE = false;
                    break;
            }
        } catch(Exception $e) {
            $CONTINUE = false; // işem başarısız
        } finally {
            // başarısız ise işlem sonlansın
            if(!$CONTINUE)
                return [];
        }

        // Veriler ve işlemler doğru, oturuma kaydedilmesi gereken şekilde getir
        try {
            $SESSIONDATA = [
                SessionStruct::$session_id => intval($DATA[SessionStruct::$column_id]),
                SessionStruct::$session_username => strval($DATA[SessionStruct::$column_username]),
                SessionStruct::$session_name => strval($DATA[SessionStruct::$column_name]),
                SessionStruct::$session_lastname => strval($DATA[SessionStruct::$column_lastname]),
                SessionStruct::$session_email => strval($DATA[SessionStruct::$column_email]),
                SessionStruct::$session_password => strval($DATA[SessionStruct::$column_password]),
                SessionStruct::$session_memberedid => intval($DATA[SessionStruct::$column_memberedid]),
                SessionStruct::$session_languageid => intval($DATA[SessionStruct::$column_languageid]),
                SessionStruct::$session_verifiedid => intval($DATA[SessionStruct::$column_verifiedid]),
                SessionStruct::$session_created => strval($DATA[SessionStruct::$column_created]),
                SessionStruct::$session_login => boolval(true),
                SessionStruct::$session_time => strval(date('Y-m-d-H-i-s')),
                SessionStruct::$session_status => strval(SessionStruct::$data_session_status_success),
                SessionStruct::$session_token => strval("token-enabled")
            ];
        } catch(Exception $e) {
            $SESSIONDATA = []; // boş
        } finally {
            return $SESSIONDATA; // diziyi döndür
        }
    }

    // Oturumda yapılan işlem sonucu değişenleri dizi içinde döndürecek
    public static function SessionDataChanged(array $sessiondatas, array $userdatas): array {
        return [];
    }
        /*try {
            // başlangıç olarak türü normal yenileme
            $UPDATETYPE = UPDATED_NORMAL;

            // Email, dil veya doğrulama değeri güncellenmişse yenilemeye gerek yok
            switch(true) {
                case boolval(strval($_SESSION[SessionStruct::$session_email]) != strval($DATA[SessionStruct::$column_email])):
                    $UPDATETYPE = UPDATED_EMAIL;
                    break;
                case boolval(intval($_SESSION[SessionStruct::$session_verifiedid]) != intval($DATA[SessionStruct::$column_verifiedid])):
                    $UPDATETYPE = UPDATED_VERIFYID;
                    break;
                case boolval(intval($_SESSION[SessionStruct::$session_languageid]) != intval($DATA[SessionStruct::$column_languageid])):
                    $UPDATETYPE = UPDATED_LANGUAGEID;
                    break;
            }

            // Eğer id, kullanıcı adı, şifre veya üyelik bilgisi değişmiş ise sayfa yenileme şart
            switch(true) {
                case boolval(intval($_SESSION[SessionStruct::$session_id]) != intval($DATA[SessionStruct::$column_id])):
                    $UPDATETYPE = UPDATED_USERID;
                    break;
                case boolval(strval($_SESSION[SessionStruct::$session_username]) != strval($DATA[SessionStruct::$column_username])):
                    $UPDATETYPE = UPDATED_USERNAME;
                    break;
                case boolval(intval($_SESSION[SessionStruct::$session_password]) != intval($DATA[SessionStruct::$column_password])):
                    $UPDATETYPE = UPDATED_PASSWORD;
                    break;
                case boolval(intval($_SESSION[SessionStruct::$session_memberedid]) != intval($DATA[SessionStruct::$column_memberedid])):
                    $UPDATETYPE = UPDATED_MEMBERID;
                    break;
            }

            // Oturum verilerini bir dizi de depolama

            $_SESSION[SessionStruct::$session_id] = $DATA[SessionStruct::$column_id];
            $_SESSION[SessionStruct::$session_username] = $DATA[SessionStruct::$column_username];
            $_SESSION[SessionStruct::$session_name] = $DATA[SessionStruct::$column_name];
            $_SESSION[SessionStruct::$session_lastname] = $DATA[SessionStruct::$column_lastname];
            $_SESSION[SessionStruct::$session_email] = $DATA[SessionStruct::$column_email];
            $_SESSION[SessionStruct::$session_password] = $DATA[SessionStruct::$column_password];
            $_SESSION[SessionStruct::$session_memberedid] = $DATA[SessionStruct::$column_memberedid];
            $_SESSION[SessionStruct::$session_languageid] = $DATA[SessionStruct::$column_languageid];
            $_SESSION[SessionStruct::$session_languageshortid] = intval(0);
            $_SESSION[SessionStruct::$session_verifiedid] = $DATA[SessionStruct::$column_verifiedid];
            $_SESSION[SessionStruct::$session_login] = boolval(true);
            $_SESSION[SessionStruct::$session_time] = strval(date('Y-m-d-H-i-s'));
            $_SESSION[SessionStruct::$session_status] = strval(SessionStruct::$data_session_status_success);
            $_SESSION[SessionStruct::$session_token] = "token-enable";

            // eğer oturum oluşturması hiç yoksa yeni oluştursun varsa da değiştirmesin
            if($_SESSION[SessionStruct::$session_created] == NULL)
                $_SESSION[SessionStruct::$session_created] = date('Y-m-d-H-i-s');
            // eğer yeni veri eskisinden farklı ise
        } catch(Exception $e) {
            $UPDATETYPE = UPDATED_FAIL; // güncellenemedi
        } finally {
            return $UPDATETYPE;
        }*/
}
?>
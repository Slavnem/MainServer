<?php
class UsersGateway {
    private PDO $connection; // veritabanı bağalntısı için obje
    
    
    public function __construct(Database $database) {
        // Veritabanına bağalntı sağlama
        $this->connection = $database->getConnection();
    }

    // Verileri eşleşen kullanıcıyı getirtme
    public function GetPwdByUsername(string $username): string {
        // sorgu
        $sql = UsersStruct::$procedure0;

        // sorgu bağlantısı, parametre vermesi ve çalıştırması
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();

        // hiç veri bulunmadıysa
        if($stmt->rowCount() < 1)
            return "";

        // kullanıcı uyuştu, sadece şifrenin olduğu sütunu al
        try {
            // şifreyi döndürsün
            return $stmt->fetchAll(PDO::FETCH_ASSOC)[0][UsersStruct::$column_password];
        } catch(Exception $e) {
            return ""; // hata oluştu boş dönsün
        }
    }

    public function GetUser(string $username, string $password): array {
        try {
            $hashpassword = $this->GetPwdByUsername($username);

            // hashli şifre alınamadı, kullanıcı yok
            if(!$hashpassword)
                return [];

            // şifreler uyuşmadı
            if(!password_verify($password, $hashpassword))
                return [];

            // sorgu
            $sql = UsersStruct::$procedure0;

            // sorgu bağlantısı, parametre vermesi ve çalıştırması
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->execute();

            // hiç veri bulunmadıysa
            if($stmt->rowCount() < 1)
                return [];

            // kullanıcı uyuştu, verileri al
            try {
                // verileri döndürsün
                return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
            } catch(Exception $e) {
                return []; // hata oluştu boş dönsün
            }
        } catch(Exception $e) {
            return [];
        }
    }
}
?>
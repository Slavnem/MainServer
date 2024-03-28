<?php
// Http Methodlar
define("MGET", "GET");
define("MPOST", "POST");
define("MPATCH", "PATCH");
define("MDELETE", "DELETE");

class UsersController {
    public function __construct(private UsersGateway $gateway) {}

    public function UserVerify(string $username, string $password): bool {
        $hashpassword = $this->gateway->GetPwdByUsername($username);
        
        // Kullanıcı şifresi alınamadı
        if(!$hashpassword || $hashpassword == null)
            return false;

        // Kullanıcı şifresi uyum kontrolü
        return password_verify($password, $hashpassword);
    }

    public function UserData(string $username, string $password): array {
        try {
            $getuser = $this->gateway->GetUser($username, $password);

            switch($getuser) {
                case true: // kullanıcı eşleşti
                    $userfetch = $getuser;
                    break;
                default: // kullanıcı eşleşmedi
                    $userfetch = [];
                    break;
            }
        } catch(Exception $e) {
            $userfetch = [];
        } finally {
            return $userfetch;
        }
    }
}
?>
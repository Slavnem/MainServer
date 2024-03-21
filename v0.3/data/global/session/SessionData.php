<?php
// OTURUM VERİSİ FONKSİYONLARI SINIFI
class SessionData {
    public static function SessionUser() {
        echo json_encode($_SESSION); // oturum verisini döndür
    }
}
?>
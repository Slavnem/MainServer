<?php
class SessionStruct {
    // Veritabanı tablosu
    public static string $column_id = "id";
    public static string $column_username = "username";
    public static string $column_name = "name";
    public static string $column_lastname = "lastname";

    public static string $column_email = "email";
    public static string $column_password = "password";
    public static string $column_memberedid = "memberedid";
    public static string $column_languageid = "languageid";
    public static string $column_verifiedid = "verifiedid";
    public static string $column_created = "created";


    // Oturum verileri
    public static string $data_session_status_success = "active";
    public static string $data_session_status_fail = "fail";

    // Oturum değişkenleri
    public static int $value_session_admin = 99;
    public static int $value_session_moderator = 98;

    public static string $session_id = "session_id";
    public static string $session_username = "session_username";
    public static string $session_name = "session_name";
    public static string $session_lastname = "session_lastname";
    public static string $session_email = "session_email";
    public static string $session_password = "session_password";
    public static string $session_memberedid = "session_memberedid";
    public static string $session_languageid = "session_languageid";
    public static string $session_languageshortid = "session_languageshortid";
    public static string $session_verifiedid = "session_verifiedid";
    public static string $session_created = "session_created";
    public static string $session_login = "session_login";
    public static string $session_time = "session_time";
    public static string $session_status = "session_status";
    public static string $session_token = "session_token";
}
?>
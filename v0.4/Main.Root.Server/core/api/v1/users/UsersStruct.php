<?php
class UsersStruct {
    public static string $procedure0 = "CALL ProcGetByUsername_v1(?, \"verify\")";
    public static string $procedure1 = "CALL ProcGetUser_v1(?, ?, ?, ?, ?, ?, ?)";

    public static $column_username = "username";
    public static $column_email = "email";
    public static $column_password = "password";
}
?>
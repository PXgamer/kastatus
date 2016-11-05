<?php
namespace funcs;

class Functions
{
    private static $conn;

    public static function conn()
    {
        /* MySQL VARIABLES */
        $db_serv = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'kat_status';

        if (!self::$conn) {
            self::$conn = mysqli_connect($db_serv, $db_user, $db_pass, $db_name);
        }

        return self::$conn;
    }

    public static function query($db_conn, $sql)
    {
        return mysqli_query($db_conn, $sql);
    }
    public static function execute_stmt($stmt)
    {
        return mysqli_stmt_execute($stmt);
    }
    public static function escape_string($string)
    {
        return mysqli_real_escape_string(self::conn(), $string);
    }
}

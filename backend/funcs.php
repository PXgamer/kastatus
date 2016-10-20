<?php
namespace funcs;

class Functions
{
    public static function conn()
    {
        /* MySQL VARIABLES */
            $db_serv = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'kat_status';

        return mysqli_connect($db_serv, $db_user, $db_pass, $db_name);
    }

    public static function query($db_conn, $sql)
    {
        return mysqli_query($db_conn, $sql);
    }
}

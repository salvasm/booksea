<?php

namespace booksea\utils;

/**
 * Class PDOConnection
 *
 * @package booksea\utils
 * @author Salvador Sánchez Méndez
 *
 */
class PDOConnection
{
    private static $dbhost = "localhost";
    private static $dbname = "booksea";
    private static $dbuser = "root";
    private static $dbpass = "";
    private static $db_singleton = null;
    public static function getConnection()
    {
        if (self::$db_singleton == null) {
            self::$db_singleton = new \PDO ("mysql:host=" . self::$dbhost . ";dbname=" . self::$dbname . ";charset=utf8", // connection string
                self::$dbuser, self::$dbpass, array(
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ));
        }
        return self::$db_singleton;
    }
}

?>
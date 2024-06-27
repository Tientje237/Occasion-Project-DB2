<?php
namespace Occasion;
class Db
{

    public static $db;

    public function __construct()
    {
        self::$db = new MySql("localhost", "occasiondatabase", "root", "");
    }

}

?>

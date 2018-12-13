<?php

namespace Base;

use PDO;
use Config\Db;

/**
 * Class Base\Model
 */
abstract class Model
{
    /**
     * Set the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . Db::DB_HOST . ';dbname=' . Db::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, Db::DB_USER, Db::DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}

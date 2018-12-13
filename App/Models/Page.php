<?php

namespace App\Models;

use Base\Model;
use PDO;

/**
 * Class App\Models\Page
 */
class Page extends Model
{
    /**
     * Get page metadata
     *
     * @param $name
     * @return mixed
     */
    public static function getMetaData($name)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT title, description FROM pages WHERE class_name = ?');
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

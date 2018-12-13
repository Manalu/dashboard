<?php

namespace App\Models;

use Base\Model;
use PDO;

/**
 * Class App\Models\Order
 */
class Order extends Model
{
    /**
     * Get array of all orders
     *
     * @param $params
     * @return array
     */
    public static function getAll($params)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT o.id, o.device, o.date, c.id, country, c.first_name, sum(oi.price * oi.quantity) total, count(oi.id) items, sum(oi.quantity) quantity, group_concat(oi.EAN) ean
            FROM orders o
               LEFT JOIN order_items oi on o.id = oi.order_id
               LEFT JOIN customers c on o.customer_id = c.id
            WHERE EXTRACT(MONTH FROM date) BETWEEN ? AND ?
            GROUP BY o.id');
        $stmt->execute([$params['from'], $params['to']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

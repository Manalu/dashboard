<?php

namespace App\Models;

use Base\Model;
use PDO;

/**
 * Class App\Models\Revenue
 */
class Revenue extends Model
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
        $stmt = $db->prepare('SELECT sum(oi.price * oi.quantity) total,
               count(oi.id)            items,
               count(distinct country) country,
               count(distinct device)  device,
               count(distinct c.id)    customers,
               count(distinct o.id)    orders
        FROM orders o
               LEFT JOIN order_items oi on o.id = oi.order_id
               LEFT JOIN customers c on o.customer_id = c.id
        WHERE EXTRACT(MONTH FROM date) = ?');
        $stmt->execute([$params['month']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get array of data for the chart
     *
     * @param $params
     * @return mixed
     */
    public static function getChartData($params)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT EXTRACT(DAY FROM date) day, sum(price) total
            FROM orders o
                   LEFT JOIN order_items oi on o.id = oi.order_id
            WHERE EXTRACT(MONTH FROM date) = ?
            GROUP BY day');
        $stmt->execute([$params['month']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

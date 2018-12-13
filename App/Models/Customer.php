<?php

namespace App\Models;

use Base\Model;
use PDO;

/**
 * Class App\Models\Customer
 */
class Customer extends Model
{
    /**
     * Get array of all customers
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT first_name,
           last_name,
           email,
           (SELECT count(*) FROM orders o WHERE o.customer_id = c.id) orders,
           (SELECT sum(oi.price * oi.quantity) total FROM orders o LEFT JOIN order_items oi ON o.id = oi.order_id WHERE o.customer_id = c.id) total
          FROM customers c');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

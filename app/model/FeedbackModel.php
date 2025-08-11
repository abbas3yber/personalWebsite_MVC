<?php

namespace App\model;

use Core\Model;

class FeedbackModel extends Model
{
    protected static $table = "feedback";

    public static function countAll()
    {
        if (!self::$db) {
            self::connect();
        }
        $sql = "SELECT COUNT(*) as total FROM " . static::$table;
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()["total"];
    }
}

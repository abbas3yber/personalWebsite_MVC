<?php

namespace App\Model;

use Core\Model;

class BlogComment extends Model
{
    protected static $table = "comments";

    public static function selectWhere($column, $value)
    {
        if (!self::$db) {
            self::connect();
        }

        $query = self::$db->prepare("SELECT * FROM " . static::$table . " WHERE $column = ? ORDER BY created_at DESC");
        $query->execute([$value]);

        return $query->fetchAll();
    }
}

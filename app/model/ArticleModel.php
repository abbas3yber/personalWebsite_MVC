<?php

namespace App\Model;

use Core\Model;

class ArticleModel extends Model
{
    protected static $table = "blog";

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

    public static function rawQuery($sql)
    {
        if (!self::$db) {
            self::connect();
        }
        $stmt = self::$db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getLatestArticles($limit = 3)
    {
        if (!self::$db) {
            self::connect();
        }

        $limit = (int) $limit; // اطمینان از عددی بودن
        $sql = "SELECT * FROM " . static::$table . " ORDER BY id DESC LIMIT $limit";

        // استفاده از query به جای prepare
        $stmt = self::$db->query($sql);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

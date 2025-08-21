<?php

namespace App\Model;

use Core\Model;

class CoursesModel extends Model
{

    protected static $table = "Course";

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

    public static function getCourseById($id)
    {
        if (!static::$db) {
            static::connect();
        }
        $stmt = static::$db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}

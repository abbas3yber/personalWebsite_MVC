<?php 

namespace App\Model;

use Core\Model;

class UsersModel extends Model {

    protected static $table = "admin";

    public static function countAll() {
    if (!self::$db) {
        self::connect();
    }
    $sql = "SELECT COUNT(*) as total FROM " . static::$table;
    $stmt = self::$db->prepare($sql);
    $stmt->execute();
    return $stmt->fetch()["total"];
}
}


?>
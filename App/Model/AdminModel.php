<?php

namespace App\model;

use Core\Model;

class AdminModel extends Model
{

    protected static $table = "admin";

    public static function find_by_email($email)
    {
        if (!self::$db) {
            self::connect();
        }
        $query = self::$db->prepare("SELECT * FROM " . static::$table . " WHERE email=?");
        $query->execute([$email]);
        return $query->fetch();
    }

    public static function getLoggedInUsername()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return $_SESSION['MyAdminAuth']['name'] ?? null;
    }
}

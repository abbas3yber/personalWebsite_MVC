<?php 

namespace Core ;

use PDO;
use PDOException;

class Model {

    protected static $table;
    protected static $db;

    protected static function connect()
    {
        try {
            self::$db = new PDO("mysql:host=localhost;dbname=personal_db;charset=utf8;", "root", "");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public static function select($columns = [])
    {
        if (!self::$db) {
            self::connect();
        }
        if ($columns) {
            $query = self::$db->query("SELECT " . implode(", ", $columns) . " FROM " . static::$table);
        } else {
            $query = self::$db->query("SELECT * FROM " . static::$table);
        }
        return $query->fetchAll();
    }
    public static function find($id)
    {
        if (!self::$db) {
            self::connect();
        }
        $query = self::$db->prepare("SELECT * FROM " . static::$table . " WHERE id=?");
        $query->execute([$id]);
        return $query->fetch();
    }
    public static function insert($data)
    {
        if (!self::$db) {
            self::connect();
        }
        for ($i = 0; $i < count($data); $i++) {
            $q[] = "?";
        }
        $query = self::$db->prepare("INSERT INTO " . static::$table . " (" . implode(", ", array_keys($data)) . ") VALUES (" . implode(", ", $q) . ")");
        return $query->execute(array_values($data));
    }

    public static function update($id, $data)
{
    if (!self::$db) {
        self::connect();
    }

    $columns = [];
    foreach ($data as $key => $value) {
        $columns[] = "$key=?";
    }

    $sql = "UPDATE " . static::$table . " SET " . implode(", ", $columns) . " WHERE id=?";
    $query = self::$db->prepare($sql);

    $values = array_values($data);
    $values[] = $id;

    return $query->execute($values);
}

    public static function delete($id)
    {
        if (!self::$db) {
            self::connect();
        }
        $query = self::$db->prepare("DELETE FROM " . static::$table . " WHERE id=?");
        return $query->execute([$id]);
    }
    
}



?>
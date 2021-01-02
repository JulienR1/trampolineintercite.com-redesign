<?php

class DatabaseHandler
{
    public static $dbName = "trampolineintercite";
    public static $server = "localhost";
    public static $user = "root";
    public static $password = "Julien_SqlDEV";

    private static function connect()
    {
        $conn = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$dbName, self::$user, self::$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public static function query($sql, ...$params)
    {
        if ($params != null) {
            return self::queryStmt($sql, $params);
        } else {
            return self::queryNoStmt($sql);
        }
    }

    public static function querySP($sql, $returnValue, ...$params)
    {
        $conn = self::connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $output = $conn->query("SELECT " . $returnValue);
        return $output->fetch();
    }

    private static function queryStmt($sql, $params)
    {
        $conn = self::connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            if (explode(" ", $sql)[0] == "SELECT") {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return null;
    }

    private static function queryNoStmt($sql)
    {
        $conn = self::connect();
        $dataTable = $conn->query($sql);

        $data = "";
        if ($dataTable->rowCount() > 0) {
            if (explode(" ", $sql)[0] == "SELECT") {
                return $dataTable->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return null;
    }
}
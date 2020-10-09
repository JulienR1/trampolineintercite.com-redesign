<?php

class DatabaseHandler
{
    public static $dbName = "trampolineintercite";
    public static $server = "localhost";
    public static $user = "root";
    public static $password = "Julien_SqlDEV";

    private static function connect()
    {
        $conn = new mysqli(self::$server, self::$user, self::$password, self::$dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function query($sql, $types = "", ...$params)
    {
        if ($params != null) {
            return self::queryStmt($sql, $types, $params);
        } else {
            return self::queryNoStmt($sql);
        }
    }

    private static function queryStmt($sql, $types, $params)
    {
        $conn = self::connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();

        $data = null;
        if ($stmt->num_rows > 0) {
            if (explode(" ", $sql)[0] == "SELECT") {
                $data = $stmt->fetchAll();
                $stmt->close();
            }
        }
        $conn->close();
        return $data;
    }

    private static function queryNoStmt($sql)
    {
        $conn = self::connect();
        $dataTable = $conn->query($sql);

        $data = "";
        if ($dataTable->num_rows > 0) {
            if (explode(" ", $sql)[0] == "SELECT") {
                $data = $dataTable->fetch_all();
            }
        }
        $conn->close();
        return $data;
    }
}
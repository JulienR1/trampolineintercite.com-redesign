<?php

class DatabaseHandler
{
    public static $dbName;
    public static $server = "localhost";
    public static $user = "root";
    public static $password = "Julien_SqlDEV";

    private static function connect()
    {
        $conn = new mysqli($server, $user, $password, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function query($query, $types = "", ...$params)
    {
        $stmt = connect()->prepare($query);
        if ($params != null) {
            $stmt->bind_param($types, $params);
        }
        $stmt->execute();

        $data = null;
        if (explode(" ", $query)[0] == "SELECT") {
            $data = $stmt->fetchAll();
        }

        $stmt->close();
        $conn->close();

        return $data;
    }
}
<?php

    // CREDENTIALS
    $databaseHost = "localhost";
    $username = "root";
    $password = "";    
    $database = "test";

    $connection = NULL;

    function connect(){
        global $databaseHost, $username, $password, $database, $connection;
        $connection = new mysqli($databaseHost, $username, $password, $database);
        if($connection->connect_error){
            $connection = NULL;
        }
    }

    function executeQuery($sql){
        global $connection;
        connect();
        if($connection === NULL)
            return NULL;
            
        $result = $connection->query($sql);
        if($result->num_rows === 0)
            $result = NULL;

        disconnect();

        return $result;
    }

    function disconnect(){
        global $connection;
        $connection->close();
    }

?>
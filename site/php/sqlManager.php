<?php
    $connection = NULL;

    function connect(){
        global $connection;
        $connection = new mysqli("localhost", "root", "Julien_SqlDEV", "trampolineintercite");
        if($connection->connect_error){
            echo "Failed to connect to database";
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

    function executeQueryToArray($sql){
        $data = executeQuery($sql);
        if($data == NULL)
            return $data;

        $dataArray = array();
        while($row = $data->fetch_assoc()){
            array_push($dataArray, $row);
        }
        return $dataArray;
    }

    function disconnect(){
        global $connection;
        $connection->close();
    }

?>
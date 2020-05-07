<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'php/sqlManager.php';
        $data = executeQuery("SELECT * FROM test_table");
        if($data != NULL){
            while($row = $data->fetch_assoc()){
                echo $row["ID"]."<br>";
            }
        }
    ?>
</body>
</html>
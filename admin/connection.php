<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "happyproject";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if($connection->connect_error){
        die("Connection Failed".$connection->connect_error);
    }

    function sql_sum($query, $column,$connection){
        $result = mysqli_query($connection, $query);
        $rows = mysqli_fetch_assoc($result);
        $sum = $rows['sum('.$column.')'];
        return $sum;
    }
    function sql_count($query, $column,$connection){
        $result = mysqli_query($connection, $query);
        $rows = mysqli_fetch_assoc($result);
        $sum = $rows['count('.$column.')'];
        return $sum;
    }
?>
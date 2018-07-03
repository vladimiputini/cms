<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 25/06/18
 * Time: 22:21
 */

function db(){
    $servername = "localhost";
    $dbname = "cms";
    $username = "root";
    $password = "root";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }


//echo "Connected successfully";


    $conn = null;
}
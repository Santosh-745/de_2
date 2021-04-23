<?php
    // define('DB_SERVER','localhost');
    // define('DB_USERNAME','root');
    // define('DB_PASSWORD','');
    // define('DB_NAME','home_data');

    // $connect = mysqli_connect(DB_SERVER, DB_USERNAME ,DB_PASSWORD , DB_NAME);

    // if(!$connect)
    // {
    //     dir('Error : Cannot connect');
    // }
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "de_sem_6";
    
    try {
        $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    } catch (PDOException $e) {
        header('location: index.php');
        die();
    }
?>
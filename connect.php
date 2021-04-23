<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'de_sem_6';
$dsn = '';

try{
    $dsn = 'mysql:host='.$host. ';dbname='.$dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'Connection Failed: '.$e->getMessage();
}

?>
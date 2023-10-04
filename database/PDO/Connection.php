<?php

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

$server=$_ENV['DB_HOST'];
$username=$_ENV['DB_USERNAME'];
$password=$_ENV['DB_PASSWORD'];
$database=$_ENV['DB_NAME'];
try{
    $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $setnames = $conn->prepare("SET NAMES utf8");
    $setnames->execute();
    var_dump($setnames);
}
catch(PDOException $e){
    die("Error: " . $e->getMessage());
} 
finally{
    $conn = NULL;
}
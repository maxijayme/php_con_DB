<?php

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

$server=$_ENV['DB_HOST'];
$username=$_ENV['DB_USERNAME'];
$password=$_ENV['DB_PASSWORD'];
$database=$_ENV['DB_NAME'];

// $mysqli=mysqli_connect($server,$username,$password,$database);

// if (!$mysqli) {
//     die('Could not connect: '. mysqli_connect_error());
// }

$mysqli = new mysqli($server, $username, $password, $database);

if ($mysqli->connect_errno) {
    die('Could not connect: '. $mysqli->connect_error);
}

$setnames = $mysqli->prepare("SET NAMES utf8");
var_dump($setnames);
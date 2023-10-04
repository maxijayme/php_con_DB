<?php

namespace Databse\PDO;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();


class Connection{
    private static $instance;
    private $connection;
    private function __construct(){
        $this->make_connection();
        $this->set_character($this->connection);
        $this->check_connection($this->connection);
    }

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
   
    private function make_connection(){
        $server=$_ENV['DB_HOST'];
        $username=$_ENV['DB_USERNAME'];
        $password=$_ENV['DB_PASSWORD'];
        $database=$_ENV['DB_NAME'];
        try{
            $conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);
            $this->connection = $conn;
        }
        catch(PDOException $e){
            die("Error: " . $e->getMessage());
        } 
        finally{
            $conn = NULL;
        }
    }

    private function set_character($connection){
        $setnames = $connection->prepare("SET NAMES utf8");
        $setnames->execute();
    }

    private function check_connection($connection){
        if($connection->connect_errno)
            die("Hubo un problema: {$connection->connect_error}");
    }
    
    public function getConnection(){
        return $this->connection;
    }
}
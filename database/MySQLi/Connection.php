<?php





// $mysqli=mysqli_connect($server,$username,$password,$database);

// if (!$mysqli) {
//     die('Could not connect: '. mysqli_connect_error());
// }

// $mysqli = new mysqli($server, $username, $password, $database);

// if ($mysqli->connect_errno) {
//     die('Could not connect: '. $mysqli->connect_error);
// }

// $setnames = $mysqli->prepare("SET NAMES utf8");
// var_dump($setnames);

namespace Database\MySQLi;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

class Connection {

    private static $instance;
    private $connection;

    private function __construct() {
        $this->make_connection();
    }

    public static function getInstance() {

        if(!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;

    }

    public function get_database_instance() {
        return $this->connection;
    }

    private function make_connection() {
        $server=$_ENV['DB_HOST'];
        $username=$_ENV['DB_USERNAME'];
        $password=$_ENV['DB_PASSWORD'];
        $database=$_ENV['DB_NAME'];
        
        // Esta es al forma orientada a objetos
        $mysqli = new \mysqli($server, $username, $password, $database);
        
        // Comprobar conexión de manera orientada a objetos
        if ($mysqli->connect_errno)
            die("Falló la conexión: {$mysqli->connect_error}");
        
        // Esto nos ayuda a poder usar cualquier caracter en nuestras consultas
        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli;
        
    }
    
}

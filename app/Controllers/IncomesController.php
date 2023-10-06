<?php

namespace App\Controllers;

use Database\MySQLi\Connection as MySQLiConnection;
use Database\PDO\Connection as PDOConnection;

class IncomesController{

    private $connectionMySQLi;
    private $connectionPDO;

    public $date;
    public function __construct(){
        $this->connectionMySQLi = MySQLiConnection::getInstance()->get_database_instance();
        $this->connectionPDO = PDOConnection::getInstance()->getConnection();
    }

    public function index(){
        $stmt = $this->connectionPDO->prepare("SELECT * FROM incomes");
        $stmt->execute();
        $amount=0;
        $description="";

        $stmt->bindColumn('amount', $amount);
        $stmt->bindColumn('description', $description);

        // while ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
        // {
        //     var_dump($row);
        // }

        while ($row = $stmt->fetch())
        {
            echo("Han ingresado $amount EUR en conecpto de $description. \n");
        }
    }
    public function update(){}
    public function destroy(){}
    public function create(){}
    public function store($data){
        $stmt= $this->connectionMySQLi->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (?,?,?,?,?)");
        $stmt->bind_param("iisds", $data['payment_method'], $data['type'], $data['date'], $data['amount'], $data['description']);
        $stmt->execute();
    }
    public function edit(){}
}
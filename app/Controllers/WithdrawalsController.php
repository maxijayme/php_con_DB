<?php

namespace App\Controllers;

use Database\PDO\Connection;

class WithdrawalsController{

    private $connection;

    public function __construct(){
        $this->connection = Connection::getInstance()->getConnection();
    }

    public function index(){
        $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $result)
            var_dump($result);

        // Esto es usanfo Fetch Column

        /* $stmt = $this->connection->prepare("SELECT amount, description FROM withdrawals");
        $stmt->execute();

        $results = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);

        foreach($results as $result)
            echo "Gastaste $result USD \n"; */
        
    }
    public function update(){}
    public function destroy(){}
    public function create(){}
    public function store($data){
        $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) VALUES (
            :payment_method,
            :type,
            :date,
            :amount,
            :description)");
        $stmt->bindParam(":payment_method", $data['payment_method']);
        $stmt->bindParam(":type", $data['type']);
        $stmt->bindParam(":date", $data['date']);
        $stmt->bindParam(":amount", $data['amount']);
        $stmt->bindParam(":description", $data['description']);
        $stmt->execute();
    }
    public function edit(){}
}
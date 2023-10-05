<?php

namespace App\Controllers;

use Database\PDO\Connection;

class WithdrawalsController{
    public function index(){}
    public function update(){}
    public function destroy(){}
    public function create(){}
    public function store($data){
        $connection = Connection::getInstance()->getConnection();
        $stmt = $connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) VALUES (
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
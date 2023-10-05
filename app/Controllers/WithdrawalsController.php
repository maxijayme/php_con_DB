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
        $stmt->execute($data);
    }
    public function edit(){}
}
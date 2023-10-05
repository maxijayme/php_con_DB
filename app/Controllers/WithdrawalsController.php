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
        $connection->exec("INSERT INTO withdrawals (payment_method, type, date, amount, description) VALUES (
            $data[payment_method],
            $data[type],
            '$data[date]',
            $data[amount],
            '$data[description]'
        )");
    }
    public function edit(){}
}
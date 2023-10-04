<?php

namespace App\Controllers;

use Database\MySQLi\Connection;

class IncomesController{
    public function index(){}
    public function update(){}
    public function destroy(){}
    public function create(){}
    public function store($data){
        $connection = Connection::getInstance()->get_database_instance();
        $connection->query("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (
            {$data['payment_method']}, 
            {$data['type']}, 
           ' {$data['date']}',
            {$data['amount']},
            '{$data['description']}')
            ");
    }
    public function edit(){}
}
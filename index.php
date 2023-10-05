<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enums\IncomeTypeEnums;
use App\Enums\PayMethodTypeEnums;
use App\Enums\WithdrawalTypeEnums;

require("vendor/autoload.php");

/* 
$incomes_controller = new IncomesController();
$incomes_controller->store([
    "payment_method" => PayMethodTypeEnums::BankAccount->value,
    "type" => IncomeTypeEnums::Salary->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 1000,
    "description" => "Pago de mi salario"
]);
*/

$withdrawal_controller = new WithdrawalsController();
$withdrawal_controller->store([
    ":payment_method" => PayMethodTypeEnums::CreditCard->value,
    ":type" => WithdrawalTypeEnums::Purchase->value,
    ":date" => date("Y-m-d H:i:s"),
    ":amount" => 346,
    ":description" => "Compra de PS5"
]);

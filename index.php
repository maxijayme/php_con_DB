<?php

use App\Controllers\IncomesController;
use App\Enums\IncomeTypeEnums;
use App\Enums\PayMethodTypeEnums;

require("vendor/autoload.php");

$incomes_controller = new IncomesController();
$incomes_controller->store([
    "payment_method" => PayMethodTypeEnums::BankAccount->value,
    "type" => IncomeTypeEnums::Salary->value,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 1000,
    "description" => "Pago de mi salario"
]);
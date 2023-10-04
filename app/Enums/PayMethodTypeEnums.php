<?php
namespace App\Enums;

enum PayMethodTypeEnums:int {
    case CreditCard = 1;
    case BankAccount = 2;
}
<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case CUSTOMER = 'customer';
    case STAFF = 'staff';
    case ADMIN = 'admin';
}
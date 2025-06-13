<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\CustomerAddress; // Ensure the CustomerAddress class exists in this namespace

class Customer extends Authenticatable
{
    protected $fillable = ['customerName', 'email', 'password'];
    protected $table = 'customer'; 
    protected $primaryKey = 'customerNumber'; // Khóa chính đúng của bảng

    public function address()
    {
        return $this->hasOne(CustomerAddress::class, 'customerNumber', 'customerNumber');
    }

    // Nếu có payments, orders thì thêm tương tự:
    public function payments()
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }
}

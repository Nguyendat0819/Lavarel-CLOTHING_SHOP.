<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class orderdetails extends Model{
    protected $table = 'orderdetails';
    protected $primaryKey = 'orderNumber';
    
    public function getTotalSold() {
        return self::sum('quantityOrdered');
    }
    public function getTotalRevenue() {
        return self::sum('priceEach');
    }
}
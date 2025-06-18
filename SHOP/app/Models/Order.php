<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'orderNumber';
    public $timestamps = false; // lưu tạm file rồi sẽ cập nhật lên hệ thống 
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'customerNumber', 'customerNumber');
    }
}

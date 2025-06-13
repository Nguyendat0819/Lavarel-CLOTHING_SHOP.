<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'orderNumber';

    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class, 'customerNumber', 'customerNumber');
    }
}

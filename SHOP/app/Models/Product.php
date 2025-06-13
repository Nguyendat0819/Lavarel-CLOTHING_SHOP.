<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $primaryKey = 'productCode';
    public $incrementing = true; // nếu productCode không phải là số
    protected $keyType = 'int'; // hoặc 'int' nếu là số
    public $timestamps = false; // cho cập nhật
    protected $fillable = [
        'productName',
        'buyPrice',
        'qualityStock',
        'type',
        'fileImage'
    ];
    // ...existing code...
}
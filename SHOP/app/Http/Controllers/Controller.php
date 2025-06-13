<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


abstract class Controller
{
    //
    public function getCustomerNumber()
    {
        return \Illuminate\Support\Facades\Auth::guard('web')->user()->customerNumber;
    }
    
    public function showProducts()
    {
        $products = DB::table('products')->get(); // hoặc Model::all() nếu dùng Eloquent
        return view('products', compact('products'));
    }
    
}

class ProductControllerNew extends Controller
{
    public function show($productCode)
    {
        $product = DB::table('products')->where('productCode', $productCode)->first();

        if (!$product) {
            return "ID không hợp lệ.";
        }

        return view('detailsProduct', ['product' => $product]);
    }

}







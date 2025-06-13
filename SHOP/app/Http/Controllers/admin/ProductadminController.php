<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
class ProductadminController extends Controller
{
    public function edit($productCode)
    {
        $product = Product::where('productCode', $productCode)->firstOrFail();
        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, $productCode)
    {
        $product = Product::where('productCode', $productCode)->firstOrFail();
        $product->update($request->only(['productName', 'buyPrice', 'qualityStock', 'type', 'fileImage']));
        return redirect()->route('ManagerProduct')->with('success', 'Cập nhật thành công!');
    }
  
}


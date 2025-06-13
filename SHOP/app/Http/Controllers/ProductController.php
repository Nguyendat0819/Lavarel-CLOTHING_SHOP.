<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function show($productCode)
    {
        // Có thể cast về (string) thay vì (int) nếu productCode là mã chữ (như SP001)
        $product = DB::table('products')->where('productCode', $productCode)->first();
        // dd($product);
        if (!$product) {
            return abort(404, 'Sản phẩm không tồn tại.');
        }

        return view('detailsProduct', ['product' => $product]);
    }

     public function listProducts(Request $request, $type = null)
    {
        $itemPerPage = $request->input('per_page', 15);

        $query = DB::table('products');
        if (!empty($type)) {
            $query->where('type', $type);
        }

        $products = $query->paginate($itemPerPage);

        return view('lietke', compact('products', 'type'));
    }



    
}

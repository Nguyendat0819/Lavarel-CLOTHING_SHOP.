<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $productCode = $request->input('productCode');
        $quantity = $request->input('quantity');
        $customerNumber = Session::get('customerNumber'); // Lấy customerNumber từ session của người dùng hiện tại
        // lấy thông tin sản phẩm từ database 
        $product = DB::table('products')->where('productCode', $productCode)->first();
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
        }

        // Xử lý thêm vào session giỏ hàng riêng cho từng người dùng
        $cartKey = 'cart_' . $customerNumber; // Tạo key session riêng cho từng người dùng
        $cart = session()->get($cartKey, []);
        if (isset($cart[$productCode])) {
            $cart[$productCode]['quantity'] += $quantity;
        } else {
            $cart[$productCode] = [
                'productCode' => $productCode,
                'productName' => $product->productName,
                'Imageproduct' => $product->fileImage ? asset('images/' . $product->fileImage) : null,
                'price' => $product->buyPrice,
                'type' => isset($product->type) ? $product->type : null, //mới thêm
                'quantity' => $quantity
            ];
        }
        session([$cartKey => $cart]);

        return response()->json(['success' => true]);
    }

    // xóa sản phẩm 
   
    public function remove(Request $request)
    {
        $productCode = $request->input('productCode');
        $customerNumber = Session::get('customerNumber');
        $cartKey = 'cart_' . $customerNumber;
        $productCode = $request->input('productCode');
        $cart = session()->get($cartKey, []);
        if (isset($cart[$productCode])) {
            unset($cart[$productCode]);
            session([$cartKey => $cart]);
        }
        return response()->json(['success' => true]);
    }
}
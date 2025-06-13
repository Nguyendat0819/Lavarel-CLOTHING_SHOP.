<?php 
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;

class AddProductController extends Controller{
    public function showAddProduct(){
        return view('admin.addProduct');
    }
    public function processAddProduct(Request $request){
        $productName = $request -> input('productName');
        $buyPrice = $request -> input('buyPrice');
        $qualityStock = $request -> input('qualityStock');
        $type = $request -> input('type');
        $fileImage = $request -> input('fileImage');

        DB::table('products')->insert([
            'productName' => $productName,
            'buyPrice' => $buyPrice,
            'qualityStock' => $qualityStock,
            'type' => $type,
            'fileImage' => $fileImage,
        ]);
        return redirect()->route('AddProduct')->with('success', 'Đăng ký thành công, vui lòng đăng nhập');
    }
}
<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ManagerProductController extends Controller {
    public function showManagerProduct() {
        $products = Product::paginate(10); // phân trang
        return view('admin.ManagerProduct', compact('products'));
    }
}
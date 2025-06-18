<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Số khách hàng
        $customerCount = DB::table('customer')->count();

        // Số sản phẩm đã bán (tổng quantityOrdered)
        $totalSold = DB::table('orderdetails')->sum('quantityOrdered');

        // Tổng tiền (tổng priceEach * quantityOrdered)
        $totalRevenue = DB::table('orderdetails')
            ->select(DB::raw('SUM(priceEach * quantityOrdered) as total'))
            ->value('total');

        return view('admin.dashboard', compact('customerCount', 'totalSold', 'totalRevenue'));
    }
}
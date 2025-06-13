<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentProductController extends Controller
{
    public function index()
    {
        // Lấy danh sách đơn hàng, khách hàng, tổng tiền
        $orders = DB::table('orders')
            ->join('customer', 'orders.customerNumber', '=', 'customer.customerNumber')
            ->leftJoin('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
            ->select(
                'orders.orderNumber',
                'orders.orderDate',
                'orders.status',
                'customer.customerName',
                'customer.email',
                DB::raw('SUM(orderdetails.priceEach * orderdetails.quantityOrdered) as totalAmount')
            )
            ->groupBy(
                'orders.orderNumber',
                'orders.orderDate',
                'orders.status',
                'customer.customerName',
                'customer.email'
            )
            ->orderBy('orders.orderNumber', 'ASC')
            ->get();

        return view('admin.PaymentProduct', compact('orders'));
    }

    public function updateStatus(Request $request, $orderNumber)
    {
        $order = Order::where('orderNumber', $orderNumber)->firstOrFail();
        $order->status = 'Hoàn tất';
        $order->save();
        return redirect()->route('PaymentProduct')->with('success', 'Cập nhật trạng thái thành công!');
    }
}
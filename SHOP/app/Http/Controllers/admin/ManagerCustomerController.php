<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class ManagerCustomerController extends Controller
{
    public function index()
    {
        // Lấy danh sách khách hàng và địa chỉ (giả sử đã có quan hệ trong model)
        $customer = Customer::with('address')->get();
        return view('admin.ManagerCustomer', compact('customer'));
    }

    public function destroy($customerNumber)
    {
        $customer = Customer::findOrFail($customerNumber);
        // Xóa các bản ghi liên quan nếu cần (address, payments, orders)
        $customer->address()->delete();
        $customer->payments()->delete();
        $customer->orders()->delete();
        $customer->delete();
        return redirect()->route('ManagerCustomer')->with('success', 'Đã xóa khách hàng!');
    }
}
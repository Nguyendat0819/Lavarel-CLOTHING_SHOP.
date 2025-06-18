<?php
namespace App\Http\Controllers;
use App\Models\Province;
use App\Models\Product;
use App\Models\District;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\table;

    class checkoutsController extends Controller{
        public function showcheckouts(){
            return view('checkouts');
        }

        // viết cho hàm xử lý
        public function proccesscheckouts(Request $rquest){
            $customerName = $rquest->input('customerName');
            $customerNumber = $rquest->input('customerNumber');
            $phone = $rquest->input('phone');
            $province_id = $rquest->input('province_id');
            $district_id = $rquest->input('district_id');
            $wards_id = $rquest->input('wards_id');
            $addressHome = $rquest->input('addressHome');
            $comment = $rquest->input('comment');
            
            
            DB::table('customer_address')->insert([
                'customerNumber' => $customerNumber,
                'customerName' => $customerName,
                'phone' => $phone,
                'province_id' => $province_id,
                'district_id' => $district_id,
                'wards_id' => $wards_id,
                'addressHome' => $addressHome,
                'comment' => $comment, 
            ]);
            // 1. Insert vào bảng orders và lấy orderNumber vừa tạo
            $orderId = DB::table('orders')->insertGetId([
                'customerNumber' => $customerNumber,
                'orderDate' => now(),
                'status' => 'Trạng thái đang xử lý',
            ]);

            
                        // 2. Lấy giỏ hàng từ session
            $cartKey = 'cart_' . $customerNumber;
            $cart = session()->get($cartKey, []);

            // 3. Insert từng sản phẩm vào orderdetails
            DB::transaction(function () use ($cart, $orderId) {
                foreach ($cart as $item) {
                    // 1. Lấy sản phẩm và khóa dòng
                    $product = Product::where('productCode', $item['productCode'])->lockForUpdate()->first();

                    // 2. Kiểm tra tồn kho
                    if ($product->qualityStock < $item['quantity']) {
                        throw new \Exception('Sản phẩm ' . $product->productName . ' không đủ tồn kho!');
                    }

                    // 3. Trừ tồn kho
                    $product->qualityStock -= $item['quantity'];
                    $product->save();

                    // 4. Lưu chi tiết đơn hàng (orderdetails)
                    DB::table('orderdetails')->insert([
                        'orderNumber'      => $orderId,
                        'productCode'      => $item['productCode'],
                        'quantityOrdered'  => $item['quantity'],
                        'priceEach'        => $item['price'],
                        'typeOrdered'      => $item['type'] ?? null,
                    ]);
                }
            }
            // 4. Tính tổng tiền đơn hàng
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // 5. Thêm vào bảng payments
            DB::table('payments')->insert([
                'customerNumber' => $customerNumber,
                'checkNumber'    => uniqid('PAY'),
                'paymentDate'    => now(),
                'amount'         => $total,
            ]);

            // 4. Xóa giỏ hàng sau khi đặt hàng thành công
            session()->forget($cartKey);

            return back()->with('success', 'Đặt hàng thành công!');
        }
    }
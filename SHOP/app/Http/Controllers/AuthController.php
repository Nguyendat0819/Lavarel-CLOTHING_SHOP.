<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        // return view('login'); // file resources/views/login.blade.php
         return view('login', ['type' => 'user']);
    }

    public function processLogin(Request $request)
    {
        $customerName= $request->input('customerName');
        $password = $request->input('password');

        $user = DB::table('customer')->where('customerName', $customerName)->orWhere('customerNumber', $customerName)->first();
        if ($user) {
            if ($password === $user->password) {
                Session::put('logged_in', true);
                Session::put('customerName', $user->customerName);
                Session::put('customerNumber', $user->customerNumber);


                if ($user->customerName=== 'admin' && $user->password === 'Admin123@') {
                    return redirect()->route('admin');
                } else {
                    return redirect()->route('homeuser');
                }
            } else {
                return back()->with('error', 'Sai mật khẩu');
            }
        } else {
            return back()->with('error', 'Tài khoản không tồn tại');
        }
    }

    // viết cho đăng ký
    public function showRegister()
    {
        return view('register'); // file resources/views/register.blade.php
    }

    public function processRegister(Request $rquest){
        $customerName= $rquest->input('customerName');
        $password = $rquest->input('password');
        $email = $rquest->input('email');
        $date = $rquest->input('date');
        $gender = $rquest->input('gender');

        // Kiểm tra xem tên đăng nhập đã tồn tại chưa
        $existingUser = DB::table('customer')->where('customerName', $customerName)->first();
        if ($existingUser) {
            return back()->with('error', 'Tên đăng nhập đã tồn tại');
        }

        // Thêm người dùng mới vào cơ sở dữ liệu
        DB::table('customer')->insert([
            'customerName' => $customerName,
            'password' => $password,
            'email' => $email,
            'date' => $date,
            'gender' => $gender,
        ]);
      
        return redirect()->route('login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập');
    }

}

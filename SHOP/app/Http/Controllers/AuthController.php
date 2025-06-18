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
    public function register(Request $request)
    {
        $request->validate([
            'customerName' => [
                'required',
                'regex:/^[\p{L}\s\'-]+$/u'
            ],
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',      // chữ hoa
                'regex:/[a-z]/',      // chữ thường
                'regex:/[0-9]/',      // số
                'regex:/[\W_]/'       // ký tự đặc biệt
            ],
            're_password' => 'required|same:password',
            'date' => 'required|date',
        ], [
            'customerName.required' => 'Yêu cầu nhập tên',
            'customerName.regex' => 'Chỉ cho phép chữ cái và khoảng trắng',
            'email.required' => 'Yêu cầu nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Xin nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
            'password.regex' => 'Mật khẩu phải có chữ hoa, chữ thường, số và ký tự đặc biệt',
            're_password.required' => 'Vui lòng nhập lại mật khẩu',
            're_password.same' => 'Mật khẩu không khớp',
            'date.required' => 'Vui lòng nhập ngày sinh',
            'date.date' => 'Ngày sinh không hợp lệ',
        ]);

        
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

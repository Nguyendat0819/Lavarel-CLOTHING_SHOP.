<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
 
    public function showLoginForm()
    {
        return view('login', ['type' => 'customer']);
    }


    
    public function login(Request $request)
    {
        $credentials = [
            'customerName' => $request->customerName,  // thay email thành customerName
            'password' => $request->password,
        ];

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/checkout');
        }

        return back()->withErrors(['customerName' => 'Tên khách hàng hoặc mật khẩu không đúng']);
    }
}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="wrapper_body">
        <div class="header">
            <div class="header_list">
                <div class="header_list_item">
                    <a href="{{ route('admin') }}">Admin</a>
                </div>
                <div class="header_list_item">
                    <a href="{{ route('AddProduct') }}">Thêm sản phẩm</a>
                </div>
                <div class="header_list_item">
                    <a href="{{ route('ManagerProduct') }}">Quản lý sản phẩm</a>
                </div>
                <div class="header_list_item">
                    <a href="{{ route('ManagerCustomer') }}">Quản lý khách hàng</a>
                </div>
                <div class="header_list_item">
                    <a href="{{ route('PaymentProduct') }}">Quản lý đơn hàng</a>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('content')
        </div>

    </div>
</body>
</body>
</html>
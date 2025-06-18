<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    @vite(['resources/css/styles.css'])
    @vite(['resources/css/root.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="contain">
        <div class="header_container">
            <div class="header_logo" bis_skin_checked="1">
				<div class="wrap-logo" itemscope="" itemtype="http://schema.org/Organization" bis_skin_checked="1">	
					<a href="{{ route('home') }}" aria-label="Eva De Eva" itemprop="url">
							<img itemprop="logo" width="220" height="70" src="//theme.hstatic.net/200000000133/1001205759/14/logo.png?v=1859" alt="Eva De Eva" class="img-responsive logoimg ls-is-cached lazyloaded">
					</a>														
				</div>
			</div>

            <div class="header_menu">
                <ul class="nav_menu">
                    <li class="nav_item has_submenu has_submenu_product">
                        <a href="{{ route('lietke') }}">SẢN PHẦM
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" x="0" y="0" viewBox="0 0 128 128"><g><path d="m64 88c-1.023 0-2.047-.391-2.828-1.172l-40-40c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l37.172 37.172 37.172-37.172c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172z"></path></g></svg>
                        </a>
                        <div class="base_product"></div>
                        <div class="menu_list_warapper">
                            <div class="container_wrapper">
                                <div class="product_wrapper">
                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/ao.jpg" alt="" class="product_img">
                                        <span>Aó</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/dam.jpg" alt="" class="product_img">
                                        <span>Đầm</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/chan_vay.jpg" alt="" class="product_img">
                                        <span>Chân váy</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/quan.jpg" alt="" class="product_img">
                                        <span>Quần</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/img_megamenu2_5_a5bce29661434ffdad3e4cbe7e5540ea.jpg" alt="" class="product_img">
                                        <span>Jumpsuit</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/ao_khaocs.jpg" alt="" class="product_img">
                                        <span>Aó Khoác</span>
                                    </div>

                                    <div class="product_infor">
                                        <img src="https://file.hstatic.net/200000000133/file/phu_kien.jpg" alt="" class="product_img">
                                        <span>Phụ Kiện</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav_item">
                        <a href="{{ route('products.byType', ['type' => 'ao']) }}">ÁO</a>
                    </li>
                    <li class="nav_item">
                        <a href="{{ route('products.byType', ['type' => 'dam']) }}">ĐẦM</a>
                    </li>
                    <li class="nav_item">
                        <a href="{{ route('products.byType', ['type' => 'chan-vay']) }}">CHÂN VÁY</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="{{ route('products.byType', ['type' => 'quan']) }}">QUẦN</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="{{ route('products.byType', ['type' => 'jumpsuit']) }}">JUMPSUIT</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="{{ route('products.byType', ['type' => 'ao-khoac']) }}">ÁO KHOÁC</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="{{ route('products.byType', ['type' => 'phu-kien']) }}">PHỤ KIỆN</a>
                    </li>
                </ul>
            </div>

            <div class="header_next">
                <button class="header_next_link" id="site_search" aria-label="tìm kiếm" title="tìm kiếm">
                    <span class="box_icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </button>

                <button class="header_next_link" id="site_search" aria-label="tài khoản" title="tài khoản">
                    <a href="{{ route('login') }}">
                        <span class="box_icon">
                            <i class="fa-solid fa-user">
                            </i>
                        </span>
                    </a>
                </button>

                <button class="header_next_link" id="site_search" aria-label="gio_hang" title="gio_hang">
                    <span class="box_icon">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                    </span>
                </button>
            </div>
            

        </div>
        <div class="login">
            <div class="active_head">
               <h4 class="active">
                    <a href="{{ route('login') }}">Đăng Nhập</a>
               </h4> 
               <h4 class="active_l">
                    <a href="{{ route('register') }}">Đăng Ký</a>
               </h4>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    <script>
                        alert("{{ session('error') }}")
                    </script>
                </div>
            @endif
            <form action="{{ $type === 'customer' ? route('customer.login.submit') : route('login.submit') }}" method="post">
                 @csrf  {{-- THÊM DÒNG NÀY --}}
                <input type="text" name="customerName" placeholder="Tên đăng nhập" class="input_sub" autocomplete="off">
                <br>
                <div class="input_wrapper">
                    <input type="password" name="password" placeholder="Password" class="input_sub input_pas" id="password">
                    <i class="fa-solid fa-eye eye_on" id="showpassword2"></i>
                </div>
                <input type="submit" value="Đăng Nhập" class="sub_dki">
                <br>
            </form>
        </div>
    </div>

    <!-- xử lý php.login -->
    
</body>
<script>
    const password = document.getElementById("password");
    const showpassword2 = document.getElementById("showpassword2");

    showpassword2.addEventListener("click", function(){
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type",type);

        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    })
</script>
</html>
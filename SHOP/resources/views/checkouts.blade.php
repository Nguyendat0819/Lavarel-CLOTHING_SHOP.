@php
    use Illuminate\Support\Facades\DB; // 
    $provinces = DB::table('province')->get(); // lấy ra từ bảng
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/root.css')
    @vite(['resources/css/styles.css'])
    @vite(['resources/css/user.css'])
    @vite(['resources/css/checkout.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        var removeCartRoute = '{{ route("cart.remove") }}';
        var csrfToken = '{{ csrf_token() }}';
    </script>
    @vite('resources/js/checkouts.js')
    <link rel="stylesheet" href="checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    @vite('resources/js/apps.js')
    <title>Thanh Toán</title>
</head>
<body>
    <div class="header_container">
            <div class="header_logo" bis_skin_checked="1">
				<div class="wrap-logo" itemscope="" itemtype="http://schema.org/Organization" bis_skin_checked="1">	
					<a href="{{ route('homeuser') }}" aria-label="Eva De Eva" itemprop="url">
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
                        <a href="">ÁO</a>
                    </li>
                    <li class="nav_item">
                        <a href="">ĐẦM</a>
                    </li>
                    <li class="nav_item">
                        <a href="">CHÂN VÁY</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="">QUẦN</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="">JUMPSUIT</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="">ÁO KHOÁC</a>
                    </li>
                    <li class="nav_item has_submenu">
                        <a href="">PHỤ KIỆN</a>
                    </li>
                </ul>
            </div>

            <div class="header_next">
                <button class="header_next_link" id="site_search" aria-label="tìm kiếm" title="tìm kiếm">
                    <span class="box_icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </button>

                <button class="header_next_link account_inner" id="site_search" aria-label="tài khoản" title="tài khoản">
                    <a href="">
                        <span class="box_icon">
                            <i class="fa-solid fa-user">
                            </i>
                        </span>                       
                        <div class="account_inner_user">
                            <div class="account_conntent">
                                <div class="account_list">
                                    <div class="account_title">
                                        <div class="account_title_header">
                                            <p class="txt_title">THÔNG TIN TÀI KHOẢN</p>
                                        </div>
                                    </div>
                                    
                                    <div class="account_block">
                                        <ul>
                                            <li class="user_name">
                                                <span>
                                                    {{ old('customerName', session('customerName')) }}                                 
                                                </span>
                                            </li>                                           
                                            <li>
                                                <a href="">Tài khoản của tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home') }}">Đăng xuất</a>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </button>

                <button class="header_next_link" id="site_search" aria-label="gio_hang" title="gio_hang">
                    <a href="{{ route('checkouts') }}">
                        <span class="box_icon">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </span>
                        <span class="count_holer">
                             <span class="count">
                                @php
                                    $customerNumber = session('customerNumber'); // Lấy customerNumber từ session
                                    $cartKey = 'cart_' . $customerNumber; // Tạo key session riêng cho từng người dùng
                                    $cart = session($cartKey, []);
                                    $totalProducts = count($cart); // Đếm số sản phẩm trong giỏ hàng
                                @endphp
                                {{ $totalProducts }}
                             </span>                               
                        </span>
                    </a>
                </button>
            </div>
    </div>
        <div class="container">
            <div class="wrap">
                <div class="main">
                    <div class="main_header">
                        <div class="header_logo" bis_skin_checked="1">
                            <div class="wrap-logo" itemscope="" itemtype="http://schema.org/Organization" bis_skin_checked="1">	
                                <a href="homeuser.php" aria-label="Eva De Eva" itemprop="url">
                                    <img itemprop="logo" width="220" height="70" src="//theme.hstatic.net/200000000133/1001205759/14/logo.png?v=1859" alt="Eva De Eva" class="img-responsive logoimg ls-is-cached lazyloaded">
                                </a>														
                            </div>
                        </div>
                    </div>
                    <div class="main_conttent">
                        <div class="section_header">
                            <h2 class="section_tittle">Thông tin giao hàng</h2>
                        </div>
                        <div class="section_conttent">
                            <form action="{{ route('checkouts.submit') }}" method="post" id="myForm" class="mt-5">
                                @csrf  {{-- THÊM DÒNG NÀY --}}
                                <div class="file file_show_name">
                                    <div class="file_input_wrapper">                                        
                                        <input 
                                         type="text"
                                         class="file_input file_input_name "
                                         
                                         placeholder="Họ và tên" 
                                         autocomplete="off"
                                         size="30" 
                                         name="customerName"  
                                         value="{{ old('customerName', session('customerName')) }}">
                                    </div>                                    
                                </div>

                                <div class="file file_show_name">
                                    <div class="file_input_wrapper">                                        
                                        <input 
                                         type="text"
                                         class="file_input file_input_name "
                                         style="display: none"
                                         placeholder="customerNumber" 
                                         autocomplete="off"
                                         size="30" 
                                         name="customerNumber"  
                                         value="{{ old('customerNumber', session('customerNumber')) }}">
                                    </div>                                    
                                </div>
                                
                                <div class="file file_show_phone">
                                    <div class="file_input_wrapper">
                                        <input type="text" class="file_input file_input_phone" name="phone" placeholder="Số điện thoại" autocomplete="off">
                                    </div>
                                </div>
								<div class="selection_address">
									<div class="row_add">
										<div class="col-3">
											<div class="form-group">
												<label for="province">Tỉnh/Thành phố</label>
												<select id="province" name="province_id" class="form-control">
													<option value="">Chọn một tỉnh</option>
													<!-- populate options with data from your database or API -->
                                                    @foreach ($provinces as $row)
                                                        <option value="{{ $row->province_id }}">{{ $row->name }}</option>
                                                    @endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="district">Quận/Huyện</label>
												<select id="district" name="district_id" class="form-control">
													<option value="">Chọn một quận/huyện</option>
												</select>
											</div>
											<div class="form-group">
												<label for="wards">Phường/Xã</label>
												<select id="wards" name="wards_id" class="form-control">
													<option value="">Chọn một xã</option>
												</select>
											</div>											
										</div>
									</div>																
								</div>
                                <div class="file file_show_address">
                                    <div class="file_input_wrapper">
                                        <input type="text" class="file_input file_input_address" name="addressHome" placeholder="Địa chỉ" autocomplete="off">
                                    </div>
                                </div>

                                <div class="file file_show_address">
                                    <div class="file_input_wrapper">
                                        <input type="text" class="file_input file_input_address" name="comment" placeholder="comment" autocomplete="off">
                                    </div>
                                </div>
                                <div class="file file_submit">
                                    <input type="submit" value="Hoàn tất đơn hàng" class="submit_products" onclick="alert('Đặt hàng thành công!')">
                                </div>
                            </form>							
                        </div>
                    </div>    
                </div>
            <?php                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy dữ liệu từ POST trước khi kiểm tra rỗng
                    $customerName = $_POST['username'] ?? '';
                    $phone = $_POST['phone'] ?? '';
                    $addressHome = $_POST['addressHome'] ?? '';
                    $province_id = isset($_POST['province_id']) ? (int)$_POST['province_id'] : 0;
                    $district_id = isset($_POST['district_id']) ? (int)$_POST['district_id'] : 0;
                    $wards_id = isset($_POST['wards_id']) ? (int)$_POST['wards_id'] : 0;

                    // Kiểm tra các trường bắt buộc
                    if ( !empty($phone) && !empty($addressHome) && $province_id > 0 && $district_id > 0 && $wards_id > 0){
                        $conn = mysqli_connect('localhost', 'root', '', 'form');

                        if (!$conn) {
                            die("Kết nối thất bại: " . mysqli_connect_error());
                        }

                        $stmt = mysqli_prepare($conn, "INSERT INTO customer (customerName, phone, addressHome, province_id, district_id, wards_id) VALUES (?, ?, ?, ?, ?, ?)");

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "ssssss", $customerName, $phone, $addressHome, $province_id, $district_id, $wards_id);
                            if (mysqli_stmt_execute($stmt)) {
                                echo "Thêm dữ liệu thành công";
                            } else {
                                echo "Lỗi khi thêm dữ liệu: " . mysqli_stmt_error($stmt);
                            }
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Lỗi chuẩn bị truy vấn: " . mysqli_error($conn);
                        }

                        mysqli_close($conn);
                    } else {
                        echo "Vui lòng nhập đầy đủ thông tin bắt buộc.";
                        echo "<pre>";
                        echo "customerName: " . $customerName . "\n";
                        echo "phone: " . $phone . "\n";
                        echo "addressHome: " . $addressHome . "\n";
                        echo "province_id: " . $province_id . "\n";
                        echo "district_id: " . $district_id . "\n";
                        echo "wards_id: " . $wards_id . "\n";
                        echo "</pre>";

                    }
                }
            ?>                 
            <div class="sidebar">
                <div class="cart">
                    <h2>Giỏ hàng của bạn</h2>
                        <ul class="cart_items">
                            @php
                                $customerNumber = session('customerNumber'); // Lấy customerNumber từ session
                                $cartKey = 'cart_' . $customerNumber; // Tạo key session riêng cho từng người dùng
                                $cart = session($cartKey, []);
                            @endphp
                            @if($cart && count($cart) > 0)
                                @foreach($cart as $item)
                                    <li class="cart_item">
                                        <div class="item_name">{{ $item['productName'] ?? 'Tên sản phẩm không xác định' }}</div>
                                        <div class="item_Image">
                                            @if($item['Imageproduct'])
                                                <img src="{{ $item['Imageproduct'] }}" alt="Hình ảnh sản phẩm" width="69" height="102">
                                            @else
                                                Hình ảnh không xác định
                                            @endif
                                        </div>
                                        <div class="item_quantity">Số lượng: {{ $item['quantity'] }}</div>
                                        <div class="item_price">Giá: {{ $item['price'] }} VND</div>
                                        <button class="remove-item" data-code="{{ $item['productCode'] }}">Xóa</button>
                                    </li>
                                @endforeach
                            @else
                                <li class="cart_item">Giỏ hàng của bạn đang trống.</li>
                            @endif
                        </ul>
                        <div class="cart_total">
                            Tổng cộng: 
                            @php
                                $total = 0;
                                foreach($cart as $item) {
                                    $quantity = (int)($item['quantity'] ?? 0);
                                    $price = (float)str_replace('.', '', $item['price'] ?? 0);
                                    $total += $quantity * $price;
                                }
                            @endphp
                            {{ number_format($total, 0, ',', '.') }} VND
                        </div>
                    
                </div>
            </div>
            </div>
        </div>
    
</body>
</html>
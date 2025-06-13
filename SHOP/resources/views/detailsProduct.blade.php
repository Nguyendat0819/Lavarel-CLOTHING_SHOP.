@extends('layouts.app')
@section('title', $product->productName ?? 'Chi tiết sản phẩm')


@section('content')
<div class="product_detail_container">
    <div class="product_detail_left">
        <img src="{{ asset('images/' . $product->fileImage) }}" alt="{{ $product->productName }}" class="product_detail_image">
        <!-- Có thể thêm slider ảnh nếu có nhiều ảnh -->
    </div>
    <div class="product_detail_right">
        <h1>{{ $product->productName }}</h1>
        <div class="product_detail_wrapper">
            <div class="product_meta">
                <span class="product_meta_borderright">Mã sản phẩm: {{ $product->productCode }}</span> 
                {{-- <span class="product_meta_borderright_status">Tình trạng: {{ $product->status ?? 'Còn hàng' }}</span>  --}}
                <span>Thương hiệu: Eva De Eva</span>
            </div>
            <div class="product_price">
                 <span class="price"> Giá:{{ $product->buyPrice }}VND</span>
            </div>
            <div class="product_options">
                <div class="option">
                    <label>Số lượng:</label>
                    <button class="button_detail button_detail_left">
                        <svg focusable="false" class="icon icon--minus " viewBox="0 0 10 2" role="presentation">
							<path d="M10 0v2H0V0z"></path>
						</svg>
                    </button>
                    <input type="text" value="1" style="width: 40px; text-align: center;" class="qty_val">
                    <button class="button_detail button_detail_right">
                        <svg focusable="false" class="icon icon--plus " viewBox="0 0 10 10" role="presentation">
							<path d="M6 4h4v2H6v4H4V6H0V4h4V0h2v4z"></path>
						</svg>
                    </button>
                </div>
                <div class="quality_now">
                    <div class="quality_now_inner">
                            <span style="font-size:18px">
                                {{ $product->qualityStock ?? 'Không có thông tin tồn kho' }}
                            </span>
                    </div>
                </div>
            </div>
            <div class="product_actions">
                <button class="add_to_cart">THÊM VÀO GIỎ</button>
                {{-- <button class="buy_now">MUA NGAY</button> --}}
            </div>
        </div>
    </div>
</div>
<script>
    const btnMinus = document.querySelector('.button_detail_left');
    const btnPlus = document.querySelector('.button_detail_right');
    const qtyInput = document.querySelector('.qty_val');
    const qualityStock = parseInt('{{ $product->qualityStock ?? 0 }}'); // Lấy số lượng tồn kho từ server

    btnMinus.addEventListener('click', () => {
        let currentValue = parseInt(qtyInput.value) || 0;
        if (currentValue > 1) {
            qtyInput.value = currentValue - 1;
        }
    });

    btnPlus.addEventListener('click', () => {
        let currentValue = parseInt(qtyInput.value) || 0;
        if (currentValue < qualityStock) {
            qtyInput.value = currentValue + 1;
        }
    });

    // xử lý thêm vào giỏ hàng
    document.querySelector('.add_to_cart').addEventListener('click', function() {
        const quantity = parseInt(qtyInput.value) || 1; // Giá trị mặc định là 1
        const productCode = '{{ $product->productCode }}'; // Lấy mã sản phẩm

        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                productCode: productCode,
                quantity: quantity
            })
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => { 
                    throw new Error(text || 'Server Error'); 
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Đã thêm vào giỏ hàng');
            } else {
                alert(data.error || 'Có lỗi xảy ra, vui lòng thử lại.');
            }
        })
        .catch(error => {
            alert('Có lỗi xảy ra: ' + error.message);
        });
    });

    //cập nhật số lượng khi hiển thị ở giỏ hàng
    
</script>
@endsection
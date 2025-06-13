@extends('admin.layouts')
@section('content')
    <div class="container">
        <h1 style="text-align: center">Danh sách sản phẩm</h1>
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; text-align:center;">
            <thead>
                <tr>
                    <th>ProductCode</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Loại</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->productCode ?? '' }}</td>
                    <td>{{ $product->productName ?? '' }}</td>
                    <td>{{ number_format($product->buyPrice ?? 0, 3, '.', '.') }} VNĐ</td>
                    <td>{{ $product->qualityStock ?? '' }}</td>
                    <td>{{ $product->type ?? '' }}</td>
                    <td>
                        @if(!empty($product->fileImage))
                            <img src="{{ asset('images/' . $product->fileImage) }}" alt="Ảnh" width="60">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->productCode) }}">Sửa</a>
|
                        <form action="{{ route('products.destroy', $product->productCode) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page">
            <div class="list_page">
                <!-- Nút bên trái -->
                @if ($products->currentPage() > 1)
                    <a class="page_conttroler page_conttroler_left button_icon_nav" href="{{ $products->previousPageUrl() }}">
                        <svg class="shopee-svg-icon icon-arrow-left" viewBox="0 0 11 11">
                            <g>
                                <path d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c.2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z"/>
                            </g>
                        </svg>
                    </a>
                @endif

                <div class="pagination">
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <span class="page_button current" style="font-size: 40px;">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page_button" style="font-size: 40px;">{{ $page }}</a>
                        @endif
                    @endforeach
                </div>

                <!-- Nút mũi tên phải -->
                @if ($products->currentPage() < $products->lastPage())
                    <a class="page_conttroler page_conttroler_right button_icon_nav" href="{{ $products->nextPageUrl() }}">
                        <svg class="shopee-svg-icon icon-arrow-right" viewBox="0 0 11 11">
                            <path d="m2.5 11c.1 0 .2 0 .3-.1l6-5c.1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts')
@section('content')

    <div class="container">
        <div class="contain_them">
            <form action="{{ route('AddProduct.submit') }}" method="post" style="max-width: 400px; margin: auto;">
                @csrf
                <h1 style="text-align: center">Thêm sản phẩm</h1>

                <div style="margin-bottom: 12px;">
                    <label for="productName">Tên sản phẩm</label><br>
                    <input type="text" id="productName" name="productName" autocomplete="off" style="width: 100%; padding: 8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="buyPrice">Giá sản phẩm</label><br>
                    <input type="text" id="buyPrice" name="buyPrice" autocomplete="off" style="width: 100%; padding: 8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="qualityStock">Số lượng</label><br>
                    <input type="text" id="qualityStock" name="qualityStock" autocomplete="off" style="width: 100%; padding: 8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="type">Loại sản phẩm</label><br>
                    <input type="text" id="type" name="type" autocomplete="off" style="width: 100%; padding: 8px;">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="fileImage">Thêm hình ảnh</label><br>
                    <input type="file" id="fileImage" name="fileImage" autocomplete="off" style="width: 100%; padding: 8px;">
                </div>

                <button type="submit" style="padding: 10px 20px;">Thêm sản phẩm</button>
            </form>

        </div>
    </div>
@endsection
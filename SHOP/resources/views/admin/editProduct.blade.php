@extends('admin.layouts')
@section('content')
<div class="container">
    <h2 style="text-align: center">Sửa sản phẩm</h2>
    <form action="{{ route('products.update', $product->productCode) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="edit_product">
            <label>Tên sản phẩm</label>
            <input type="text" name="productName" value="{{ $product->productName }}">
        </div>
        <div class="edit_product">
            <label>Giá</label>
            <input type="text" name="buyPrice" value="{{ $product->buyPrice }}">
        </div>
        <div class="edit_product">
            <label>Số lượng</label>
            <input type="text" name="qualityStock" value="{{ $product->qualityStock }}">
        </div> 
        <div class="edit_product">
            <label>Loại</label>
            <input type="text" name="type" value="{{ $product->type }}">
        </div>
        <button type="submit" class="edit_submit">Cập nhật</button>
    </form>
</div>
@endsection
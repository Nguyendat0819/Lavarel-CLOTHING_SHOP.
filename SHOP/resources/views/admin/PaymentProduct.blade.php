@extends('admin.layouts')
@section('content')
<div class="wrapper_manage_order">
    <div class="manage_order">
        <h2 style="text-align: center;">Trạng thái đơn hàng</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Khách hàng</th>
                    <th>Email</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr @if($order->status === 'Hoàn tất') style="background-color: #b6fcb6;" @endif>
                     <td>{{ $order->orderNumber }}</td>
                        <td>{{ $order->orderDate }}</td>
                        <td>{{ $order->customerName }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ number_format($order->totalAmount * 1000, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $order->status }}</td>
                    <td>
                        @if($order->status !== 'Hoàn tất')
                            <form method="POST" action="{{ route('PaymentProduct.update', ['orderNumber' => $order->orderNumber]) }}">
                                @csrf
                                <button type="submit">Hoàn tất</button>
                            </form>
                        @else
                            Đã hoàn tất
                        @endif  

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Không có đơn hàng nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
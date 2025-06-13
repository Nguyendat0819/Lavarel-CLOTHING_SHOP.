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
                            <button type="button"
                                onclick="markDone(this)"
                                style="background: #f0ad4e; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">
                                Hoàn tất
                            </button>
                        @else
                            Đã hoàn tất
                        @endif
                        <script>
                            function markDone(btn) {
                                // Đổi màu dòng
                                btn.closest('tr').style.backgroundColor = '#b6fcb6';
                                // Đổi text trạng thái
                                btn.closest('tr').querySelectorAll('td')[5].innerText = 'Hoàn tất';
                                // Đổi nút thành "Đã hoàn tất"
                                btn.parentNode.innerHTML = 'Đã hoàn tất';
                            }
                        </script>

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
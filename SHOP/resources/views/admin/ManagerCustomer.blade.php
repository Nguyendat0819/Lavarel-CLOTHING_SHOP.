{{-- filepath: resources/views/admin/ManagerCustomer.blade.php --}}
@extends('admin.layouts')
@section('content')
<div class="wrapper_manage_customer">
    <div class="manage_customer">
        <h2 style="text-align: center;">Danh sách khách hàng</h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Mật khẩu</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customer as $customer)
                <tr>
                    <td>{{ $customer->customerNumber }}</td>
                    <td>{{ $customer->customerName }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address->phone ?? ''  }}</td>
                    <td>{{ $customer->password }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->date }}</td>
                    <td>{{ $customer->address->addressHome ?? '' }}</td>
                    <td>
                        <form method="POST" action="{{ route('ManagerCustomer.destroy', $customer->customerNumber) }}" onsubmit="return confirm('Bạn có chắc muốn xóa khách hàng này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10">Không có khách hàng nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

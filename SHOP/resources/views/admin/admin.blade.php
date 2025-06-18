@extends('admin.layouts')
   
@section('content')
    <div class="admin_statistics">
        <ul class="admin_statistics_contain">
            <li class="admin_statistics_item item_customer">Số khách hàng: <strong>{{ $customerCount }}</strong></li>
            <li class="admin_statistics_item item_sold">Số sản phẩm đã bán: <strong>{{ $totalSold }}</strong></li>
            @php
                $totalRevenueVND = $totalRevenue * 1000;
                $totalRevenueMillions = $totalRevenue / 100;
            @endphp
            <li class="admin_statistics_item item_total">Tổng tiền: <strong>{{ number_format($totalRevenueVND, 0, ',', '.') }} VNĐ</strong></li>
        </ul>
    </div>
    
    <canvas id="overviewChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('overviewChart').getContext('2d');
    const overviewChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Khách hàng', 'Sản phẩm đã bán', 'Tổng tiền (VNĐ)'],
            datasets: [{
                label: 'Thống kê',
                data: [
                    {{ $customerCount }},
                    {{ $totalSold }},
                    {{ $totalRevenueMillions }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
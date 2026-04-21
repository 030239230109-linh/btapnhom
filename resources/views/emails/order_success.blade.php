<h2>Đặt hàng thành công</h2>

<p>Xin chào {{ $user->name }},</p>

<p>Bạn đã đặt hàng thành công.</p>

<p>Danh sách sản phẩm:</p>

<ul>
    @php
        $tongTien = 0;
    @endphp

    @foreach($cart as $item)
        @php
            $thanhTien = $item['gia'] * $item['quantity'];
            $tongTien += $thanhTien;
        @endphp
        <li>
            {{ $item['tieu_de'] }} - SL: {{ $item['quantity'] }} -
            {{ number_format($item['gia'], 0, ',', '.') }}đ
            = {{ number_format($thanhTien, 0, ',', '.') }}đ
        </li>
    @endforeach
</ul>

<p><strong>Tổng tiền:</strong> {{ number_format($tongTien, 0, ',', '.') }}đ</p>

<p>Cảm ơn bạn đã mua hàng.</p>
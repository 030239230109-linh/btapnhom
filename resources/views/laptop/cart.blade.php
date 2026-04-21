<x-laptop-layout>
    <x-slot name="title">
        Giỏ hàng
    </x-slot>

    <div style="margin: 20px auto; width: 80%;">
        <h3 style="text-align:center; color:blue;">DANH SÁCH SẢN PHẨM</h3>

        @if(session('success'))
            <div style="background:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse:collapse;">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Xóa</th>
            </tr>

            @php
                $stt = 1;
                $tong = 0;
            @endphp

            @forelse($cart as $item)
                @php
                    $thanhTien = $item['gia'] * $item['quantity'];
                    $tong += $thanhTien;
                @endphp
                <tr>
                    <td>{{ $stt++ }}</td>
                    <td>{{ $item['tieu_de'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($thanhTien, 0, ',', '.') }}đ</td>
                    <td>
                        <a href="{{ route('cart.delete', $item['id']) }}"
                           style="background:red; color:white; padding:6px 10px; text-decoration:none; border-radius:4px;">
                            Xóa
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Giỏ hàng trống</td>
                </tr>
            @endforelse

            <tr>
                <td colspan="3" style="text-align:center; font-weight:bold;">Tổng cộng</td>
                <td colspan="2" style="font-weight:bold;">{{ number_format($tong, 0, ',', '.') }}đ</td>
            </tr>
        </table>

        @if(count($cart) > 0)
            <form action="{{ route('cart.order') }}" method="POST" style="margin-top:20px; text-align:center;">
                @csrf
                <div style="margin-bottom:10px;">
                    <label>Hình thức thanh toán</label><br>
                    <select name="payment_method" style="padding:6px; width:150px;">
                        <option value="tien_mat">Tiền mặt</option>
                        <option value="chuyen_khoan">Chuyển khoản</option>
                    </select>
                </div>

                <button type="submit"
                        style="background:#007bff; color:white; border:none; padding:10px 20px; border-radius:4px;">
                    ĐẶT HÀNG
                </button>
            </form>
        @endif
    </div>
</x-laptop-layout>
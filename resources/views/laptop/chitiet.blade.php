<x-laptop-layout>
    <x-slot name="title">
        Chi tiết sản phẩm
    </x-slot>
    
    <div id="alert-success"
        style="display:none; background:#d4edda; color:#155724; border:1px solid #c3e6cb;
               padding:12px 20px; border-radius:6px; margin: 15px 0;">
        Đã thêm vào giỏ hàng!
    </div>

    <div class="mt-4">
        <div class="laptop-info">

            <div class="text-center p-2">
                <img src="{{ asset('storage/image/' . $data->hinh_anh) }}"
                     style="width: 100%; max-height: 350px; object-fit: contain;"
                     alt="{{ $data->tieu_de }}">
            </div>

            <div class="p-2">
                <h5 style="font-weight: normal; margin-bottom: 15px;">{{ $data->tieu_de }}</h5>

                <div style="font-size: 0.95rem; line-height: 1;">
                    <p>CPU: {{ $data->cpu }}</p>
                    <p>RAM: {{ $data->ram }}</p>
                    <p>Ổ cứng: {{ $data->luu_tru }}</p>
                    <p>Chip đồ hoạ: {{ $data->chip_do_hoa }}</p>
                    <p>Nhu cầu: {{ $data->nhu_cau }}</p>
                    <p>Màn hình: {{ $data->man_hinh }}</p>
                    <p>Hệ điều hành: {{ $data->he_dieu_hanh }}</p>
                    <p>Giá:
                        <span style="color: red; font-weight: bold; font-style: italic;">
                            {{ number_format($data->gia, 0, ',', '.') }} VNĐ
                        </span>
                    </p>
                </div>

                <form id="form-add-cart" style="margin-top: 15px;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $data->id }}">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span>Số lượng mua:</span>
                        <input type="number" name="quantity" value="1" min="1"
                            style="width:70px; text-align:center; padding:4px; border:1px solid #ccc;">
                        <button type="submit"
                                style="background-color:#007bff; color:white; border:none; padding:8px 20px;
                                       border-radius:4px; cursor:pointer; font-size:14px;">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </form>

                <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">

                <h3 style="font-weight: normal; margin-bottom: 15px;">Thông tin khác</h3>
                <div style="font-size: 0.95rem; line-height: 1;">
                    <p>Khối lượng: {{ $data->khoi_luong }}</p>
                    <p>Webcam: {{ $data->webcam }}</p>
                    <p>Pin: {{ $data->pin }}</p>
                    <p>Kết nối không dây: {{ $data->ket_noi_khong_day }}</p>
                    <p>Bàn phím: {{ $data->ban_phim }}</p>
                    <p>Cổng kết nối: {{ $data->cong_ket_noi }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let alertTimeout;

        document.getElementById('form-add-cart').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const alertBox = document.getElementById('alert-success');
                    alertBox.style.display = 'block';

                    const badge = document.getElementById('cart-number-product');
                    if (badge) {
                        badge.textContent = data.total_quantity;
                    }

                    clearTimeout(alertTimeout);
                    alertTimeout = setTimeout(() => {
                        alertBox.style.display = 'none';
                    }, 2000);
                }
            });
        });
    </script>
</x-laptop-layout>
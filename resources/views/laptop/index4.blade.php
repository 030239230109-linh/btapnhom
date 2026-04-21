<x-laptop-layout>
    <x-slot name="title">
        Laptop
    </x-slot>

    <div style="margin:10px 0; display:flex; justify-content:space-between; align-items:center;">
        <div style="display:flex; gap:8px; align-items:center;">
            <span style="color:black; font-weight:bold;">Tìm kiếm theo</span>
            <a href="{{ url('laptop/loc?sapxep=gia-tang-dan') }}">
                <button class="btn btn-outline-dark btn-sm">Giá tăng dần</button>
            </a>
            <a href="{{ url('laptop/loc?sapxep=gia-giam-dan') }}">
                <button class="btn btn-outline-dark btn-sm">Giá giảm dần</button>
            </a>
        </div>

        <a href="{{ route('cart.page') }}" class="btn btn-primary btn-sm">
            Giỏ hàng
        </a>
    </div>

    <div class="list-laptop">
        @foreach($data as $row)
            <div class="laptop">
                <a href="{{ route('laptop.chitiet', $row->id) }}">
                    <img src="{{ asset('storage/image/' . $row->hinh_anh) }}"
                         style="width:100%; height:180px; object-fit:contain;"
                         alt="{{ $row->tieu_de }}">
                    <br>
                    <b>{{ $row->tieu_de }}</b><br/>
                    <i style="color:red; font-weight:bold;">
                        {{ number_format($row->gia, 0, ",", ".") }}đ
                    </i>
                </a>
            </div>
        @endforeach
    </div>
</x-laptop-layout>
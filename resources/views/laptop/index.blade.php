<x-laptop-layout>
    <x-slot name="title">
        Laptop
    </x-slot>

    {{-- SORT --}}
    <div style="margin:10px 0; display:flex; gap:8px; align-items:center; justify-content:center;">
        <span style="color:black; font-weight:bold;">Tìm kiếm theo</span>

        <a href="{{ url('laptop/loc?sapxep=gia-tang-dan') }}">
            <button type="button" class="btn btn-outline-dark btn-sm">Giá tăng dần</button>
        </a>

        <a href="{{ url('laptop/loc?sapxep=gia-giam-dan') }}">
            <button type="button" class="btn btn-outline-dark btn-sm">Giá giảm dần</button>
        </a>
    </div>

    {{-- LIST --}}
    <div class="list-laptop">
        @forelse($laptops as $row)
            <div class="laptop">
                <a href="{{ url('laptop/chitiet/' . $row->id) }}">

                    <img src="{{ asset('storage/image/' . ($row->hinh_anh ?? 'no-image.png')) }}" 
                         style="width:100%; height:180px; object-fit:contain;"
                         alt="{{ $row->tieu_de ?? 'Laptop' }}">

                    <br>

                    <b>{{ $row->tieu_de ?? 'Không có tên' }}</b><br/>

                    <i style="color:red; font-weight:bold;">
                        {{ number_format($row->gia ?? 0, 0, ",", ".") }}đ
                    </i>
                </a>
            </div>

        @empty
            <p style="text-align:center; width:100%;">Không có sản phẩm</p>
        @endforelse
    </div>
</x-laptop-layout>
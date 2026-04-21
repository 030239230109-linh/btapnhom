<x-laptop-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    Thông tin chi tiết Laptop
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex justify-center border p-4 rounded shadow-sm">
<img src="{{ asset('storage/image/' . $product->hinh_anh) }}" width="60">                             alt="{{ $product->ten }}" 
                             class="max-w-full h-auto object-cover">
                    </div>

                    <div>
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50 w-1/3">Tiêu đề</td>
                                    <td class="px-4 py-2">{{ $product->tieu_de }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">Giá bán</td>
                                    <td class="px-4 py-2 text-red-600 font-bold">
                                        {{ number_format($product->gia, 0, ',', '.') }} VNĐ
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">CPU</td>
                                    <td class="px-4 py-2">{{ $product->cpu }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">RAM</td>
                                    <td class="px-4 py-2">{{ $product->ram }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">Ổ cứng</td>
                                    <td class="px-4 py-2">{{ $product->luu_tru }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">Màu sắc</td>
                                    <td class="px-4 py-2">{{ $product->mau_sac }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">Khối lượng</td>
                                    <td class="px-4 py-2">{{ $product->khoi_luong }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 font-bold bg-gray-50">Bảo hành</td>
                                    <td class="px-4 py-2">{{ $product->bao_hanh }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('sanpham.index7') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Quay lại danh sách
                            </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-laptop-layout>
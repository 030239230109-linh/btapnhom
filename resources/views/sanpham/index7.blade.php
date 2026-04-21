<x-laptop-layout>
    <x-slot name="title">Quản Lý Sản Phẩm</x-slot>

    <div class="container-fluid mt-4">
        <h2 class="text-center text-primary mb-4 font-weight-bold">QUẢN LÝ SẢN PHẨM</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div id="customEntries">
                    </div>
                
                <div class="d-flex align-items-center">
                    <label class="me-2 mb-0">Search:</label>
                    <input type="text" id="customSearch" class="form-control" style="width: 250px;" placeholder="Tìm theo tên, CPU, RAM...">
                </div>
            </div>

            <table id="tableSanPham" class="table table-bordered table-striped align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Tiêu đề</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <th>Ổ cứng</th>
                        <th>Khối lượng</th>
                        <th>Nhu cầu</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th width="120px">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanPhams as $sp)
                    <tr>
                        <td class="small">{{ $sp->tieu_de }}</td>
                        <td class="small">{{ $sp->cpu }}</td>
                        <td class="small">{{ $sp->ram }}</td>
                        <td class="small">{{ $sp->luu_tru }}</td>
                        <td class="text-center">{{ $sp->khoi_luong }}</td>
                        <td class="text-center">{{ $sp->nhu_cau }}</td>
                        <td class="text-danger font-weight-bold text-end">
                            {{ number_format($sp->gia, 0, ',', '.') }} VNĐ
                        </td>
                        <td class="text-center">
<img src="{{ asset('storage/image/' . $sp->hinh_anh) }}" width="60">
                        </td>
                        <td class="text-center">
                            <div class="btn-group gap-1">
                                <a href="{{ route('sanpham.show', $sp->id) }}" class="btn btn-primary btn-sm rounded">Xem</a>
                                
                                <form action="{{ route('sanpham.destroy', $sp->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // Khởi tạo DataTable
            var table = $('#tableSanPham').DataTable({
                "dom": 'lrtip', // Ẩn ô search mặc định của thư viện
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/vi.json",
                    "search": "Tìm kiếm:"
                },
                "pageLength": 10,
                "ordering": true // Cho phép sắp xếp khi bấm vào tiêu đề cột
            });

            // Gắn sự kiện cho ô search tùy chỉnh của Linh
            $('#customSearch').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
    @endpush
</x-laptop-layout>
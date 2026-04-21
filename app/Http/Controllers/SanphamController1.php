<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham1;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SanPhamController1 extends Controller
{
    /**
     * 1. HIỂN THỊ DANH SÁCH SẢN PHẨM (Chỉ hiện status = 1)
     */
   public function index()
{
    // Lấy dữ liệu
    $products = SanPham1::where('status', 1)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

    // Trả về view với tên biến là sanPhams
    return view('sanpham.index7', [
        'sanPhams' => $products, // <-- Đổi 'products' thành 'sanPhams' ở đây
        'title'    => 'Quản lý sản phẩm'
    ]);
}

    /**
     * 2. XEM CHI TIẾT SẢN PHẨM
     */
    public function show($id)
    {
        // Tìm sản phẩm theo ID và phải có status = 1
        $product = SanPham1::where('status', 1)->findOrFail($id);

        return view('sanpham.show', [
            'product' => $product,
            'title'   => 'Thông tin chi tiết: ' . $product->ten
        ]);
    }

    /**
     * 3. HIỂN THỊ FORM THÊM MỚI
     */
    public function create()
    {
        // Lấy danh mục để đổ vào dropdown chọn hãng (Dell, HP, Asus...)
        $categories = Category::all();

        return view('sanpham.create', [
            'categories' => $categories,
            'title'      => 'Thêm Laptop mới vào hệ thống'
        ]);
    }

    /**
     * 4. LƯU DỮ LIỆU THÊM MỚI
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào theo cấu trúc bảng của Linh
        $request->validate([
            'tieu_de'   => 'required|max:255',
            'ten'       => 'required',
            'gia'       => 'required|numeric',
            'hinh_anh'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'id_danh_muc' => 'required|exists:danh_muc_laptop,id'
        ]);

        $fileName = null;
        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            // Đặt tên file theo timestamp để tránh trùng
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/image', $fileName);
        }

        // Tạo mới bản ghi
        SanPham1::create([
            'tieu_de'       => $request->tieu_de,
            'ten'           => $request->ten,
            'gia'           => $request->gia,
            'id_danh_muc'   => $request->id_danh_muc,
            'hinh_anh'      => $fileName,
            'cpu'           => $request->cpu,
            'ram'           => $request->ram,
            'luu_tru'       => $request->luu_tru,
            'mau_sac'       => $request->mau_sac,
            'khoi_luong'    => $request->khoi_luong,
            'bao_hanh'      => $request->bao_hanh,
            'status'        => 1 // Luôn mặc định là 1 khi tạo mới
        ]);

        return redirect()->route('sanpham.index7')->with('success', 'Thêm sản phẩm thành công!');
    }

    /**
     * 5. XÓA MỀM (Cập nhật status sang 0)
     */
    public function destroy($id)
    {
        $product = SanPham1::findOrFail($id);
        
        // Thay vì xóa khỏi DB, ta cập nhật trạng thái
        $product->update(['status' => 0]);

        return redirect()->route('sanpham.index7')->with('success', 'đã xóa');
    }
}
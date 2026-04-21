<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham1;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SanPhamController1 extends Controller
{
   public function index()
{
    $products = SanPham1::where('status', 1)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

    return view('sanpham.index7', [
        'sanPhams' => $products, 
        'title'    => 'Quản lý sản phẩm'
    ]);
}

    public function show($id)
    {
        $product = SanPham1::where('status', 1)->findOrFail($id);

        return view('sanpham.show', [
            'product' => $product,
            'title'   => 'Thông tin chi tiết: ' . $product->ten
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('sanpham.create', [
            'categories' => $categories,
            'title'      => 'Thêm Laptop mới vào hệ thống'
        ]);
    }

    public function store(Request $request)
    {
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
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/image', $fileName);
        }

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
            'status'        => 1 
        ]);

        return redirect()->route('sanpham.index7')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = SanPham1::findOrFail($id);
        
        $product->update(['status' => 0]);

        return redirect()->route('sanpham.index7')->with('success', 'đã xóa');
    }
}
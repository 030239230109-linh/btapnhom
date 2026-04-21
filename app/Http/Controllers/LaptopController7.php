<?php
namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Category;
use Illuminate\Http\Request;

class LaptopController7 extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort');  // Sử dụng get() thay vì trực tiếp $request->sort để an toàn

        $query = Laptop::query();  // Tạo một query mới từ model Laptop

        // Sắp xếp sản phẩm theo giá nếu có yêu cầu
        if ($sort == 'asc') {
            $query->orderBy('gia', 'asc');  // Giá tăng dần
        } elseif ($sort == 'desc') {
            $query->orderBy('gia', 'desc');  // Giá giảm dần
        }

        // Lấy 20 laptop
        $laptops = $query->limit(20)->get();

        // Lấy tất cả các danh mục (categories)
        $categories = Category::all();

        // Trả về view home và truyền vào dữ liệu laptops và categories
        return view('home', compact('laptops', 'categories'));
    }

    public function brand($id)
    {
        // Lọc laptop theo danh mục (id_danh_muc)
        $laptops = Laptop::where('id', $id)->get();

        // Lấy tất cả các danh mục (categories)
        $categories = Category::all();

        // Trả về view home và truyền vào dữ liệu laptops và categories
        return view('home', compact('laptops', 'categories'));
    }
}
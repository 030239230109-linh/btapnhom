<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController5 extends Controller
{
    public function index(){
        return view("laptop.index");
    }

    //Câu 5: Tìm kiếm laptop theo tiêu đề, tên, CPU, chip đồ họa
    public function search(Request $request)
    {
        $keyword = $request->input('keyword', '');

        // Câu 5: Tìm kiếm laptop 
        $laptops = DB::table('san_pham')
                    ->where('tieu_de', 'LIKE', '%' . $keyword . '%')
                    ->get();

        return view('laptop.search-results', compact('laptops', 'keyword'));
    }
}
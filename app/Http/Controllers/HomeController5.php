<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController5 extends Controller
{

    //Câu 5: Tìm kiếm laptop theo tiêu đề, tên, CPU, chip đồ họa
    public function search(Request $request)
    {
        $keyword = $request->input('keyword', '');

        // Câu 5: Tìm kiếm laptop 
        $data = DB::table('san_pham')
                    ->where('tieu_de', 'LIKE', '%' . $keyword . '%')
                    ->get();

        return view('laptop.index2', compact('data', 'keyword'));
    }
}
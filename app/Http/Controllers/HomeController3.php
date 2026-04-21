<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController3 extends Controller
{
    //
    public function index(){
        return view("laptop.index");
    }

    public function chitiet($id) {
        $result = DB::select("select * from san_pham where id = ?", [$id]);
        
        if (empty($result)) {
            abort(404);
        }
        
        $data = $result[0];
        return view('laptop.chitiet', compact('data'));
    }
}

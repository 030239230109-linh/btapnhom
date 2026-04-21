<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController2 extends Controller
{
    //
    public function index(){
        return view("laptop.index");
    }

        public function laptop(){
        $data = DB::table('san_pham')->limit(20)->get();
        return view("laptop.index2", compact("data"));
    }

    function theloai($id){
        $data = DB::select("
            SELECT san_pham.* 
            FROM san_pham 
            WHERE id_danh_muc = ?
        ", [$id]);
        return view("laptop.index2", compact("data"));
    }

    function loc() {
        $sapxep = request('sapxep');
        $filter = request('filter');

        $query = DB::table('san_pham');

        if ($sapxep == 'gia-tang-dan') {
            $query->orderBy('gia', 'ASC');
        } elseif ($sapxep == 'gia-giam-dan') {
            $query->orderBy('gia', 'DESC');
        }

        $data = $query->get();
        return view("laptop.index2", compact("data"));
    }
}

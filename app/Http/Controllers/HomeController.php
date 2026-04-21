<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Category;

class HomeController extends Controller
{
    public function trangchu(Request $request)
    {
        $laptops = Laptop::all();
        $categories = Category::all();

        return view('home', compact('laptops', 'categories'));
    }
}
class HomeController extends Controller
{
    //
    public function index(){
        return view("laptop.index");
    }
}


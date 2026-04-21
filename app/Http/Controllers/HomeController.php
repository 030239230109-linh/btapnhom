<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
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
=======

class HomeController extends Controller
{
    //
    public function index(){
        return view("laptop.index");
    }
}
>>>>>>> 5f4529c49185684ac89b7d7ba76a73c6221ab8b6

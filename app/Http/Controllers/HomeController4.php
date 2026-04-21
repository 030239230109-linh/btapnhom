<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderSuccessMail;

class HomeController4 extends Controller
{
    public function index4()
    {
        $data = DB::table('san_pham')->get();
        return view('laptop.index4', compact('data'));
    }

    public function chitiet($id)
    {
        $data = DB::table('san_pham')->where('id', $id)->first();

        if (!$data) {
            abort(404);
        }

        return view('laptop.chitiet', compact('data'));
    }

    public function addCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = (int) $request->quantity;

        if ($quantity < 1) {
            $quantity = 1;
        }

        $product = DB::table('san_pham')->where('id', $productId)->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại'
            ]);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'tieu_de' => $product->tieu_de,
                'gia' => $product->gia,
                'hinh_anh' => $product->hinh_anh,
                'quantity' => $quantity
            ];
        }

        session()->put('cart', $cart);

        $totalQuantity = count($cart);

        return response()->json([
            'success' => true,
            'total_quantity' => $totalQuantity
        ]);
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('laptop.cart', compact('cart'));
    }

    public function deleteCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.page')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

    public function order(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.page')->with('success', 'Giỏ hàng trống');
        }

        $user = Auth::user();

        Mail::to($user->email)->send(new OrderSuccessMail($user, $cart));

        session()->forget('cart');

        return redirect()->route('cart.page')->with('success', 'Đặt hàng thành công, email đã được gửi');
    }
}
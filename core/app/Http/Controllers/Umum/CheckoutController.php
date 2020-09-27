<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukVariasi;
use App\Models\Cart;
use App\Models\Alamat;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cart = Cart::whereIn('id', $request->c_id)->with('bisnis:id,nama')->orderBy('updated_at', 'DESC')->get();
        $total_belanja = currency_frm($cart->sum('sub_total'));

        $cart = $cart->groupBy(function ($bisnis) {
            return $bisnis->bisnis_id.'-'.$bisnis->bisnis->nama;
        })->all();

        $alamat = Alamat::where('user_id', auth()->guard('web')->user()->id)->where('is_utama', 1)->first();

        return view('umum.cart.checkout', compact('cart', 'alamat', 'total_belanja'));
    }

    public function simpan(Request $request)
    {
        dd($request->all());
    }
}

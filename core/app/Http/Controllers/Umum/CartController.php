<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukVariasi;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $cart = Cart::where('user_id', auth()->guard('web')->user()->id)->with('bisnis:id,nama')->orderBy('updated_at', 'DESC')->get();
        // dd($cart->toArray());
        $cart = $cart->groupBy(function ($bisnis) {
            return $bisnis->bisnis_id.'-'.$bisnis->bisnis->nama;
        })->all();
        return view('umum.cart.index', compact('cart'));
    }

    public function checkout(Request $request)
    {
        // dd($request->all());
        $cart = Cart::whereIn('id', $request->c_id)->with('bisnis:id,nama')->orderBy('updated_at', 'DESC')->get();
        $cart = $cart->groupBy(function ($bisnis) {
            return $bisnis->bisnis_id.'-'.$bisnis->bisnis->nama;
        })->all();
        return view('umum.cart.checkout', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        DB::beginTransaction();
        try{
            $user = auth()->guard('web')->user()->id;
            if($request->has_variasi === '1')
            {
                $variant = $request->var1.'-'.$request->var2;
                $produk = ProdukVariasi::where('variant', $variant)->where('produk_id', $request->id)->first();
            }else{
                $produk = ProdukVariasi::where('produk_id', $request->id)->first();
                // $cart = array(
                //     'produk_id' => $produk->produk_id,
                //     'user_id' => $user,
                //     'qty' => $request->quantity,
                //     'harga' => $produk->harga,
                //     'variasi_id' => $produk->id,
                //     'bisnis_id' => $produk->produk->bisnis_id
                // );
            }

            $cart = Cart::updateOrCreate(
                ['user_id' => $user, 'produk_id' => $produk->produk_id, 'variasi_id' => $produk->id],
                ['qty' => $request->quantity, 'harga' => $produk->harga, 'bisnis_id' => $produk->produk->bisnis_id]
            );

        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'pesan' => $e,
            ]);
        }
        DB::commit();
        return response()->json([
            'fail' => false,
            'total' => $request->quantity,
        ]);
    }

    public function updateQuantity(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try{
            $cart = Cart::find($request->cart_id);
            $cart->qty = $request->qty;
            $cart->save();
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'pesan' => $e,
            ]);
        }
        DB::commit();
        return response()->json([
            'fail' => false,
            'total' => $cart->qty,
        ]);
    }

}

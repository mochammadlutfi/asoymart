<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukVariasi;
use App\Models\Cart;
use App\Models\Alamat;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Kavist\RajaOngkir\Facades\RajaOngkir;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request->isMethod('post')) {

            Session::put('cart', $request->c_id);
            $cart_id = $request->c_id;
        }else if($request->isMethod('get')){
            if(Session::has('cart') && count(Session::get('cart')) > 0){
               $cart_id = Session::get('cart');
            }else{
                return redirect()->route('cart');
            }
        }

        $cart = Cart::whereIn('id', $cart_id)->with('bisnis:id,nama')->orderBy('updated_at', 'DESC')->get();
        $total_belanja = $cart->sum('sub_total');

        $cart = $cart->groupBy(function ($bisnis) {
            return $bisnis->bisnis_id.'-'.$bisnis->bisnis->nama;
        })->all();

        $alamat = Alamat::where('user_id', auth()->guard('web')->user()->id)->where('is_utama', 1)->first();

        return view('umum.cart.checkout', compact('cart', 'alamat', 'total_belanja'));
    }

    public function simpan(Request $request)
    {
        DB::beginTransaction();
        try{
            $user_id = auth()->guard('web')->user()->id;
            $order = new Order();
            $order->status = 'dipesan';
            $order->bayar_status = 'unpaid';
            $order->user_id = $user_id;
            $order->invoice_no = '12';
            $order->final_total = $request->total;
            $order->tgl_transaksi = Carbon::now()->toDateTimeString();
            $order->save();

            $produkCart = Cart::whereIn('id', $request->session()->get('cart'))->with('bisnis:id,nama')->orderBy('updated_at', 'DESC');

            foreach($produkCart->get() as $item)
            {
                $orderItem = new OrderDetail();
                $orderItem->order_id = $order->id;
                $orderItem->bisnis_id = $item->bisnis_id;
                $orderItem->produk_id = $item->produk_id;
                $orderItem->variasi_id = $item->variasi_id;
                $orderItem->harga = $item->harga;
                $orderItem->qty = $item->qty;
                $orderItem->sub_total = $item->sub_total;
                $orderItem->save();
            }
            $produkCart->delete();
            Session::forget('cart');

        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'pesan' => 'gagal',
                'log' => $e,
            ]);
        }
        DB::commit();

        return response()->json([
            'fail' => false,
        ]);
    }
}

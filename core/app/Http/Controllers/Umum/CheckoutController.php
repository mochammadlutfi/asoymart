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
use Midtrans\Config as Config;
use Midtrans\CoreApi as Midtrans;
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

    public function pembayaran(Request $request)
    {
        $data = array(
            'alamat' => $request->alamat,
            'total' => $request->total,
        );
        Session::put('checkout', $data);
        return view('umum.cart.pembayaran', compact('data'));
    }

    public function simpan(Request $request)
    {
        DB::beginTransaction();
        try{

            $checkout = Session::get('checkout');

            $user_id = auth()->guard('web')->user()->id;

            $order_data = array(
                'status' => 'dipesan',
                'bayar_status' => 'unpaid',
                'user_id' => $user_id,
                'invoice_no' => getInvoice(),
                'final_total' => $checkout['total'],
                'alamat_kirim' => json_encode($checkout['alamat']),
                'tgl_transaksi' => Carbon::now()->toDateTimeString(),
            );

            $order = Order::create($order_data);
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

    public function bayar()
    {
       Config::$serverKey = 'SB-Mid-server-3BbNpq3n04Z_E_4XNcLw5_DP';
       Config::$clientKey = "SB-Mid-client-LI78HrfmB5ouletb";
       Config::$isProduction = false;
       Config::$isSanitized = true;
       Config::$is3ds = true;
    //    return view('coba');
       $items = array(
            array(
                'id'       => 'item1',
                'price'    => 100000,
                'quantity' => 1,
                'name'     => 'Adidas f50'
            ),
            array(
                'id'       => 'item2',
                'price'    => 50000,
                'quantity' => 2,
                'name'     => 'Nike N90'
            )
        );

    //     // Populate customer's billing address
    //     $billing_address = array(
    //         'first_name'   => "Andri",
    //         'last_name'    => "Setiawan",
    //         'address'      => "Karet Belakang 15A, Setiabudi.",
    //         'city'         => "Jakarta",
    //         'postal_code'  => "51161",
    //         'phone'        => "081322311801",
    //         'country_code' => 'IDN'
    //     );

    //     // Create transaction summary
        // $transaction_details = array(
        //     'order_id'    => ,
        //     'gross_amount'  => 200000
        // );

    //     // Token ID from checkout page
    //     $token_id = app('request')->token_id;
    //     // Transaction data to be sent
        $transaction_data = array(
            'payment_type' => 'bank_transfer',
            'bank_transfer'  => array(
                'bank' => 'bca',
                "va_number" => "089656466525",
            ),
            'transaction_details' => $transaction_details,
        );

        // do charge
        $response = Midtrans::charge($transaction_data);
        dd($response);
    }
}

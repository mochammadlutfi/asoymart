<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Produk;
use App\Models\VariasiDetail;
use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiBayar;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\TransaksiRepository;
use App\Utils\ProdukUtil;
use App\Utils\PenjualanUtil;
class POSController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    private $transaksiRepo;
    public function __construct(
        TransaksiRepository $transaksiRepo,
        ProdukUtil $produkUtil,
        PenjualanUtil $penjualanUtil
    )
    {
        $this->middleware('auth:mitra');
        $this->transaksiRepo = $transaksiRepo;
        $this->penjualan = $penjualanUtil;
        $this->ProdukUtil = $produkUtil;
    }


    public function index()
    {

        $kategori = Kategori::orderBy('nama', 'DESC')->get();
        $merk     = Merk::orderBy('nama', 'DESC')->get();
        $penjualan = Cart::session(Session::get('bisnis.outlet_id').'-penjualan');
        // $penjualan->clear();
        return view('mitra.penjualan.pos', compact(
            'kategori',
            'merk'
        ));
    }

    public function detail($transaksi_id)
    {
        $transaksi = $this->transaksiRepo->find($transaksi_id);
        $produk = $this->transaksiRepo->getPenjualanItems($transaksi_id);
        $pembayaran = $this->transaksiRepo->getBayar($transaksi_id);
        return view('mitra.penjualan.detail',compact(
            'transaksi',
            'produk',
            'pembayaran'
        ));
    }

    public function riwayat(Request $request){

        if($request->ajax())
        {
            $start = $request->get('tgl_mulai');
            $end = $request->get('tgl_akhir');
            $query = $request->get('query');
            $penjualan_kotor = $this->transaksiRepo->getPenjualanKotor($start, $end);
            $data = $this->transaksiRepo->getPenjualan(2, $start, $end);
            return response()->json([
                'penjualan_kotor' => $penjualan_kotor,
                'total_transaksi' => $data->total(),
                'html' => view('mitra.penjualan.include.riwayat_data', compact('data'))->render(),
            ]);
        }

        $start = Carbon::now()->startOfWeek();
        $end =  Carbon::now()->endOfWeek();
        $data = $this->transaksiRepo->getPenjualan(2, $start, $end);
        $penjualan_kotor = $this->transaksiRepo->getPenjualanKotor($start, $end);
        $total_transaksi = $data->total();

        return view('mitra.penjualan.riwayat', compact('data', 'total_transaksi', 'penjualan_kotor'));
    }

    public function getCart()
    {
        $session = Session::get('bisnis.outlet_id').'-penjualan';
        $penjualan = Cart::session($session);
        return response()->json([
            'fail' => false,
            'row_cart' => getCartCount('penjualan'),
            'total' => $penjualan->getTotal(),
            'sub_total' => $penjualan->getSubTotal(),
            'html' => view('mitra.penjualan.include.cart')->render(),
        ]);
    }

    public function addCart(Request $request)
    {
        if($request->ajax())
        {
            $penjualan = Cart::session(Session::get('bisnis.outlet_id').'-penjualan');
            $row_cart = $request->row_cart;
            for ($i = 0; $i < count($request->produk); $i++)
            {
                if($request->produk[$i]['qty'] > 0)
                {
                    if ($penjualan->has($request->produk[$i]['variasi_id'])) {
                        $penjualan->update($request->produk[$i]['variasi_id'], [
                            'quantity' => array(
                                'relative' => false,
                                'value' => $request->produk[$i]['qty']
                            ),
                        ]);
                    }else{
                        $data = array(
                            'id' => $request->produk[$i]['variasi_id'],
                            'name' => $request->produk[$i]['produk_nama'].', '.$request->produk[$i]['variasi_nama'],
                            'price' => $request->produk[$i]['hrg'],
                            'quantity' => $request->produk[$i]['qty'],
                            'attributes' => array(
                                'produk_id' =>$request->produk[$i]['produk_id'],
                                'kelola_stok' =>$request->produk[$i]['kelola_stok'],
                            )
                        );
                        $penjualan->add($data);
                        $row_cart += 1;
                    }
                }else{
                    $penjualan->remove($request->produk[$i]['variasi_id']);
                }
            }
            return response()->json([
                'fail' => false,
                'row_cart' => $row_cart,
                'total' => $penjualan->getTotal(),
                'sub_total' => $penjualan->getSubTotal(),
                'html' => view('mitra.penjualan.include.cart')->render(),
            ]);
        }
    }

    public function updateCart(Request $request)
    {
        if (request()->ajax()) {
            $data = array();
            $data['quantity'] = array(
                'relative' => false,
                'value' => $request->qty
            );
            if($request->hrg <> '')
            {
                $data['price'] = $request->hrg;
            }
            if($request->diskon_val == 'tetap')
            {

            }else{

            }
            $penjualan = Cart::session(Session::get('bisnis.outlet_id').'-penjualan');
            $penjualan->update($request->ubah_variasi_id,$data);
            return response()->json([
                'fail' => false,
                'row_cart' => getCartCount('penjualan'),
                'total' => $penjualan->getTotal(),
                'sub_total' => $penjualan->getSubTotal(),
                'html' => view('mitra.penjualan.include.cart')->render(),
            ]);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->ajax())
        {
            $penjualan = Cart::session(Session::get('bisnis.outlet_id').'-penjualan');
            $hapus = $penjualan->remove($request->variasi_id);
            if($hapus)
            {
                return response()->json([
                    'fail' => false,
                    'row_cart' => getCartCount('penjualan'),
                    'total' => $penjualan->getTotal(),
                    'sub_total' => $penjualan->getSubTotal(),
                    'html' => view('mitra.penjualan.include.cart')->render(),
                ]);
            }
        }
    }

    public function checkout(Request $request)
    {
        $toko_id = auth()->guard('mitra')->user()->toko_id;
        if($request->pelanggan == 0)
        {
            $pelanggan = null;
        }else{
            $pelanggan = $request->pelanggan;
        }

        DB::beginTransaction();
        try{
            $trans = array(
                'tipe' => 'jual',
                'status'=> 'final',
                'bayar_status' => 'Lunas',
                'pelanggan_id' => $pelanggan,
                'invoice_id' => '',
                'ref_no' => '',
                'total' => $request->sub_total,
                'tgl_transaksi' => Carbon::now(),
                'jenis_diskon' => $request->jenis_diskon,
                'nilai_diskon' => $request->diskon,
                'keterangan' => '',
                'final_total' => $request->final_total,
            );
            $transaksi = $this->transaksiRepo->transaksiCreate($trans);

            // Insert Data Pembayaran
            $bayar = array(
                'transaksi_id' => $transaksi->id,
                'method' => 'Tunai',
                'jumlah'=> $request->uang_diterima,
                'note' => $request->note_bayar,
            );

            $pembayaran = $this->transaksiRepo->bayarCreate($bayar);

            $this->penjualan->PenjualanCreateUpdate($transaksi, $request->penjualan);

            // Kurangi Stok
            foreach ($request->penjualan as $produk) {
                $decrease_qty = $produk['qty'];
                if ($produk['kelola_stok'] == 1) {
                    VariasiDetail::where('variasi_id', $produk['variasi_id'])
                    ->where('produk_id', $produk['produk_id'])
                    ->where('outlet_id', Session::get('bisnis.outlet_id'))
                    ->decrement('qty_tersedia', $produk['qty']);
                }
            }
        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                // 'pesan' => 'Error Menyimpan Data',
                'pesan' => $e,
            ]);
        }
        DB::commit();
        Cart::session(Session::get('bisnis.outlet_id').'-penjualan')->clear();
        return response()->json([
            'fail' => false,
        ]);
    }
}

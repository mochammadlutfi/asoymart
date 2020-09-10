<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Produk;
use App\Models\Merk;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\TransaksiRepository;
use App\Utils\ProdukUtil;
use App\Utils\TransaksiUtil;

class ReturBeliController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    private $transaksiRepo;
    // private $transaksiUtil;
    public function __construct(
        TransaksiRepository $transaksiRepo, ProdukUtil $produkUtil, TransaksiUtil $transaksiUtil
    )
    {
        $this->middleware('auth:mitra');
        $this->transaksiRepo = $transaksiRepo;
        $this->produkUtil = $produkUtil;
        $this->transaksiUtil = $transaksiUtil;
    }

    /**
     * Menampilkan data riwayat retur pembelian produk berdasarkan periode waktu tertentu.
     * Waktu default adalah transaksi selama 7 hari (1 minggu) terakhir
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       if($request->ajax())
       {
            $start = Carbon::parse($request->get('tgl_mulai'))->startOfDay();
            $end = Carbon::parse($request->get('tgl_akhir'))->endOfDay();
            $outlet = $request->get('query');
            $pembayaran = $request->get('query');
            $status = $request->get('query');

            $jml_pembelian = $this->transaksiRepo->getReturJumlahPembelian($start, $end);
            $data = $this->transaksiRepo->getReturPembelian(2, $start, $end);
            return response()->json([
                'jml_pembelian' => $jml_pembelian,
                'total_transaksi' => $data->total(),
                'html' => view('mitra.returbeli.include.riwayat_data', compact('data'))->render(),
            ]);
       }

       $start = Carbon::now()->startOfWeek();
       $end =  Carbon::now()->endOfWeek();
       $data = $this->transaksiRepo->getReturPembelian(2, $start, $end);
       $jml_pembelian = $this->transaksiRepo->getReturJumlahPembelian($start, $end);
       $total_transaksi = $data->total();

       return view('mitra.returbeli.riwayat', compact('data', 'total_transaksi', 'jml_pembelian'));
   }

    /**
     * Show Riwayat Penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(){
        return view('mitra.returbeli.tambah');
    }

    public function simpan(Request $request)
    {
        // if (!auth()->user()->can('purchase.update')) {
        //     abort(403, 'Unauthorized action.');
        // }
        // dd($request->all());
        $rules = [
            'supplier' => 'required',
            'outlet' => 'required',
        ];

        $pesan = [
            'supplier.required' => 'Supplier Wajib Diisi!',
            'outlet.required' => 'Outlet Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            DB::beginTransaction();
            try{
                // $input_data = $request->only([ 'location_id', 'transaction_date', 'final_total', 'ref_no',
                //     'tax_id', 'tax_amount', 'contact_id']);

                //Cek Status Paket
                // if (!$this->moduleUtil->isSubscribed($business_id)) {
                //     return $this->moduleUtil->expiredResponse();
                // }

                $bisnis_id = $request->session()->get('bisnis.bisnis_id');
                $mitra_id = $request->session()->get('mitra.id');

                $input_data['tipe'] = 'retur_beli';
                $input_data['bisnis_id'] = $bisnis_id;
                $input_data['outlet_id'] = $request->outlet;
                $input_data['tgl_transaksi'] = uf_date($request->tgl_transaksi, false);
                $input_data['total'] = $request->sub_total;
                $input_data['final_total'] = $request->sub_total;
                $input_data['dibuat_oleh'] = $mitra_id;

                //Update reference count
                // $ref_count = $this->productUtil->setAndGetReferenceCount('purchase_return');
                //Generate reference number
                // if (empty($input_data['ref_no'])) {
                //     $input_data['ref_no'] = $this->productUtil->generateReferenceNumber('purchase_return', $ref_count);
                // }

                //upload document
                // $input_data['document'] = $this->productUtil->uploadFile($request, 'document', 'documents');

                $produk = $request->retur;

                if (!empty($produk)) {
                    $produk_data = [];
                    foreach ($produk as $p) {
                        $line_retur = [
                            'produk_id' => $p['produk_id'],
                            'variasi_id' => $p['variasi_id'],
                            'quantity' => 0,
                            'hrg_beli' => $p['harga'],
                            'sub_total' => $p['total'],
                            'qty_retur' => $p['qty'],
                        ];
                        $produk_data[] = $line_retur;
                        //Kurangi Stok Tersedia
                        $this->produkUtil->decreaseProdukQty(
                            $p['produk_id'],
                            $p['variasi_id'],
                            $request->outlet,
                            $p['qty']
                        );
                    }

                    $returbeli = Transaksi::create($input_data);
                    $returbeli->pembelian()->createMany($produk_data);

                    //update status pembayaran
                    $this->transaksiUtil->updateStatusPembayaran($returbeli->id, $returbeli->final_total);
                }
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
            ]);
        }
    }

    public function addCart(Request $request)
    {
        // dd($request->all());
        if (request()->ajax()) {
            $returbeli = Cart::session(Session::get('bisnis.outlet_id').'-returbeli');
            $session = Session::get('bisnis.outlet_id').'-returbeli';
            $row_count = $request->row_count;
            for ($i = 0; $i < count($request->produk); $i++)
            {
                if($request->produk[$i]['qty'] > 0)
                {
                    if ($returbeli->has($request->produk[$i]['variasi_id'])) {
                        Cart::session($session)->update($request->produk[$i]['variasi_id'], [
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
                        if($request->produk[$i]['kelola_stok'] == 1)
                        {
                            $data['attributes']['satuan_id'] = $request->produk[$i]['satuan_id'];
                            $data['attributes']['satuan_nama'] = $request->produk[$i]['satuan_nama'];
                        }
                        $returbeli->add($data);
                    }
                }else{
                    $returbeli->remove($request->produk[$i]['variasi_id']);
                }
            }
                return response()->json([
                    'fail' => false,
                    'total_item' => getCartCount('returbeli'),
                    'total' => Cart::session($session)->getTotal(),
                    'sub_total' => Cart::session($session)->getSubTotal(),
                    'html' => view('mitra.returbeli.include.entry_row')->render(),
                ]);
        }
    }

    public function updateCart(Request $request)
    {
        if (request()->ajax()) {
            $returbeli = Cart::session(Session::get('bisnis.outlet_id').'-returbeli');
            $update = $returbeli->update($request->variasi_id,[
                'quantity' =>array(
                    'relative' => false,
                    'value' => $request->qty
                ),
                'price' => $request->hrg
            ]);

            return response()->json([
                'fail' => false,
                'total_item' => getCartCount('pembelian'),
                'total' => Cart::session(Session::get('bisnis.outlet_id').'-returbeli')->getTotal(),
                'sub_total' => Cart::session(Session::get('bisnis.outlet_id').'-returbeli')->getSubTotal(),
                'html' => view('mitra.returbeli.include.entry_row')->render(),
            ]);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->ajax())
        {
            $returbeli = Cart::session(Session::get('bisnis.outlet_id').'-returbeli');
            $hapus = $returbeli->remove($request->variasi_id);
            if($hapus)
            {
                return response()->json([
                    'fail' => false,
                    'total_item' => getCartCount('returbeli'),
                    'total' => $returbeli->getTotal(),
                    'sub_total' => $returbeli->getSubTotal(),
                    'html' => view('mitra.returbeli.include.entry_row')->render(),
                ]);
            }
        }
    }

    public function getCart()
    {
        $returbeli = Cart::session(Session::get('bisnis.outlet_id').'-returbeli');
        return response()->json([
            'fail' => false,
            'total_item' => getCartCount('returbeli'),
            'total' => $returbeli->getTotal(),
            'sub_total' => $returbeli->getSubTotal(),
            'html' => view('mitra.returbeli.include.entry_row')->render(),
        ]);
    }

    public function getProduk(Request $request)
    {
        if($request->ajax())
        {
            $kategori_id = $request->get('kategori_id');
            $merk_id = $request->get('merk_id');
            $cari = $request->get('cari');
            $bisnis_id = Session::get('bisnis.bisnis_id');
            $outlet_id = Session::get('bisnis.outlet_id');

            $produk = Produk::where('bisnis_id', $bisnis_id)
            ->where('kategori_id', 'like', '%' . $kategori_id . '%')
            ->where('merk_id', 'like', '%' . $merk_id . '%')
            ->where('nama', 'like', '%' . $cari . '%')
            ->paginate(6);

            return response()->json([
                'fail' => false,
                'html' => view('mitra.returbeli.include.produk_list', compact('produk'))->render(),
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Storage;
use Session;
use Illuminate\Support\Facades\DB;
use Cart;
use Carbon\Carbon;
use App\Repository\Eloquent\TransaksiRepository;
use App\Utils\ProdukUtil;
class PembelianController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    private $transaksiRepo;
    public function __construct(
        TransaksiRepository $transaksiRepo, ProdukUtil $produkUtil
    )
    {
        $this->middleware('auth:mitra');
        $this->transaksiRepo = $transaksiRepo;
        $this->produkUtil = $produkUtil;
    }

    /**
     * Menampilkan data riwayat pembelian berdasarkan periode waktu tertentu.
     * Waktu default adalah transaksi selama 7 hari (1 minggu) terakhir
     *
     * @return \Illuminate\Http\Response
     */
     public function riwayat(Request $request)
     {

        if($request->ajax())
        {
            // dd($request->all());
            $start = $request->get('tgl_mulai');
            $end = $request->get('tgl_akhir');
            $query = $request->get('query');

            $jml_pembelian = $this->transaksiRepo->getJumlahPembelian($start, $end);
            $data = $this->transaksiRepo->getPembelian(2, $start, $end);
            return response()->json([
                'jml_pembelian' => $jml_pembelian,
                'total_transaksi' => $data->total(),
                'html' => view('mitra.pembelian.include.riwayat_data', compact('data'))->render(),
            ]);
        }

        $start = Carbon::now()->startOfWeek();
        $end =  Carbon::now()->endOfWeek();
        $data = $this->transaksiRepo->getPembelian(2, $start, $end);
        $jml_pembelian = $this->transaksiRepo->getJumlahPembelian($start, $end);
        $total_transaksi = $data->total();

        return view('mitra.pembelian.riwayat', compact('data', 'total_transaksi', 'jml_pembelian'));
    }


    public function index()
    {
        Cart::session(Session::get('bisnis.bisnis_id').'-pembelian')->clear();
        return view('mitra.pembelian.form');
    }

    public function simpan(Request $request)
    {
        $rules = [
            'supplier' => 'required',
            'tgl_transaksi' => 'required',
            'status' => 'required',
            'jenis_pembayaran' => 'required',
            'jml_bayar' => 'required',
        ];

        $pesan = [
            'supplier.required' => 'Supplier Wajib Diisi!',
            'tgl_transaksi.required' => 'Tanggal Pembelian Wajib Diisi!',
            'status.required' => 'Status Pembelian Wajib Diisi!',
            'jenis_pembayaran.required' => 'Jenis Pembayaran Wajib Diisi!',
            'jml_bayar.required' => 'Jumlah Pembayaran Wajib Diisi!',

        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            if($request->jml_bayar >= $request->final_total)
            {
                $status_pembayaran = 'Lunas';
            }else if($request->jml_bayar < $request->final_total)
            {
                $status_pembayaran = 'Sebagian';
            }else{
                $status_pembayaran = 'Belum Dibayar';
            }
            DB::beginTransaction();
            try{

                // Simpan Data Transakasi
                $trans = array(
                    'tipe' => 'beli',
                    'status'=> $request->status,
                    'bayar_status' => $status_pembayaran,
                    'supplier_id' => $request->supplier,
                    'tgl_transaksi' => uf_date($request->tgl_transaksi, false),
                    'total' => $request->sub_total,
                    'diskon_tipe' => $request->jenis_diskon,
                    'diskon_nilai' => $request->diskon,
                    'final_total' => $request->final_total,
                );
                $transaksi = $this->transaksiRepo->transaksiCreate($trans);

                // Simpan Data Pembayaran
                $bayar = array(
                    'transaksi_id' => $transaksi->id,
                    'method' => $request->jenis_pembayaran,
                    'jumlah'=> $request->jml_bayar,
                    'note' => $request->note_bayar,
                );

                $pembayaran = $this->transaksiRepo->bayarCreate($bayar);

                // Simpan Data Pembelian
                $this->produkUtil->createOrUpdatePembelian($transaksi, $request->pembelian);

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    // 'pesan' => 'Data Gagal Diproses!',
                    'pesan' => $e
                ]);
            }

            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($transaksi_id)
    {
        Cart::session(Session::get('bisnis.bisnis_id').'-pembelian')->clear();
        $transaksi = $this->transaksiRepo->find($transaksi_id);
        $produk = $this->transaksiRepo->getPembelianItems($transaksi_id);
        foreach($produk as $p)
        {
            if($p->variasi->nama !== '')
            {
                $nama = $p->variasi->produk->nama.', '.$p->variasi->nama;
            }else{
                $nama = $p->variasi->produk->nama;
            }
            $data = array(
                'id' => $p->variasi_id,
                'name' => $nama,
                'price' => $p->hrg_beli,
                'quantity' => $p->quantity,
                'attributes' => array(
                    'produk_id' => $p->produk_id,
                    'kelola_stok' => $p->variasi->kelola_stok,
                )
            );
            if($p->variasi->kelola_stok == 1)
            {
                $data['attributes']['satuan_id'] = $p->variasi->satuan_id;
                $data['attributes']['satuan_nama'] = $p->variasi->satuan->nama;
                $data['attributes']['pembelian_id'] = $p->id;
            }
            Cart::session(Session::get('bisnis.outlet_id').'-pembelian')->add($data);
        }

        $pembayaran = $this->transaksiRepo->getBayar($transaksi_id);
        return view('mitra.pembelian.edit', compact('transaksi', 'produk', 'pembayaran'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'alamat' => 'required',
        ];

        $pesan = [
            'nik.required' => 'NIK Wajib Diisi!',
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'jk.required' => 'Jenis Kelamin Wajib Diisi!',
            'pekerjaan.required' => 'Pekerjaan Wajib Diisi!',
            'tmp_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'kecamatan.required' => 'Kecamatan Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
            'rt.required' => 'RT/RW Wajib Diisi!',
            'rw.required' => 'RT/RW Wajib Diisi!',
            'alamat.required' => 'Alamat Lengkap Wajib Diisi!',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            if(!empty($request->file('foto')))
            {
                $foto_file = $request->file('foto');
                $foto = Storage::disk('public')->put('foto', $foto_file);
            }

            $data = Penyewa::find($request->penyewa_id);
            $data->nik = $request->nik;
            $data->nama = $request->nama;
            $data->pekerjaan = $request->pekerjaan;
            $data->jk = $request->jk;
            $data->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));
            $data->tmp_lahir = $request->tmp_lahir;
            $data->id_kecamatan = $request->kecamatan;
            $data->id_kelurahan = $request->kelurahan;
            $data->rt = $request->rt;
            $data->rw = $request->rw;
            $data->alamat = $request->alamat;
            if(!empty($request->file('foto')))
            {
                $data->foto = $foto;
            }
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                    'url' => route('penyewa')
                ]);
            }
        }
    }

    public function detail($transaksi_id)
    {
        $transaksi = $this->transaksiRepo->find($transaksi_id);
        $produk = $this->transaksiRepo->getPembelianItems($transaksi_id);
        $pembayaran = $this->transaksiRepo->getBayar($transaksi_id);

        return view('mitra.pembelian.detail', compact('transaksi', 'produk', 'pembayaran'));
    }

    public function hapus($id)
    {
        $trans = Transaksi::where('kd_faktur', $id)->first();
        $del = Transaksi::destroy($trans->transaksi_id);
        if($del){
            $data = Pembelian::destroy($id);
            if($data){
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function addCart(Request $request)
    {
        if (request()->ajax()) {
            $pembelian = Cart::session(Session::get('bisnis.outlet_id').'-pembelian');
            $row_count = $request->row_count;
            for ($i = 0; $i < count($request->produk); $i++)
            {
                if($request->produk[$i]['qty'] > 0)
                {
                    if ($pembelian->has($request->produk[$i]['variasi_id'])) {
                        Cart::update($request->produk[$i]['variasi_id'], [
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
                        $pembelian->add($data);
                        // $pembelian->add(array(
                        //     'id' => $request->produk[$i]['variasi_id'],
                        //     'name' => $request->produk[$i]['produk_nama'].', '.$request->produk[$i]['variasi_nama'],
                        //     'price' => $request->produk[$i]['hrg'],
                        //     'quantity' => $request->produk[$i]['qty'],
                        //     'attributes' => array(
                        //         'satuan_id' => $request->produk[$i]['satuan_id'],
                        //         'satuan_nama' => $request->produk[$i]['satuan_nama'],
                        //         'row_count' => $row_count+1,
                        //         'produk_id' =>$request->produk[$i]['produk_id'],
                        //     ),
                        // ));
                    }
                }else{
                    $pembelian->remove($request->produk[$i]['variasi_id']);
                }
            }

            return response()->json([
                'fail' => false,
                'total_item' => getCartCount('pembelian'),
                'total' => $pembelian->getTotal(),
                'sub_total' => $pembelian->getSubTotal(),
                'html' => view('mitra.pembelian.include.entry_row')->render(),
            ]);
        }
    }

    public function updateCart(Request $request)
    {
        if (request()->ajax()) {
            $session = Session::get('bisnis.outlet_id').'-pembelian';
            $update = Cart::session($session)
            ->update($request->variasi_id,[
                'quantity' =>array(
                    'relative' => false,
                    'value' => $request->qty
                ),
                'price' => $request->hrg
            ]);

            return response()->json([
                'fail' => false,
                'total_item' => getCartCount('pembelian'),
                'total' => Cart::session($session)->getTotal(),
                'sub_total' => Cart::session($session)->getSubTotal(),
                'html' => view('mitra.pembelian.include.entry_row')->render(),
            ]);
        }
    }

    public function deleteCart(Request $request)
    {
        if($request->ajax())
        {
            $session = Session::get('bisnis.outlet_id').'-pembelian';
            $hapus = Cart::session($session)->remove($request->variasi_id);
            if($hapus)
            {
                return response()->json([
                    'fail' => false,
                    'total_item' => getCartCount('pembelian'),
                    'total' => Cart::session($session)->getTotal(),
                    'sub_total' => Cart::session($session)->getSubTotal(),
                    'html' => view('mitra.pembelian.include.entry_row')->render(),
                ]);
            }
        }
    }

    public function getCart()
    {
        $pembelian = Cart::session(Session::get('bisnis.outlet_id').'-pembelian');
        return response()->json([
            'fail' => false,
            'total_item' => getCartCount('pembelian'),
            'total' => $pembelian->getTotal(),
            'sub_total' => $pembelian->getSubTotal(),
            'html' => view('mitra.pembelian.include.entry_row')->render(),
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
            ->paginate(1);
            if($produk->Total() > 1)
            {
                $total = true;
            }else{
                $total = false;
            }
            return response()->json([
                'fail' => false,
                'tipe' => $request->get('tipe'),
                'total' => $total,
                'html' => view('mitra.pembelian.include.produk_list', compact('produk'))->render(),
            ]);
        }
    }
}

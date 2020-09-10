<?php

namespace Modules\Produk\Http\Controllers\Mitra;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Produk\Entities\Produk;
use Modules\Produk\Entities\ProdukVariasi;
use Modules\Produk\Entities\ProdukFoto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
use Modules\Produk\Entities\Kategori;
use Image;
class ProdukController extends Controller
{
    /**
     * Only Authenticated users are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('produk::mitra.produk.index');
    }

    public function tambah(){
        $kategori = Kategori::where('parent_id', null)->get();

        return view('produk::mitra.produk.tambah', compact('kategori'));
    }

    public function simpan(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required|min:100|max:3000',
            'kategori' => 'required',
            'foto.0' => 'required',
            'berat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Produk Wajib Diisi!',
            'deskripsi.required' => 'Deksripsi Produk Wajib Diisi!',
            'deskripsi.min' => 'Deksripsi Produk Terlalu Sedikit!',
            'kategori.required' => 'Kategori Produk Wajib Diisi!',
            'foto.0.required' => 'Foto Utama Produk Wajib Diisi!',
            'berat.required' => 'Berat Produk Wajib Diisi!',
        ];

        if($request->is_variasi === '0')
        {
            $rules['harga'] = 'required';
            $rules['stok'] = 'required';

            $pesan['harga.required'] = 'Harga Produk Wajib Diisi!';
            $pesan['stok.required'] = 'Stok Produk Wajib Diisi!';
        }else{

        }

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $bisnis_id = auth()->user()->bisnis->id;
                $Produkdata = array(
                    'nama' => $request->nama,
                    'bisnis_id' => $bisnis_id,
                    'kategori_id' => $request->kategori,
                    'has_variasi' => $request->is_variasi,
                );
                $produk = Produk::create($Produkdata);
                $i = 0;
                foreach ($request->foto as $foto) {
                    if(!empty($foto))
                    {
                        $folderPath = "mitra/".$bisnis_id."/produk/".$produk->id."/";
                        $imageName = $folderPath . uniqid() . '.jpg';
                        list($baseType, $image) = explode(';', $foto);
                        list(, $image) = explode(',', $image);
                        $image = base64_decode($image);
                        $p = Storage::disk('umum')->put($imageName, $image);

                        $foto = new ProdukFoto;
                        $foto->produk_id = $produk->id;
                        $foto->path = $imageName;
                        if($i == 0){
                            $foto->is_utama = 1;
                        }
                        $foto->save();

                    }
                }
                if($request->is_variasi == 0)
                {
                    $variasiData = array(
                        'produk_id' => $produk->id,
                        'nama' => '',
                        'sku' => $request->sku,
                        'harga' => $request->harga,
                    );
                    $variasi = ProdukVariasi::create($variasiData);
                }else{
                    // dd($request->variasi);
                    foreach ($request->variasi as $d) {
                        $variasiData = array(
                            'produk_id' => $produk->id,
                            'nama' => $d['nama'],
                            'sku' => $d['sku'],
                            'hrg_modal' => $d['hrg_modal'],
                            'hrg_jual' => $d['hrg_jual'],
                            'kelola_stok' => $d['kelola_stok'],
                            'volume' => $d['volume'],
                        );
                        if($d['kelola_stok'])
                        {
                            $variasiData['min_stok'] = $d['min_stok'];
                            $variasiData['satuan_id'] = $d['satuan_id'];
                        }
                        $variasi = ProdukVariasi::create($variasiData);

                        $variasiDetail = array(
                            'produk_id' => $produk->id,
                            'variasi_id' => $variasi->id,
                            'qty_tersedia' => 0
                        );
                        VariasiDetail::insert($variasiDetail);
                    }
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
                'fail' => true,
            ]);
        }
    }

    public function edit($produk_id)
    {
        $produk = Produk::find($produk_id);
        if( $produk->produk_variasi()->count() > 1)
        {
            $variasi = ProdukVariasi::select('produk_variasi.id as id', 'produk_variasi.nama as nama', 'produk_variasi.sku as sku',
            'produk_variasi.hrg_modal as hrg_modal', 'produk_variasi.hrg_jual as hrg_jual',
            'produk_variasi.kelola_stok as kelola_stok','produk_variasi.min_stok as min_stok','produk_variasi.produk_id  as produk_id',
            's.id as satuan_id', 's.nama as satuan_nama')
            ->join('satuan as s', 's.id', '=', 'produk_variasi.satuan_id')->where('produk_id',$produk_id)->get();
            $row_count = 0;
            // dd($variasi);
            return view('produk::mitra.produk.edit2', compact('produk', 'variasi', 'row_count'));
        }else{
            $variasi = $produk->produk_variasi()->first();
            return view('produk::mitra.produk.edit1', compact('produk', 'variasi'));
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required|min:100|max:3000',
            'kategori' => 'required',
            'foto.0' => 'required',
            'berat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Produk Wajib Diisi!',
            'deskripsi.required' => 'Deksripsi Produk Wajib Diisi!',
            'deskripsi.min' => 'Deksripsi Produk Terlalu Sedikit!',
            'kategori.required' => 'Kategori Produk Wajib Diisi!',
            'foto.0.required' => 'Kategori Produk Wajib Diisi!',
        ];

        if($request->variasi == 1)
        {
            $rules['hrg_modal'] = 'required';
            $rules['hrg_jual'] = 'required';

            $pesan['hrg_modal.required'] = 'Harga Modal Produk Wajib Diisi!';
            $pesan['hrg_jual.required'] = 'Harga Jual Produk Wajib Diisi!';

            if($request->has('kelola_stok'))
            {
                $rules['unit'] = 'required';
                $rules['stok_awal'] = 'required';
                $rules['min_stok'] = 'required';

                $pesan['unit.required'] = 'Satuan Unit Stok Produk Wajib Diisi!';
                $pesan['stok_awal.required'] = 'Stok Awal Produk Wajib Diisi!';
                $pesan['min_stok.required'] = 'Minimum Stok Produk Wajib Diisi!';
            }
        }
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                // Update Produk

                if($request->has('variasihapus'))
                {
                    $variasi = $request->total_variasi - count($request->variasihapus);
                }else{
                    $variasi = $request->total_variasi;
                }
                $produk = Produk::find($request->produk_id);

                if(!empty($produk->foto))
                {
                    if($request->hasfile('foto'))
                    {
                        // Hapus Foto
                        Storage::disk('umum')->delete($produk->foto);
                        $foto_file = $request->file('foto');
                        $foto = Storage::disk('umum')->put('produk', $foto_file);
                        $produk->foto = 'uploads/'.$foto;
                    }
                }else{
                    if($request->hasfile('foto'))
                    {
                        $foto_file = $request->file('foto');
                        $foto_path = 'produk';
                        $foto = Storage::disk('umum')->put($foto_path, $foto_file);
                        $produk->foto = 'uploads/'.$foto;
                    }
                }

                $produk->nama = $request->nama;
                $produk->kategori_id = $request->kategori;
                $produk->merk_id = $request->merk;
                $produk->variasi = $variasi;
                $produk->save();

                $variasi = array();
                if($request->total_variasi <= 1)
                {
                    $variasi = ProdukVariasi::find($request->variasi_id);
                    $variasi->nama = '';
                    $variasi->sku = $request->sku;
                    $variasi->hrg_modal = $request->hrg_modal;
                    $variasi->hrg_jual = $request->hrg_jual;
                    $variasi->volume = $request->volume;
                    if($request->has('kelola_stok'))
                    {
                        $variasi->kelola_stok = 1;
                        $variasi->satuan_id = $request->unit;
                        $variasi->min_stok = $request->min_stok;
                    }else{
                        $variasi->kelola_stok = 0;
                    }
                    $variasi->save();
                }
                else{
                    $i = 0;
                    foreach ($request->variasi as $d){
                        if(isset($d['variasi_id']))
                        {
                            $variasi = ProdukVariasi::find($d['variasi_id']);
                            $variasi->produk_id = $produk->id;
                            $variasi->nama = $d['nama'];
                            $variasi->sku = $d['sku'];
                            $variasi->hrg_modal = $d['hrg_modal'];
                            $variasi->hrg_jual = $d['hrg_jual'];
                            $variasi->volume = $d['volume'];
                            if($request->variasi[$i]['kelola_stok'] == 1)
                            {
                                $variasi->kelola_stok = 1;
                                $variasi->satuan_id = $d['satuan_id'];
                                $variasi->min_stok = $d['min_stok'];
                            }else{
                                $variasi->kelola_stok = 0;
                                $variasi->satuan_id = null;
                                $variasi->min_stok = null;
                                // dd('kasd');
                            }
                            $variasi->save();
                        }else{
                            $variasi = new ProdukVariasi();
                            $variasi->produk_id = $produk->id;
                            $variasi->nama = $d['nama'];
                            $variasi->sku = $d['sku'];
                            $variasi->hrg_modal = $d['hrg_modal'];
                            $variasi->hrg_jual = $d['hrg_jual'];
                            $variasi->volume = $d['volume'];
                            if($request->variasi[$i]['kelola_stok'] == 1)
                            {
                                $variasi->kelola_stok = 1;
                                $variasi->satuan_id = $d['satuan_id'];
                                $variasi->min_stok = $d['min_stok'];
                            }else{
                                dd('kasd');
                                $variasi->kelola_stok = 0;
                                $variasi->satuan_id = null;
                                $variasi->min_stok = null;
                            }
                            $variasi->save();

                            $detail = new VariasiDetail();
                            $detail->produk_id = $produk->id;
                            $detail->variasi_id = $variasi->id;
                            $detail->qty_tersedia = 0;
                            $detail->save();

                        }
                        $i++;
                    }
                    if($request->has('variasihapus'))
                    {
                        ProdukVariasi::destroy($request->variasihapus);
                    }
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

    public function hapus($id)
    {
        DB::beginTransaction();
            try{
        $data = Produk::destroy($id);
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

    public function json(Request $request)
    {
        if($request->ajax())
        {
            $kategori_id = $request->get('kategori_id');
            $merk_id = $request->get('merk_id');
            $cari = $request->get('keyword');

            $produk = Produk::where('kategori_id', 'like', '%' . $kategori_id . '%')
            ->where('merk_id', 'like', '%' . $merk_id . '%')
            ->where('nama', 'like', '%' . $cari . '%')
            ->paginate(6);
            if($produk->toArray()['next_page_url'] == null)
            {
                $next = false;
            }else{
                $next = true;
            }

            if($produk->toArray()['prev_page_url'] == null)
            {
                $prev = false;
            }else{
                $prev = true;
            }
            if($produk->toArray()['from'] == null)
            {
                $nav = 'Data Produk 0 - 0 Dari 0';
            }else{
                $nav = 'Data Produk '. $produk->toArray()['from'] .' - '.$produk->toArray()['to'] .' Dari '.$produk->toArray()['total'];
            }
            return response()->json([
                'fail' => false,
                'navigasi' => $nav,
                'tipe' => $request->get('tipe'),
                'total' => $produk->Total(),
                'current_page' => $produk->toArray()['current_page'],
                'next_page' => $next,
                'prev_page' => $prev,
                'html' => view('penjualan.include.produk_list', compact('produk'))->render(),
            ]);

        }
    }

}

<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Repository\Eloquent\ProdukRepository;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct(ProdukRepository $produkRepo)
    {
        $this->middleware('auth:mitra');
        $this->produkRepo = $produkRepo;
    }

    public function index(Request $request)
    {
        // dd($data);
        if ($request->ajax()) {
            $data = $this->produkRepo->getKategori();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('jumlah', function($row){
                return $row->produk()->count();
            })
            ->addColumn('action', function($row){
                if($row->bisnis_id)
                {
                    $btn = '<button type="button" onClick="edit(\''.$row->id.'\')" class="btn btn-alt-primary btn-sm mr-5"><i class="si si-note mr-5"></i>Ubah</button>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-alt-danger btn-sm"><i class="si si-trash mr-5"></i>Hapus</button>';
                }else{
                    $btn = '';
                }
                    return $btn;
            })
            ->rawColumns(['nama', 'jumlah', 'action'])
            ->make(true);
        }

        return view('mitra.produk.kategori');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            $data = new Kategori();
            $data->nama = $request->nama;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'upt_nama' => 'required',
        ];

        $pesan = [
            'upt_nama.required' => 'Nama Kategori Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            $data = Kategori::find($request->kategori_id);
            $data->nama = $request->upt_nama;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function edit($id){
        $data = Kategori::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = Kategori::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Kategori::orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Kategori::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Session;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mitra');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Satuan::orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('jumlah', function($row){

                return '';
            })
            ->addColumn('action', function($row){

                    $btn = '<button type="button" onClick="edit(\''.$row->id.'\')" class="btn btn-alt-primary btn-sm mr-5"><i class="si si-note mr-5"></i>Ubah</button>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-alt-danger btn-sm"><i class="si si-trash mr-5"></i>Hapus</button>';
                    return $btn;
            })
            ->rawColumns(['nama', 'jumlah', 'action'])
            ->make(true);
        }

        return view('mitra.produk.merk');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama_satuan' => 'required',
        ];

        $pesan = [
            'nama_satuan.required' => 'Nama Unit Label Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            $data = new Satuan();
            $data->nama = $request->nama_satuan;
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
            'upt_nama.required' => 'Nama Unit Label Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            $data = Satuan::find($request->merk_id);
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
        $data = Satuan::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = Satuan::destroy($id);
        if($data){
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Satuan::where('bisnis_id', Session::get('bisnis.bisnis_id'))
            ->orwhere('bisnis_id', null)->orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Satuan::where('bisnis_id', Session::get('bisnis.bisnis_id'))->orwhere('bisnis_id', null)
            ->where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }
}

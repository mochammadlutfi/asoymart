<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Etalase;
use Yajra\DataTables\DataTables;
class EtalaseTokoController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Etalase::where('user_id', auth()->guard('web')->user()->id)->orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('produk', function($row){

                return '';
            })
            ->addColumn('aksi', function($row){

                    $btn = '<button type="button" data-id="'.$row->id.'" class="btn btn-secondary btn-sm mr-1 btn-edit"><i class="si si-note mr-5"></i>Ubah</button>';
                    $btn .= '<button type="button" data-id="'.$row->id.'" class="btn btn-danger btn-sm btn-hapus"><i class="si si-trash mr-5"></i>Hapus</button>';
                    return $btn;
            })
            ->rawColumns(['nama', 'jumlah', 'aksi'])
            ->make(true);
        }

        return view('mitra.etalase.index');
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required|max:30',
        ];

        $pesan = [
            'nama.required' => 'Nama Etalase Wajib Diisi!',
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
                $data = new Etalase();
                $data->user_id = auth()->guard('web')->user()->id;
                $data->nama = $request->nama;
                $data->urutan = 0;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => 'Error Menyimpan Data',
                    'log' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required|max:30',
        ];

        $pesan = [
            'nama.required' => 'Nama Etalase Wajib Diisi!',
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
                $data = Etalase::find($request->id);
                $data->user_id = auth()->guard('web')->user()->id;
                $data->nama = $request->nama;
                $data->urutan = 0;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => 'Error Menyimpan Data',
                    'log' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id){
        $data = Etalase::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = Etalase::destroy($id);
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

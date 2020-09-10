<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Outlet;
use App\Models\Daerah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class OutletController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mitra');
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Outlet::where('bisnis_id', request()->session()->get('bisnis.bisnis_id'))->orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return ucwords($row->nama);
            })
            ->addColumn('kontaknya', function($row){
                $kontak  = '<span class="text-bold mr-3">No. Telp</span>: '. !empty($row->kontak_1) ? $row->kontak_1 : '-' .'<br>';
                $kontak .= '<span class="text-bold mr-3">No. HP </span>: '. !empty($row->kontak_2) ? $row->kontak_2 : '-' ;
                return $kontak;
            })
            ->addColumn('alamat', function($row){
                    $alamat  = ucwords(strtolower($row->daerah->urban)).',';
                    $alamat .= ucwords(strtolower($row->daerah->sub_district)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->city)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->provinsi->province_name));
                    return $alamat;
            })
            ->addColumn('action', function($row){
                    $btn = '<center><a href="'. route('mitra.outlet.edit', $row->id) .'" class="btn btn-secondary btn-sm mr-5"><i class="si si-note"></i></a>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-secondary btn-sm"><i class="si si-trash"></i></button></center>';
                    return $btn;
            })
            ->rawColumns(['nama', 'alamat', 'kontaknya', 'action'])
            ->make(true);
        }

        return view('mitra.outlet.index');
    }


    public function tambah(){
        return view('mitra.outlet.tambah');
    }

    public function simpan(Request $request)
    {
        // dd($request->all());
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'pos' => 'required',
            'daerah' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Nama Outlet Wajib Diisi!',
            'alamat.required' => 'Alamat Outlet Wajib Diisi!',
            'daerah.required' => 'Daerah Outlet Wajib Diisi!',
            'pos.required' => 'Kode Pos Outlet Wajib Diisi!',
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
                $outlet = new Outlet();
                $outlet->nama = $request->nama;
                $outlet->kontak_1 = $request->no_kontak;
                $outlet->kontak_2 = $request->no_kontak_alt;
                $outlet->daerah_id = $request->daerah;
                $outlet->kdpos = $request->pos;
                $outlet->alamat = $request->alamat;
                $outlet->lat = $request->lat;
                $outlet->bisnis_id = request()->session()->get('bisnis.bisnis_id');
                $outlet->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                    // 'pesan' => 'Error Menyimpan Data',
                ]);
            }

            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id)
    {
        $toko = Outlet::find($id);
        $d = Daerah::find($toko->daerah_id);

        $daerah  = ucwords(strtolower($d->urban)).',';
        $daerah .= ucwords(strtolower($d->sub_district)).', ';
        $daerah .= ucwords(strtolower($d->city)).', ';
        $daerah .= ucwords(strtolower($d->provinsi->province_name));
        return view('mitra.outlet.edit', compact('toko', 'daerah'));
    }

    public function update(Request $request){

        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'kd_pos' => 'required',
            'daerah' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Nama Outlet Wajib Diisi!',
            'alamat.required' => 'Alamat Outlet Wajib Diisi!',
            'daerah.required' => 'Daerah Outlet Wajib Diisi!',
            'kd_pos.required' => 'Kode Pos Outlet Wajib Diisi!',
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
                $outlet = Outlet::find($request->outlet_id);
                $outlet->nama = $request->nama;
                $outlet->kontak_1 = $request->no_kontak;
                $outlet->kontak_2 = $request->no_kontak_alt;
                $outlet->daerah_id = $request->daerah;
                $outlet->kdpos = $request->kd_pos;
                $outlet->alamat = $request->alamat;
                $outlet->lat = $request->lat;
                $outlet->save();
            }catch(\Exception $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => 'Error Menyimpan Data',
                ]);
            }

            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Outlet::orderBy('nama', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Outlet::where('nama','LIKE',  '%' . $cari .'%')->orderBy('nama', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }
}

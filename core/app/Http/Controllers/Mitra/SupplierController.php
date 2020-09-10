<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\SupplierRepository;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    private $supplierRepository;
    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->middleware('auth:mitra');
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = $this->supplierRepository->getAll();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('alamat', function($row){
                    $alamat = $row->alamat.'<br>';
                    $alamat  .= ucwords(strtolower($row->daerah->urban)).',';
                    $alamat .= ucwords(strtolower($row->daerah->sub_district)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->city)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->provinsi->province_name));
                    return $alamat;
            })
            ->addColumn('action', function($row){
                    $btn = '<center><a href="'. route('mitra.supplier.edit', $row->id) .'" class="btn btn-secondary btn-sm mr-5"><i class="si si-note"></i></a>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-secondary btn-sm"><i class="si si-trash"></i></button></center>';
                    return $btn;
            })
            ->rawColumns(['nama', 'alamat', 'action'])
            ->make(true);
        }
        return view('mitra.supplier.index');
    }


    public function tambah(){

        return view('mitra.supplier.tambah');
    }

    public function simpan(Request $request){

        $rules = [
            'nama' => 'required',
            'wilayah' => 'required',
            'alamat' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Supplier Wajib Diisi!',
            'wilayah.required' => 'Wilayah Supplier Wajib Diisi!',
            'alamat.required' => 'Alamat Supplier Wajib Diisi!',
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
                $data = array(
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'daerah_id' => $request->wilayah,
                    'alamat' => $request->alamat,
                    'perwakilan_nama' => $request->perwakilan_nama,
                    'perwakilan_hp' => $request->perwakilan_hp,
                );
                $this->supplierRepository->MitraCreate($data);

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            // catch(\Exception $e){
            //     DB::rollback();
            //     return response()->json([
            //         'fail' => true,
            //         'pesan' => 'Error Menyimpan Data',
            //     ]);
            // }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function update(Request $request){

        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'wilayah' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Supplier Wajib Diisi!',
            'alamat.required' => 'Alamat Supplier Wajib Diisi!',
            'telp.required' => 'No. Telepon Supplier Wajib Diisi!',
            'wilayah.required' => 'Wilayah Supplier Wajib Diisi!',
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
                $supplier = $this->supplierRepository->find($request->supplier_id);
                $supplier->update([
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'daerah_id' => $request->wilayah,
                    'alamat' => $request->alamat,
                    'perwakilan_nama' => $request->perwakilan_nama,
                    'perwakilan_hp' => $request->perwakilan_hp,
                    'mitra_id' => auth()->guard('mitra')->id(),
                ]);
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

    public function edit($id){
        $data = $this->supplierRepository->find($id);
        $wilayah  = ucwords(strtolower($data->daerah->urban)).',';
        $wilayah .= ucwords(strtolower($data->daerah->sub_district)).', ';
        $wilayah .= ucwords(strtolower($data->daerah->city)).', ';
        $wilayah .= ucwords(strtolower($data->daerah->provinsi->province_name));
        return view('mitra.supplier.edit', compact('data', 'wilayah'));
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = $this->supplierRepository->getAll();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Supplier::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }
}

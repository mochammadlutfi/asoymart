<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\PelangganRepository;
use Yajra\DataTables\DataTables;

class PelangganController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    private $pelangganRepository;
    public function __construct(PelangganRepository $pelangganRepository)
    {
        $this->middleware('auth:mitra');
        $this->pelangganRepository = $pelangganRepository;
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            $data = $this->pelangganRepository->getAll();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('ktp', function($row){
                if(!$row->ktp)
                {
                    return '-';
                }
                return $row->ktp;
            })
            ->addColumn('nama', function($row){

                    return $row->nama;
            })
            ->addColumn('kontak', function($row){
                if(!$row->telp)
                {
                    $telp = '-';
                }
                if(!$row->hp)
                {
                    $hp = '-';
                }
                $kontak  = '<span class="text-bold mr-3">No. Telp</span>: '.$telp.'<br>';
                $kontak .= '<span class="text-bold mr-3">No. HP </span>: '.$hp;

                return $kontak;
            })
            ->addColumn('alamat', function($row){
                if($row->daerah_id)
                {
                    $alamat = $row->alamat.'<br>';
                    $alamat  .= ucwords(strtolower($row->daerah->urban)).',';
                    $alamat .= ucwords(strtolower($row->daerah->sub_district)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->city)).', ';
                    $alamat .= ucwords(strtolower($row->daerah->provinsi->province_name));
                }else{
                    $alamat = '-';
                }
                return $alamat;
            })
            ->addColumn('action', function($row){
                    $btn = '<center><a href="'. route('mitra.supplier.edit', $row->id) .'" class="btn btn-secondary btn-sm mr-5"><i class="si si-note"></i></a>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-secondary btn-sm"><i class="si si-trash"></i></button></center>';
                    return $btn;
            })
            ->rawColumns(['nama', 'alamat', 'action', 'kontak'])
            ->make(true);
        }
        return view('mitra.pelanggan.index');
    }


    public function tambah(){

        return view('mitra.pelanggan.tambah');
    }

    public function simpan(Request $request){

        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'wilayah' => 'required',
            'ktp' => 'required',
            'hp' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'wilayah.required' => 'Wilayah Wajib Diisi!',
            'ktp.required' => 'No. KTP Wajib Diisi!',
            'hp.required' => 'No. Handphone Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            // DB::beginTransaction();
            // try{
                $data = array(
                    'nama' => $request->nama,
                    'telp' => $request->telp,
                    'ktp' => $request->ktp,
                    'hp' => $request->hp,
                    'email' => $request->email,
                    'daerah_id' => $request->wilayah,
                    'alamat' => $request->alamat,
                    'keterangan' => $request->keterangan,
                );
                $this->pelangganRepository->MitraCreate($data);

            // }catch(\Exception $e){
            //     DB::rollback();
            //     return response()->json([
            //         'fail' => true,
            //         'pesan' => 'Error Menyimpan Data',
            //     ]);
            // }
            // DB::commit();
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
                $pelanggan = $this->pelangganRepository->find($request->pelanggan_id);
                $pelanggan->update([
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
        $data = $this->pelangganRepository->find($id);
        $wilayah  = ucwords(strtolower($data->daerah->urban)).',';
        $wilayah .= ucwords(strtolower($data->daerah->sub_district)).', ';
        $wilayah .= ucwords(strtolower($data->daerah->city)).', ';
        $wilayah .= ucwords(strtolower($data->daerah->provinsi->province_name));
        return view('mitra.pelanggan.edit', compact('data', 'wilayah'));
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = $this->pelangganRepository->getAll();
          }else{
            $cari = $request->searchTerm;
            $fetchData = $this->pelangganRepository->getCari($cari);
          }
        //   dd($fetchData);
          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }
          return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Models\Bisnis;
class TokoController extends Controller
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
     * Show Profil Toko.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user_id = Auth()->guard('web')->user()->id;

        $toko = Bisnis::where('user_id', $user_id)->first();

        return view('mitra.toko.index', compact('toko'));
    }

    /**
     * Retrieves purchase and sell details for a given time period.
     *
     * @return \Illuminate\Http\Response
     */
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
                // $bisnis_id
                $data = Bisnis::where('user_id', auth()->guard('web')->user()->id)->first();
                $data->nama = $request->nama;
                $data->deskripsi = $request->deskripsi;
                if(!empty($request->logo))
                {
                    // if(!empty($data->logo))
                    // {

                    // }
                    $folderPath = 'mitra/'.$data->id."/profil/lg-";
                    $imageName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->logo);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($imageName, $image);
                    $data->logo = $imageName;
                }
                if(!empty($request->sampul))
                {
                    // if(!empty($data->logo))
                    // {

                    // }
                    $folderPath = 'mitra/'.$data->id."/profil/smp-";
                    $coverName = $folderPath . uniqid() . '.jpg';
                    list($baseType, $image) = explode(';', $request->sampul);
                    list(, $image) = explode(',', $image);
                    $image = base64_decode($image);
                    $p = Storage::disk('umum')->put($coverName, $image);
                    $data->cover = $coverName;
                }
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
}

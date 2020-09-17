<?php

namespace App\Http\Controllers\Mitra;

use Auth;
use Session;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mitra.pengaturan.index');
    }

    public function alamat()
    {
        return view('mitra.pengaturan.alamat');
    }

    public function rekening()
    {
        $datas = Pengaturan::latest()->get();
        return view('mitra.pengaturan.rekening', compact('datas'));
    }

    public function utama(Request $request)
    {

        $users_id = Auth::guard('web')->user()->id;
        // $data = Pengaturan::find($users_id);
        $data = Pengaturan::where('users_id',$users_id)->update([
            'is_prime' => '0',
        ]);
        if($data)
        {
            $id = $request->id;
            $data = Pengaturan::find($id);
            $data->is_prime = '1';
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }

    public function simpan(Request $request)
    {

        $rules = [
            'bank_account_name' => 'required',
            'account_number' => 'required',
            'name' => 'required',
        ];

        $pesan = [
            'bank_account_name.required' => 'Nama Bank Wajib Diisi!',
            'account_number.required' => 'Nomor Rekening Wajib Diisi!',
            'name.required' => 'Nama Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            $data = new Pengaturan();
            $data->name = $request->name;
            $data->account_number = $request->account_number;
            $data->bank_account_name = $request->bank_account_name;
            $data->users_id = Auth::guard('web')->user()->id;
            if($data->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }
        }
    }
}

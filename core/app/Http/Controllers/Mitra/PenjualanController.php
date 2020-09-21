<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Produk;
use App\Models\Merk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class PenjualanController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Riwayat Penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        // dd($request->status);
        // $status = $request->status;
        if ($request->ajax()) {
            $bisnis_id = auth()->user()->bisnis->id;
            $status = $request->status;
            dd($request->all());
        }
        return view('mitra.penjualan.index');
    }
}

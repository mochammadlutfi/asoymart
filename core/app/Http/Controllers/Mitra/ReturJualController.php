<?php

namespace App\Http\Controllers\Mitra;

use App\Models\Produk;
use App\Models\Merk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class ReturJualController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:mitra');
    }

    /**
     * Show Riwayat Penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return view('mitra.returjual.index');
    }

}

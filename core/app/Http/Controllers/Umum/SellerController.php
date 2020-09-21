<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bisnis;
use App\Models\Produk;

class SellerController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($seller)
    {
        $data = Bisnis::where('link_toko', $seller)->first();
        $produk = Produk::where('bisnis_id', $data->id)->latest()->get();
        return view('umum.seller.index', compact('data', 'produk'));
    }
}

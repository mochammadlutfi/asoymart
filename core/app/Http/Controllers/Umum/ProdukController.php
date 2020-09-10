<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Produk;
use App\Models\ProdukVariasi;
use App\Models\ProdukFoto;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function detail($bisnis, $produk)
    {
        $produk = Produk::where('slug', $produk)->first();
        $Produkfoto = ProdukFoto::where('produk_id', $produk->id)->get();
        return view('umum.produk_detail', compact('produk', 'Produkfoto'));
    }

    public function kategori($kategori, $produk)
    {
        $produk = Produk::where('slug', $produk)->first();
        $Produkfoto = ProdukFoto::where('produk_id', $produk->id)->get();
        return view('umum.produk_detail', compact('produk', 'Produkfoto'));
    }
}

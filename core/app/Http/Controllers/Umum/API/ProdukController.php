<?php

namespace App\Http\Controllers\Umum\API;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Flash;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */

class ProdukController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Menampilkan Produk Kategori
     * GET|HEAD /kategori
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = Kategori::where('parent_id', null)->orderBy('nama', 'ASC')->get();
        return $this->sendResponse($data->toArray(), 'Product Categories retrieved successfully');
    }


    public function detail($id)
    {
        $data = Produk::with('foto')->where('id', $id)->first();
        return $this->sendResponse($data->toArray(), 'Product Categories retrieved successfully');
    }

    public function produk($id)
    {
        $id = Kategori::defaultOrder()->descendantsOf($id)->pluck('id')->toArray();
        $data = Produk::whereIn('kategori_id', $id)->orderBy('updated_at', 'DESC')->get();
        // dd($data);
        return $this->sendResponse($data->toArray(), 'Categories Product retrieved successfully');
    }

}

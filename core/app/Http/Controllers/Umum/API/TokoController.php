<?php

namespace App\Http\Controllers\Umum\API;

use App\Models\Kategori;
use App\Models\Bisnis;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Prettus\Repository\Exceptions\RepositoryException;
use Flash;

/**
 * Class TokoController
 * @package App\Http\Controllers\API
 */

class TokoController extends Controller
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
        $data = Bisnis::latest()->get();
        return $this->sendResponse($data->toArray(), 'Product Categories retrieved successfully');
    }


    public function detail($id)
    {
        $data = Bisnis::where('id', $id)->first();
        return $this->sendResponse($data->toArray(), 'Product Categories retrieved successfully');
    }

    public function produk($id)
    {
        // $id = Kategori::defaultOrder()->descendantsOf($id)->pluck('id')->toArray();
        $data = Produk::where('bisnis_id', $id)->orderBy('updated_at', 'DESC')->get();
        return $this->sendResponse($data->toArray(), 'Categories Product retrieved successfully');
    }

}

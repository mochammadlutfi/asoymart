<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Produk;
use App\Models\ProdukVariasi;
use App\Models\VariasiDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;

class VariasiController extends Controller
{
    /**
     * Only Authenticated users are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_variasi(Request $request)
    {
        $variasi = array();
        $pil1 = explode(',', $request->pil1);
        $i = 0;
        if($request->var2_status === '1'){
            $pil2 = explode(',', $request->pil2);
            foreach($pil1 as $a)
            {
                foreach($pil2 as $b)
                {
                    $variasi[$i]['pil1'] = $a;
                    $variasi[$i]['pil2'] = $b;
                    $i++;
                }
            }
        }else{
            foreach($pil1 as $a)
            {
                $variasi[$i]['pil1'] = $a;
                $variasi[$i]['pil2'] = '';
                $i++;
            }
        }
        // dd($variasi);
        return response()->json([
            'fail' => false,
            'html' => view('produk::mitra.produk.include.variasi', compact('variasi'))->render(),
        ]);
    }
}

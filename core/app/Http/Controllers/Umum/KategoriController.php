<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kategori;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Models\Cart;
class KategoriController extends Controller
{


    public function sub_kategori_json(Request $request)
    {
        $kategori = Kategori::where('parent_id', $request->category_id)->orderBy('nama', 'ASC')->get();
        return response()->json($kategori);
    }

    public function cartTop_data()
    {
        $data = collect([]);
        if(auth()->guard('web')->check())
        {
            $user = auth()->guard('web')->user()->id;
            $data->cart = Cart::where('user_id', $user)->orderBy('updated_at', 'DESC')->limit(10)->get();
            $data->status = true;
        }else{
            $data->status = false;
        }
        return response()->json([
            'fail' => false,
            'html' => view('umum.cart.include.cart_data', compact('data'))->render(),
        ]);
    }
}

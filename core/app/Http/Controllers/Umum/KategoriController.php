<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Kategori;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
class KategoriController extends Controller
{

    public function sub_kategori_json(Request $request)
    {
        $kategori = Kategori::where('parent_id', $request->category_id)->orderBy('nama', 'ASC')->get();
        return response()->json($kategori);
    }
}

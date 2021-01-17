<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Rekening;
use App\Models\Bank;
use Yajra\DataTables\DataTables;
class PromosiController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('mitra.promosi.index');
    }

}

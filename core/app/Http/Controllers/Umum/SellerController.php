<?php

namespace App\Http\Controllers\Umum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bisnis;

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

        return view('umum.seller.index', compact('data'));
    }
}

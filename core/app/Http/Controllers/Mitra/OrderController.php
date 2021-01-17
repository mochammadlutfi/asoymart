<?php

namespace App\Http\Controllers\Mitra;

use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    /**
     * Only Authenticated users for "mitra" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Riwayat Penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {

            $bisnis_id = auth()->user()->bisnis->id;
            $status = $request->status;
            $data = Order::where('bisnis_id', $bisnis_id)->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function($row){
                    $btn = '<center><a href="'. route('mitra.produk.edit', $row->id) .'" class="btn btn-secondary btn-sm mr-5"><i class="si si-note"></i></a>';
                    $btn .= '<button type="button" onClick="hapus(\''.$row->id.'\')" class="btn btn-secondary btn-sm"><i class="si si-trash"></i></button></center>';
                    return $btn;
            })
            ->rawColumns(['info_produk', 'harga', 'views', 'stok', 'aksi'])
            ->make(true);
        }
        return view('mitra.penjualan.index');
    }
}

<?php

namespace Modules\Wilayah\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wilayah\Entities\Kelurahan;
class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('wilayah::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('wilayah::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('wilayah::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('wilayah::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function jsonSelect(Request $request)
    {
        if($request->has('searchTerm')){
            $cari = $request->searchTerm;
                $fetchData = Kelurahan::where('name','LIKE',  '%' . $cari .'%')->get();
            $data = array();
            // dd($fetchData);
            foreach($fetchData as $row) {
                $data[] = array(
                    "id" =>$row->id,
                    "text" => ucwords(strtolower($row->kecamatan->kota->provinsi->name)).', '. ucwords(strtolower($row->kecamatan->kota->name)).', Kec. '.ucwords(strtolower($row->kecamatan->name)).', '.ucwords(strtolower($row->name)),
                );
            }
            return response()->json($data);
        }
    }
}

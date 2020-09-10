<?php

namespace Modules\Produk\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Produk\Entities\Kategori;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Storage;
class KategoriController extends Controller
{

    public function sub_kategori_json(Request $request)
    {
        // dd($request->all());
        $kategori = Kategori::where('parent_id', $request->category_id)->orderBy('nama', 'ASC')->get();
        return response()->json($kategori);
    }

    public function simpan(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $data = new Kategori();
                $data->nama = $request->nama;
                $data->parent_id = $request->parent_id;
                if($request->hasfile('icon'))
                {
                    $icon_file = $request->file('icon');
                    $icon_path = 'kategori';
                    $icon = Storage::disk('umum')->put($icon_path, $icon_file);
                    $data->icon = 'uploads/'.$icon;
                }
                $data->is_active = $request->is_active;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function update(Request $request)
    {

        $rules = [
            'nama' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{
            DB::beginTransaction();
            try{
                $data = Kategori::find($request->kategori_id);
                if($request->hasfile('icon'))
                {
                    $cek = Storage::disk('public')->exists($data->icon);
                    if($cek)
                    {
                        Storage::disk('public')->delete($data->icon);
                    }
                    $foto_file = $request->file('icon');
                    $foto_path = 'kategori';
                    $foto = Storage::disk('umum')->put($foto_path, $foto_file);
                    $data->icon = 'uploads/'.$foto;
                }

                $data->nama = $request->nama;
                $data->is_active = $request->is_active;
                $data->save();
            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'pesan' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function edit($id){
        $data = Kategori::find($id);
        if($data){
            return response()->json($data);
        }
    }

    public function hapus($id)
    {
        $data = Kategori::find($id);
        $cek = Storage::disk('public')->exists($data->icon);
        if($cek)
        {
            Storage::disk('public')->delete($data->icon);
        }
        $hapus_db = Kategori::destroy($data->id);
        if($hapus_db)
        {
            return response()->json([
                'fail' => false,
            ]);
        }
    }

    public function tree(Request $request)
    {
        $items = Kategori::select('id as id', 'nama as text', 'parent_id')->orderBy('nama', 'ASC')->get();

        $children = array();

        foreach($items as $item)
            $children[$item->parent_id][] = $item;

        foreach($items as $item) if (isset($children[$item->id]))
            $item->children = $children[$item->id];

        $tree = $children[0];
        return response()->json($tree);
    }

    public function json(Request $request)
    {
        if(!isset($request->searchTerm)){
            $fetchData = Kategori::orderBy('created_at', 'DESC')->get();
          }else{
            $cari = $request->searchTerm;
            $fetchData = Kategori::where('nama','LIKE',  '%' . $cari .'%')->orderBy('created_at', 'DESC')->get();
          }

          $data = array();
          foreach($fetchData as $row) {
            $data[] = array("id" =>$row->id, "text"=>$row->nama);
          }

          return response()->json($data);
    }

    function categoriesToTree($items) {

        $childs = array();

        foreach($items as $item)
        {
            // $childs[$item['parent_id']][] = ;
            // unset($item);
        }
        // foreach($items as $item)
        // {
        //     if (isset($childs[$item['id']]))
        //     {
        //         $item['children'] = $childs[$item['id']];
        //     }
        // }

        return $childs;

    }
}

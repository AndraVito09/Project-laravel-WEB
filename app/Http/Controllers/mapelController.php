<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahmapel;

class Mapelcontroller extends Controller
{
    public function mapel()
    {
        $mapel = DB::select('SELECT * FROM mapel order by id_mapel ASC');
        return view('admin.mapel.mapel',['arraymapel' => $mapel]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $mapel = DB::table('mapel')
        ->where(function ($query) use ($cari){
            $query->where('nama_mapel', 'like', "%{$cari}%")
                  ->orWhere('kategori', 'like', "%{$cari}%");
        })
        ->paginate(10);

        return view('admin.mapel.mapel', ['arraymapel' => $mapel]);

    }

    public function tambahmapel()
    {
      return view('admin.mapel.tambahmapel',[]);
    }
    public function store(request $request)
    {
        $mapel = new \App\Models\tambahmapel();
        $mapel->id_mapel = $request->id_mapel;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kategori = $request->kategori;
        $mapel->save();
        return redirect('/admin/mapel')->with('success' , 'Data Berhasil ditambahkan');
    }
    public function hapus($id_mapel)
    {
      $mapel=\App\Models\tambahmapel::find($id_mapel);
      $mapel->delete();
      return redirect('admin/mapel')->with('success' , 'Data Berhasil dihapus');
    }
    
    public function editmapel($id_mapel)
    {
        $mapel = tambahmapel::findOrFail($id_mapel);
        return view('admin.mapel.editmapel', [
            'mapel' => $mapel,
        ]);
    }
    public function update(Request $request)
    {

      $mapel = tambahmapel::findOrFail($request->id_mapel);
      $mapel->nama_mapel = $request->nama_mapel;
      $mapel->kategori = $request->kategori;
      $mapel->save();

    return redirect('/admin/mapel')->with('success', 'Data berhasil diupdate');
  }
  
    
}
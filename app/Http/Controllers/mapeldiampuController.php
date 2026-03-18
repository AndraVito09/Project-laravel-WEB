<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahmapeldiampu;
use App\Models\tambahkelas;
use App\Models\tambahguru;
use App\Models\tambahmapel;

class Mapeldiampucontroller extends Controller
{
    public function mapeldiampu()
    {
        $mapeldiampu = tambahmapeldiampu::with(['guru', 'mapel', 'kelas'])->get();
        return view('admin.mapeldiampu.mapeldiampu',['arraymapeldiampu' => $mapeldiampu]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $mapeldiampu = tambahmapeldiampu::with(['guru', 'mapel', 'kelas'])
        ->where(function ($query) use ($cari){
            $query->orWhereHas('guru', function ($q) use ($cari) {
                    $q->where('nama', 'like',  "%{$cari}%");
                  })
                  ->orWhereHas('mapel',function ($q) use ($cari) {
                    $q->where('nama_mapel', 'like', "%{$cari}%");
                  })
                  ->orWhereHas('kelas', function ($q) use ($cari) {
                    $q->where('nama_kelas', 'like',  "%{$cari}%");
                  });
        })
        ->paginate(10);

        return view('admin.mapeldiampu.mapeldiampu', ['arraymapeldiampu' => $mapeldiampu]);

    }

    public function tambahmapeldiampu()
    {
      $guru = DB::table('guru')->get();
      $mapel = DB::table('mapel')->get();
      $kelas = DB::table('kelas')->get();
      return view('admin.mapeldiampu.tambahmapeldiampu', compact('guru', 'mapel', 'kelas'));
    }
    public function store(request $request)
    {
        $mapeldiampu = new \App\Models\tambahmapeldiampu();
        $mapeldiampu->id_ampu = $request->id_ampu;
        $mapeldiampu->id_guru = $request->id_guru;
        $mapeldiampu->id_mapel = $request->id_mapel;
        $mapeldiampu->id_kelas = $request->id_kelas;
        $mapeldiampu->save();
        return redirect('/admin/mapeldiampu')->with('success', 'Data berhasil ditambahkan');
  }
    
    public function hapus($id_ampu){
      $mapeldiampu= \App\Models\tambahmapeldiampu::find($id_ampu);
      $mapeldiampu->delete();
      return redirect('admin/mapeldiampu')->with('success', 'Data berhasil dihapus');
  }
    
    
    public function editmapeldiampu($id_ampu)
    {
        $mapeldiampu = tambahmapeldiampu::findOrFail($id_ampu);
        $mapel = tambahmapel::all();
        $kelas = tambahkelas::all();
        $guru = tambahguru::all();
        return view('admin.mapeldiampu.editmapeldiampu', [
            'mapeldiampu' => $mapeldiampu,
            'mapel' => $mapel,
            'kelas' => $kelas,
            'guru' => $guru
        ]);
    }
    public function update(Request $request)
    {

      $mapeldiampu = tambahmapeldiampu::findOrFail($request->id_ampu);
      $mapeldiampu->id_guru = $request->id_guru;
      $mapeldiampu->id_mapel = $request->id_mapel;
      $mapeldiampu->id_kelas = $request->id_kelas;
      $mapeldiampu->save();
      
    return redirect('/admin/mapeldiampu')->with('success', 'Data berhasil diupdate');
  }

}
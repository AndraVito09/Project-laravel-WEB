<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahkelas;

class Kelascontroller extends Controller
{
    public function kelas()
    {
        $kelas = DB::select('SELECT * FROM kelas order by id_kelas ASC');
        return view('admin.kelas.kelas',['arraykelas' => $kelas]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $kelas = DB::table('kelas')
        ->where(function ($query) use ($cari){
            $query->where('nama_kelas', 'like', "%{$cari}%")
                  ->orWhere('jurusan', 'like', "%{$cari}%");
        })
        ->paginate(10);

        return view('admin.kelas.kelas', ['arraykelas' => $kelas]);

    }

    public function tambahkelas()
    {
      return view('admin.kelas.tambahkelas',[]);
    }
    public function store(request $request)
    {
        $kelas = new \App\Models\tambahkelas();
        $kelas->id_kelas = $request->id_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->save();
        return redirect('/admin/kelas')->with('success', 'Data Berhasil ditambahkan');
    }
    public function hapus($id_kelas)
    {
      $kelas=\App\Models\tambahkelas::find($id_kelas);
      $kelas->delete();
      return redirect('admin/kelas')->with('success', 'Data Berhasil dihapuskan');
    }
    
    public function editkelas($id_kelas)
    {
        $kelas = tambahkelas::findOrFail($id_kelas);
        return view('admin.kelas.editkelas', [
            'kelas' => $kelas,
        ]);
    }
    public function update(Request $request)
    {

    $kelas = tambahkelas::findOrFail($request->id_kelas);

      $kelas->nama_kelas = $request->nama_kelas;
      $kelas->jurusan = $request->jurusan;
      $kelas->save();

    return redirect('/admin/kelas')->with('success', 'Data berhasil diupdate');
  }
}
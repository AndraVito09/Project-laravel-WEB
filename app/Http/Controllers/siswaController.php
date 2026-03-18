<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahsiswa;
use App\Models\tambahkelas;

class Siswacontroller extends Controller
{
    public function siswa()
    {
        $siswa = tambahsiswa::with(['kelas'])->get();
        return view('admin.siswa.siswa', ['arraysiswa' => $siswa]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $siswa = tambahsiswa::with(['kelas'])
        ->where(function ($query) use ($cari){
            $query->where('nama', 'like', "%{$cari}%")
                  ->orWhere('nisn', 'like', "%{$cari}%")
                  ->orWhereHas('kelas', function ($q) use ($cari) {
                    $q->where('nama_kelas', 'like',  "%{$cari}%");
                  });
        })
        ->paginate(10);

        return view('admin.siswa.siswa', ['arraysiswa' => $siswa]);

    }

    public function store(Request $request)
    {
        $siswa = new tambahsiswa();
        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->id_siswa = $request->id_siswa;
        $siswa->jk = $request->jk;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_hp = $request->no_hp;
        $siswa->save();

        return redirect('/siswa/siswa')->with('success', 'Data berhasil disimpan');;
    }

    public function tambahsiswa()
    {
        $kelas = DB::table('kelas')->get();
        return view('admin.siswa.tambahsiswa', compact('kelas'));
    }
    
    public function hapus ($id_siswa)
    {
      $siswa=\App\Models\tambahsiswa::find($id_siswa);
      $siswa->delete();
      return redirect('admin/siswa')->with('success', 'Data Berhasil dihapus');
    }
    
    public function editsiswa($id_siswa)
    {
        $kelas = tambahkelas::all();
        $siswa = tambahsiswa::findOrFail($id_siswa);
        return view('admin.siswa.editsiswa', [
            'siswa' => $siswa,
            'arraykelas' => $kelas
        ]);
    }
    public function update(Request $request)
    {

    $siswa = tambahsiswa::findOrFail($request->id_siswa);

    $siswa->nisn = $request->nisn;
    $siswa->nama = $request->nama;
    $siswa->jk = $request->jk;
    $siswa->tanggal_lahir = $request->tanggal_lahir;
    $siswa->foto = $request->foto;
    $siswa->id_kelas = $request->id_kelas;
    $siswa->alamat = $request->alamat;
    $siswa->no_hp = $request->no_hp;

    $siswa->save();

    return redirect('/admin/siswa')->with('success', 'Data berhasil diupdate');
  } 

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahnilai;
use App\Models\tambahsiswa;
use Barryvdh\DomPDF\Facade\Pdf;
class Nilaicontroller extends Controller
{
    public function nilai()
    {
        $nilai = tambahnilai::with(['siswa', 'ampu.guru', 'ampu.mapel'])->get();
        return view('admin.nilai.nilai',['arraynilai' => $nilai]);
    }
    
    public function cari (Request $request)
    {
        $cari = $request->cari;

        $nilai = tambahnilai::with(['siswa', 'ampu.guru', 'ampu.mapel'])
        ->where(function ($query) use ($cari){
            $query->orWhereHas('siswa', function ($q) use ($cari) {
                    $q->where('nama', 'like',  "%{$cari}%");
                  })
                  ->orWhereHas('ampu.guru', function ($q) use ($cari) {
                    $q->where('nama', 'like',  "%{$cari}%");
                  })
                  ->orWhereHas('ampu.mapel', function ($q) use ($cari) {
                    $q->where('nama_mapel', 'like',  "%{$cari}%");
                  });
        })
        ->paginate(10);

        return view('admin.nilai.nilai', ['arraynilai' => $nilai]);

    }

    public function tambahnilai()
    {
    $siswa = DB::table('siswa')->get();
    $mapeldiampu = DB::select("
        SELECT md.id_ampu,m.nama_mapel, g.nama
        FROM mapel_diampu md
        JOIN mapel m ON md.id_mapel = m.id_mapel
        JOIN guru g ON md.id_guru = g.id_guru
    ");
      
        return view('admin.nilai.tambahnilai',compact('mapeldiampu', 'siswa'));
    }
    
    public function store(request $request)
    {
        $nilai = new \App\Models\tambahnilai();
        $nilai->id_nilai = $request->id_nilai;
        $nilai->id_siswa = $request->id_siswa;
        $nilai->id_ampu = $request->id_ampu;
        $nilai->semester = $request->semester;
        $nilai->nilai_tugas = $request->nilai_tugas;
        $nilai->nilai_uts = $request->nilai_uts;
        $nilai->nilai_akhir = $request->nilai_akhir;
        $nilai->save();
        return redirect('/admin/nilai')->with('success', 'Data Berhasil ditambahkan');
    }
    
    public function hapus($id_nilai)
    {
      $nilai= \App\Models\tambahnilai::find($id_nilai);
      $nilai->delete();
      return redirect('admin/nilai')->with('success', 'Data Berhasil dihapus');
    }
    
    public function editnilai($id_nilai)
    {
        $nilai = tambahnilai::findOrFail($id_nilai);
        $siswa = tambahsiswa::all();
        $mapeldiampu = DB::select("
        SELECT md.id_ampu,m.nama_mapel, g.nama
        FROM mapel_diampu md
        JOIN mapel m ON md.id_mapel = m.id_mapel
        JOIN guru g ON md.id_guru = g.id_guru
    ");
        return view('admin.nilai.editnilai', [
            'nilai' => $nilai,
            'siswa' => $siswa,
            'mapeldiampu' => $mapeldiampu,
        ]);
    }
    public function update(Request $request)
    {

      $nilai = tambahnilai::findOrFail($request->id_nilai);
      
      $nilai->id_siswa = $request->id_siswa;
      $nilai->id_ampu = $request->id_ampu;
      $nilai->semester = $request->semester;
      $nilai->nilai_tugas = $request->nilai_tugas;
      $nilai->nilai_uts = $request->nilai_uts;
      $nilai->nilai_akhir = $request->nilai_akhir;
      $nilai->save();
      
    return redirect('/admin/nilai')->with('success', 'Data berhasil diupdate');
  }

  public function exportPdf()
    {
        $nilai = DB::table('nilai')->get();

        $pdf = Pdf::loadView('admin.nilai.nilai_pdf', [
            'nilai' => $nilai
        ]);

        return $pdf->download('data-nilai.pdf');
    }
}
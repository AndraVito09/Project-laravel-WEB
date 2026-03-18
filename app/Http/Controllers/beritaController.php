<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahberita;
use App\Models\tambahguru;
use Barryvdh\DomPDF\Facade\Pdf;
class Beritacontroller extends Controller
{
    public function berita()
    {
        $berita = tambahberita::with(['guru'])->get();
        return view('admin.berita.berita',['arrayberita' => $berita]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $berita = tambahberita::with(['guru'])
        ->where(function ($query) use ($cari){
            $query->where('judul', 'like', "%{$cari}%")
                  ->orWhereHas('guru', function ($q) use ($cari) {
                    $q->where('nama', 'like',  "%{$cari}%");
                  });
        })
        ->paginate(10);

        return view('admin.berita.berita', ['arrayberita' => $berita]);

    }

    public function tambahberita()
    {
      $guru = DB::table('guru')->get();
      return view('admin.berita.tambahberita', compact('guru'));
    }
    public function store(request $request)
    {
        $berita = new \App\Models\tambahberita();
        $berita->id_berita = $request->id_berita;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->tanggal_post = $request->tanggal_post;
        $berita->id_guru = $request->id_guru;
        $berita->save();
        return redirect('/admin/berita')->with('success', 'Data Berhasil ditambahkan');
    }
    public function hapus($id_berita)
    {
      $berita=\App\Models\tambahberita::find($id_berita);
      $berita->delete();
      return redirect('admin/berita')->with('success', 'Data Berhasil dihapus');
    }
    
    public function editberita($id_berita)
    {
        $berita = tambahberita::findOrFail($id_berita);
        $guru = tambahguru::all();
        return view('admin.berita.editberita', [
            'berita' => $berita,
            'guru' => $guru
        ]);
    }
    public function update(Request $request)
    {

      $berita = tambahberita::findOrFail($request->id_berita);
      $berita->judul = $request->judul;
      $berita->isi = $request->isi;
      $berita->tanggal_post = $request->tanggal_post;
      $berita->id_guru = $request->id_guru;
      $berita->save();
      

    return redirect('/admin/berita')->with('success', 'Data berhasil diupdate');
  }

  public function exportPdf()
    {
        $berita = DB::table('berita')->get();

        $pdf = Pdf::loadView('admin.berita.berita_pdf', [
            'berita' => $berita
        ]);

        return $pdf->download('data-berita.pdf');
    }
}
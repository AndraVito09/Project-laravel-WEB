<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tambahguru;
 use Barryvdh\DomPDF\Facade\Pdf;
 
class Gurucontroller extends Controller
{
    public function guru()
    {
        $guru = DB::select('SELECT * FROM guru order by nama ASC');
        return view('admin.guru.guru' ,['arrayguru' => $guru]);
    }

    public function cari (Request $request)
    {
        $cari = $request->cari;

        $guru = DB::table('guru')
        ->where(function ($query) use ($cari){
            $query->where('nama', 'like', "%{$cari}%")
                  ->orWhere('nip', 'like', "%{$cari}%")
                  ->orWhere('email', 'like', "%{$cari}%")
                  ->orWhere('no_hp', 'like', "%{$cari}%");
        })
        ->paginate(10);

        return view('admin.guru.guru', ['arrayguru' => $guru]);

    }

    public function tambahguru()
    {
      return view('admin.guru.tambahguru',[]);
    }
    public function store(request $request)
    {
        $guru = new \App\Models\tambahguru();
        $guru->id_guru = $request->id_guru;
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->email = $request->email;
        $guru->no_hp = $request->no_hp;
        $guru->save();
        return redirect('/admin/guru')->with('success', 'Data berhasil ditambahkan');
    }
    public function hapus($id_guru)
    {
      $guru=\App\Models\tambahguru::find($id_guru);
      $guru->delete();
      return redirect('admin/guru')->with('success', 'Data Berhasil dihapus');
    }
    
    public function editguru($id_guru)
    {
        $guru = tambahguru::findOrFail($id_guru);
        return view('admin.guru.editguru', [
            'guru' => $guru,
        ]);
    }
    public function update(Request $request)
    {

    $guru = tambahguru::findOrFail($request->id_guru);

    $guru->nip = $request->nip;
    $guru->nama = $request->nama;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->email = $request->email;
    $guru->no_hp = $request->no_hp;
    $guru->save();

    return redirect('/admin/guru')->with('success', 'Data berhasil diupdate');
  }

  public function exportPdf()
    {
        $guru = DB::table('guru')->get();

        $pdf = Pdf::loadView('admin.guru.guru_pdf', [
            'guru' => $guru
        ]);

        return $pdf->download('data-guru.pdf');
    }
}
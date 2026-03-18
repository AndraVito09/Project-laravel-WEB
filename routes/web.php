<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Siswacontroller;
use App\Http\Controllers\Gurucontroller;
use App\Http\Controllers\Kelascontroller;
use App\Http\Controllers\Beritacontroller;
use App\Http\Controllers\Mapelcontroller;
use App\Http\Controllers\Mapeldiampucontroller;
use App\Http\Controllers\Nilaicontroller;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/', function () {
    return view('welcome');
    });

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

});

#Guru

#Siswa----------------------------------


Route::get('/siswa/siswa', 
[Siswacontroller::class, 'siswa']);

Route::get('siswa/guru',
[Gurucontroller::class, 'guru']);

Route::get('siswa/kelas',
[Kelascontroller::class, 'kelas']);

Route::get('siswa/berita',
[Beritacontroller::class, 'berita']);

Route::get('siswa/mapel',
[Mapelcontroller::class, 'mapel']);

Route::get('siswa/mapeldiampu',
[Mapeldiampucontroller::class, 'mapeldiampu']);

Route::get('siswa/nilai', 
[Nilaicontroller::class, 'nilai']);

#admin-------------------------------

Route::middleware(['auth'])->group(function () {
    
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
});

Route::get('admin/siswa', 
[Siswacontroller::class, 'siswa']);
route::get('admin/tambahsiswa', 
[Siswacontroller::class, 'tambahsiswa']);
route::post('admin/siswa/store', 
[Siswacontroller::class, 'store']);
route::get('/admin/hapussiswa/{id_siswa}', 
[Siswacontroller::class, 'hapus'])->name('admin/hapussiswa/{id_siswa}');
route::get('/admin/editsiswa/{id_siswa}',
 [Siswacontroller::class, 'editsiswa'])->name('editsiswa');
route::post('/admin/siswa/update',
 [Siswacontroller::class, 'update'])->name('admin.siswa.update');
Route::get('admin/siswa/cari',
[ Siswacontroller::class, 'cari']);
Route::get('/admin/siswa/export/pdf', [Siswacontroller::class, 'exportPdf'])
    ->name('siswa.export.pdf');


Route::get('admin/guru',
[Gurucontroller::class, 'guru']);
route::get('admin/tambahguru',
[Gurucontroller::class, 'tambahguru']);
route::post('admin/guru/store',
[Gurucontroller::class, 'store']);
Route::get('admin/hapusguru/{id_guru}',
[Gurucontroller::class, 'hapus'])->name('admin/hapusguru/{id_guru}');
route::get('/admin/editguru/{id_guru}',
[Gurucontroller::class, 'editguru'])->name('editguru');
route::post('/admin/guru/update',
[Gurucontroller::class, 'update'])->name('admin/guru/update');
Route::get('admin/guru/cari',
[Gurucontroller::class, 'cari']);
Route::get('/admin/guru/export/pdf', 
[Gurucontroller::class, 'exportPdf'])->name('guru.export.pdf');

Route::get('admin/kelas',
[Kelascontroller::class, 'kelas']);
route::get('admin/tambahkelas',
[Kelascontroller::class, 'tambahkelas']);
route::post('admin/kelas/store',
[Kelascontroller::class, 'store']);
Route::get('admin/hapuskelas/{id_kelas}',
[Kelascontroller::class, 'hapus'])->name('admin/hapuskelas/{id_kelas}');
route::get('/admin/editkelas/{id_kelas}',
 [Kelascontroller::class, 'editkelas'])->name('editkelas');
route::post('/admin/kelas/update',
 [Kelascontroller::class, 'update'])->name('admin.kelas.update');
 Route::get('admin/kelas/cari',
[Kelascontroller::class, 'cari']);
Route::get('/admin/kelas/export/pdf', [Kelascontroller::class, 'exportPdf'])
    ->name('kelas.export.pdf');

Route::get('admin/berita',
[Beritacontroller::class, 'berita']);
Route::get('admin/tambahberita',
[Beritacontroller::class, 'tambahberita']);
Route::post('admin/berita/store',
[Beritacontroller::class, 'store']);
Route::get('admin/hapusberita/{id_berita}',
[Beritacontroller::class, 'hapus'])->name('admin/hapusberita/{id_berita}');
route::get('/admin/editberita/{id_berita}',
 [Beritacontroller::class, 'editberita'])->name('editberita');
route::post('/admin/berita/update',
 [Beritacontroller::class, 'update'])->name('admin.berita.update');
 Route::get('admin/berita/cari',
[Beritacontroller::class, 'cari']);
Route::get('/admin/betita/export/pdf', 
[Beritacontroller::class, 'exportPdf'])->name('berita.export.pdf');

Route::get('admin/mapel',
[Mapelcontroller::class, 'mapel']);
Route::get('admin/tambahmapel',
[Mapelcontroller::class, 'tambahmapel']);
Route::post('admin/mapel/store',
[Mapelcontroller::class, 'store']);
Route::get('admin/hapusmapel/{id_mapel}',
[Mapelcontroller::class, 'hapus'])->name('admin/hapusmapel/{id_ampu}');
Route::get('admin/editmapel/{id_mapel}',
[Mapelcontroller::class, 'editmapel'])->name('editmapel');
Route::post('admin/mapel/update',
[Mapelcontroller::class, 'update'])->name('admin.mapel.update');
Route::get('admin/mapel/cari',
[Mapelcontroller::class, 'cari']);
Route::get('/admin/mapel/export/pdf', [Mapelcontroller::class, 'exportPdf'])
    ->name('mapel.export.pdf');

Route::get('admin/mapeldiampu',
[Mapeldiampucontroller::class, 'mapeldiampu']);
Route::get('admin/tambahmapeldiampu',
[Mapeldiampucontroller::class, 'tambahmapeldiampu']);
Route::post('admin/mapeldiampu/store',
[Mapeldiampucontroller::class, 'store']);
Route::get('/admin/hapusmapeldiampu/{id_ampu}',
[Mapeldiampucontroller::class, 'hapus'])->name('admin/hapusmapeldiampu/{id_ampu}');
Route::get('admin/editmapeldiampu/{id_ampu}',
[Mapeldiampucontroller::class, 'editmapeldiampu'])->name('editmapeldiampu');
Route::post('admin/mapeldiampu/update',
[Mapeldiampucontroller::class, 'update'])->name('admin.mapeldiampu.update');
Route::get('admin/mapeldiampu/cari',
[Mapeldiampucontroller::class, 'cari']);
Route::get('/admin/mapeldiampu/export/pdf', [Mapeldiampucontroller::class, 'exportPdf'])
    ->name('mapeldiampu.export.pdf');

Route::get('admin/nilai', 
[Nilaicontroller::class, 'nilai']);
Route::get('admin/tambahnilai', 
[Nilaicontroller::class, 'tambahnilai']);
Route::post('admin/nilai/store', 
[Nilaicontroller::class, 'store']);
route::get('/admin/hapusnilai/{id_nilai}', 
[Nilaicontroller::class, 'hapus'])->name('admin/hapusnilai/{id_nilai}');
Route::get('admin/editnilai/{id_nilai}',
[Nilaicontroller::class, 'editnilai'])->name('editnilai');
Route::post('admin/nilai/update',
[Nilaicontroller::class, 'update'])->name('admin.nilai.update');
Route::get('admin/nilai/cari',
[Nilaicontroller::class, 'cari'])->name('nilai.search');
Route::get('/admin/nilai/export/pdf', [Nilaicontroller::class, 'exportPdf'])
    ->name('nilai.export.pdf');

});


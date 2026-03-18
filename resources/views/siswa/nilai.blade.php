<h1>Halaman Data Nilai</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Nilai</th>
        <th>ID Siswa</th>
        <th>ID Ampu</th>
        <th>ID Semester</th>
        <th>Nilai Tugas</th>
        <th>NIlai UTS</th>
        <th>Nilai Akhir</th>
        <th>Aksi</th>
    </tr>
    @foreach ($arraynilai as $key => $nilai)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $nilai->id_nilai }}</td>
        <td>{{ $nilai->id_siswa }}</td>
        <td>{{ $nilai->id_ampu }}</td>
        <td>{{ $nilai->semester }}</td>
        <td>{{ $nilai->nilai_tugas }}</td>
        <td>{{ $nilai->nilai_uts }}</td>
        <td>{{ $nilai->nilai_akhir }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
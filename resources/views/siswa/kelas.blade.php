<h1>Halaman Data Kelas</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Kelas</th>
        <th>Nama Kelas</th>
        <th>Jurusan</th>
    </tr>
    @foreach ($arraykelas as $key => $kelas)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $kelas->id_kelas }}</td>
        <td>{{ $kelas->nama_kelas }}</td>
        <td>{{ $kelas->jurusan }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
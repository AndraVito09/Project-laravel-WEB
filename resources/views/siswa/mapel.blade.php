<h1>Halaman Data Mapel</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Mapel</th>
        <th>Nama Mapel</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    @foreach ($arraymapel as $key => $mapel)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mapel->id_mapel }}</td>
        <td>{{ $mapel->nama_mapel }}</td>
        <td>{{ $mapel->kategori }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
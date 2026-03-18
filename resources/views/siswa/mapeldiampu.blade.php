<h1>Halaman Data Mapel Diampu</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Ampu</th>
        <th>ID Guru</th>
        <th>ID Mapel</th>
        <th>ID Kelas</th>
        <th>Aksi</th>
    </tr>
    @foreach ($arraymapeldiampu as $key => $mapeldiampu)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $mapeldiampu->id_ampu }}</td>
        <td>{{ $mapeldiampu->id_guru }}</td>
        <td>{{ $mapeldiampu->id_mapel }}</td>
        <td>{{ $mapeldiampu->id_kelas }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
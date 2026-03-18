<h1>Halaman Data Guru</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID_guru</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>NO HP</th>
        <th>Aksi</th>
    </tr>
    @foreach ($arrayguru as $key => $guru)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $guru->id_guru }}</td>
        <td>{{ $guru->nip }}</td>
        <td>{{ $guru->nama }}</td>
        <td>{{ $guru->jenis_kelamin }}</td>
        <td>{{ $guru->email }}</td>
        <td>{{ $guru->no_hp }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
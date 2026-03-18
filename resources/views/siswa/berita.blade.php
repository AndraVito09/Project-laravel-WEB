<h1>Halaman Data Berita</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>ID Berita</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Tanggal Post</th>
        <th>Id guru</th>
    </tr>
    @foreach ($arrayberita as $key => $berita)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $berita->id_berita }}</td>
        <td>{{ $berita->judul }}</td>
        <td>{{ $berita->isi }}</td>
        <td>{{ $berita->tanggal_post }}</td>
        <td>{{ $berita->id_guru }}</td>
        <td>{{ $guru->no_hp }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
<h1>Halaman Data Siswaaaa</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Foto</th>
        <th>Id Siswa</th>
        <th>Id Kelas</th>
        <th>Alamat</th>
        <th>NO HP</th>
    </tr>
    @foreach ($arraysiswa as $key => $siswa)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $siswa->nisn }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->jk }}</td>
        <td>{{ $siswa->tanggal_lahir }}</td>
        <td><img src = "{{ $siswa->foto }}" width='100'></td>
        <td>{{ $siswa->id_siswa }}</td>
        <td>{{ $siswa->id_kelas }}</td>
        <td>{{ $siswa->alamat }}</td>
        <td>{{ $siswa->no_hp }}</td>
        <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
        </td>
    </tr>
    @endforeach
    </table>
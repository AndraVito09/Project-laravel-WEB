<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width:100%;
            border-collapse: collapse;
        }
        table, th, td {
            border:1px solid black;
        }
        th, td {
            padding:6px;
            text-align:left;
        }
    </style>
</head>
<body>

<h3>Data Siswa</h3>

<table>
    <thead>
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
    </thead>
    <tbody>
        @foreach($siswa as $key => $s)
        <tr>
           <td>{{ $key + 1 }}</td>
        <td>{{ $s->nisn }}</td>
        <td>{{ $s->nama }}</td>
        <td>{{ $s->jk }}</td>
        <td>{{ $s->tanggal_lahir }}</td>
        <td><img src = "{{ $s->foto }}" width='100'></td>
        <td>{{ $s->id_siswa }}</td>
        <td>{{ $s->id_kelas }}</td>
        <td>{{ $s->alamat }}</td>
        <td>{{ $s->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

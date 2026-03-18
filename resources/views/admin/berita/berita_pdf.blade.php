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

<h3>Data Berita</h3>

<table>
    <thead>
        <tr>
        <th>No</th>
        <th>ID Berita</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Tanggal Post</th>
        <th>Id guru</th>
        </tr>
    </thead>
    <tbody>
        @foreach($berita as $key => $b)
        <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $b->id_berita }}</td>
        <td>{{ $b->judul }}</td>
        <td>{{ $b->isi }}</td>
        <td>{{ $b->tanggal_post }}</td>
        <td>{{ $b->id_guru }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

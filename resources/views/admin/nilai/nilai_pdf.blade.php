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

<h3>Data Nilai</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
        <th>ID Nilai</th>
        <th>ID Siswa</th>
        <th>ID Ampu</th>
        <th>Semester</th>
        <th>Nilai Tugas</th>
        <th>NIlai UTS</th>
        <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nilai as $key => $n)
        <tr>
<td>{{ $key + 1 }}</td>
        <td>{{ $n->id_nilai }}</td>
        <td>{{ $n->id_siswa }}</td>
        <td>{{ $n->id_ampu }}</td>
        <td>{{ $n->semester }}</td>
        <td>{{ $n->nilai_tugas }}</td>
        <td>{{ $n->nilai_uts }}</td>
        <td>{{ $n->nilai_akhir }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

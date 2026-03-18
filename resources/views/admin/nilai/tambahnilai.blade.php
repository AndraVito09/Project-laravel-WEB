@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH DATA NILAI</h3>
	<form method="post" action="{{ url('admin/nilai/store') }}">@csrf
<table>
			<tr>
				<td>Nama</td>
				<td><select name="id_siswa" required>
    ‎           <option value="">----</option>
                @foreach($siswa as $s)
                <option value="{{$s->id_siswa}}">{{$s->nama}}</option>
                @endforeach
            </select>
            </td>
			</tr>
			<tr>
				<td>Mapel Ampu</td>
				<td><select name="id_ampu" required>
    ‎           <option value="">----</option>
                @foreach($mapeldiampu as $ma)
                <option value="{{$ma->id_ampu}}">{{ $ma->id_ampu}} - {{$ma->nama_mapel}} - {{$ma->nama}}</option>
                @endforeach
            </select></td>
			</tr>
       <tr>
				<td>Semester</td>
				<td><input type="text" name="semester" required></td>
			</tr>
            <tr>
				<td>Nilai Tugas</td>
				<td><input type="float" name="nilai_tugas"></td>
			</tr>
            <tr>
				<td>Nilai UTS</td>
				<td><input type="float" name="nilai_uts"></td>
			</tr>
			<tr>
				<td>Nilai Akhir</td>
				<td><input type="float" name="nilai_akhir"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
			<tr>
				<td><a href="{{url('admin/nilai')}}" class="btn-back">Batal</a></td>
			</tr>
		</table>
	</form>
</div>
</div>
@endsection
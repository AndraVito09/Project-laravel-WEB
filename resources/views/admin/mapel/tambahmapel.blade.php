@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH MATA PELAJARAN</h3>
	<form method="post" action="{{ url('admin/mapel/store') }}">@csrf
<table>
			<tr>
				<td>Nama Mapel</td>
				<td><input type="text" name="nama_mapel" required></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td><select name="kategori" required>
						<option value="Produktif">produktif</option>
						<option value="Adaptif">Adaptif</option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/mapel')}}" class="btn-back">batal</a></td>
				</tr>		
		</table>
	</form>
</div>
</div>
@endsection
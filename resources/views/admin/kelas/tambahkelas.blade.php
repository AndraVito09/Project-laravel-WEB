@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH DATA KELAS</h3>
	<form method="post" action="{{ url('admin/kelas/store') }}">@csrf
<table>
			<tr>
				<td>Nama Kelas</td>
				<td><input type="text" name="nama_kelas" required></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" name="jurusan" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
			<tr>
					<td></td>
					<td><a href="{{url('admin/kelas')}}" class="btn-back">batal</a></td>
				</tr>		
		</table>
	</form>
</div>
</div>
@endsection
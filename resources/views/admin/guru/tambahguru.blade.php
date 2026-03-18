@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH DATA GURU</h3>
	<form method="post" action="{{ url('admin/guru/store') }}">@csrf
<table>
			<tr>
				<td>NIP</td>
				<td><input type="text" name="nip" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Jenis kelamin</td>
				<td><select name="jenis_kelamin" required>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</td>
			</tr>
      <tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td><input type="text" name="no_hp"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
			<tr>
					<td></td>
					<td><a href="{{url('admin/guru')}}" class="btn-back">batal</a></td>
				</tr>		
		</table>
	</form>
</div>
</div>
@endsection
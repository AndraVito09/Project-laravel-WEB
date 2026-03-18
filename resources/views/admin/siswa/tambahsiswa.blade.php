@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
<h3>TAMBAH DATA Siswa</h3>
		<form method="post" action="{{ url('admin/siswa/store') }}">@csrf
<table>
				<tr>			
					<td>NISN</td>
					<td><input type="text" name="nisn" required></td>
				</tr>
				<tr>
					<td>NAMA</td>
					<td><input type="text" name="nama" required></td>
				</tr>
				<tr>
					<td>Jenis kelamin</td>
					<td><select name="jk" required>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</td>
				</tr>
            <tr>
					<td>Tanggal lahir</td>
					<td><input type="date" name="tanggal_lahir" required></td>
				</tr>
            <tr>
					<td>Foto</td>
					<td><input type="text" name="foto"></td>
				</tr>
				<tr>
					<td>ID Kelas</td>
					<td><select name="id_kelas" required>
    ‎           <option value="">Pilih Kelas</option>
                @foreach($kelas as $k)
                <option value="{{$k->id_kelas}}">{{ $k->id_kelas}} - {{$k->nama_kelas}}</option>
                @endforeach
            </select>
        </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat"></td>
				</tr>
				<tr>
					<td>No Hp</td>
					<td><input type="int" name="no_hp"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN" ></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="{{url('admin/siswa')}}" class="btn-back">batal</a></td>
				</tr>		
			</table>
		</form>
</div>
</div>
@endsection
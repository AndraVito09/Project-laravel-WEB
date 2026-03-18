@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>TAMBAH DATA BERITA</h3>
	<form method="post" action="{{ url('admin/berita/store') }}">@csrf
<table>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" required></td>
			</tr>
			<tr>
				<td>Isi</td>
				<td><textarea name="isi" required></textarea></td>
			</tr>
      <tr>
				<td>Tanggal Post</td>
				<td><input type="datetime-local" step="1" name="tanggal_post" required></td>
			</tr>
      <tr>
				<td>ID_Guru</td>
				<td><select name="id_guru" required>
    ‎           <option value="">----</option>
                @foreach($guru as $g)
                <option value="{{$g->id_guru}}">{{ $g->id_guru}} - {{$g->nama}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
			<tr>
				<td><a href="{{url('admin/berita')}}" class="btn-back">Batal</a></td>
			</tr>		
		</table>
	</form>
</div>
</div>
@endsection
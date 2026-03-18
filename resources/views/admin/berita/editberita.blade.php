@extends('admin.Layout.AdminNavbarForm')
@section('content')
<div class="form-page">
<div class="form-container">
	<h3>EDIT DATA BERITA</h3>
	<form method="post" action="{{ url('admin/berita/update') }}"> {{ csrf_field() }}
<table>
			<tr>			
				<td></td>
				<td><input type="hidden" name="id_berita" value="{{$berita->id_berita}}"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" name="judul" value="{{$berita->judul}}" required></td>
			</tr>
			<tr>
				<td>Isi</td>
				<td><textarea name="isi" required>{{$berita->isi}}</textarea></td>
			</tr>
      <tr>
				<td>Tanggal Post</td>
				<td><input type="datetime-local" name="tanggal_post" step="1" value="{{$berita->tanggal_post}}" required></td>
			</tr>
      <tr>
				<td>ID_Guru</td>
				<td><select name="id_guru" required>
    ‎           <option value="">----</option>
                @foreach($guru as $g)
                @php $selected = ($g->id_guru == $berita->id_guru) ? 'selected' : ''; @endphp
                <option value="{{$g->id_guru}}" {{$selected}}>{{ $g->id_guru}} - {{$g->nama}}</option>
                @endforeach
            </select></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Update"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="{{url('admin/berita')}}" class="btn-back">Batal</a></td>
			</tr>	
		</table>
	</form>
</div>
</div>
@endsection
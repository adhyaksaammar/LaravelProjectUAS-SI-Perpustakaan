@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div>
				<a href="{{ route('anggota.create') }}" class="btn-sm btn-success">Tambah Data Anggota</a>	
			</div>
			<div class="card">
			  <div class="card-header">
			    <h2>Data Anggota</h2>
			  </div>
			  <div class="card-body">
			  		<table class="table table-striped" id="tabel">
						<thead>
							<th>ID Anggota</th>
							<th>Nama</th>
							<th>Fakultas</th>
							<th>Jenis Kelamin</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>No HP</th>
							<th>Status</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</thead>
						<tbody>
						@foreach ($datas as $data)
						<tr>
							<td>{{$data->id_anggota}}</td>
							<td>{{$data->nama}}</td>
							<td>{{$data->fakultas}}</td>
							<td>{{$data->jenis_kelamin}}</td>
							<td>{{$data->tempat_lahir}}</td>
							<td>{{$data->tanggal_lahir}}</td>
							<td>{{$data->no_hp}}</td>
							<td>{{$data->status_pinjam}}</td>
							<td>{{$data->alamat}}</td>
							<td>
								<a href="{{route('anggota.edit',['id'=>$data->id])}}" class="btn-sm btn-warning">Edit</a>
								<form action="{{route('anggota.destroy',['id'=>$data->id])}}" method="POST">
									{{ csrf_field() }} 
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn-sm btn-danger">Hapus</button>
								</form>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
			  </div>
			</div>			
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $('#tabel').DataTable();
    });
</script>

@endsection
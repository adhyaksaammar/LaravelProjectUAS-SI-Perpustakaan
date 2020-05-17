@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
				    <h2>Input Data Pegawai</h2>
				</div>
				<div class="card-body">
					@if (Count($errors) > 0 )
				  		<div class="alert alert-danger">
				  			<ul class="list-unstyled">
				  				@foreach ($errors->all() as $pesan)
				  				<li>{{$pesan}}</li>
				  				@endforeach
				  			</ul>
				  		</div>

				  		@endif

					<form action="{{ route('pegawai.store') }}" method="POST">

				  			@csrf

						  <div class="form-group">
						    <label for="id_pegawai">ID Pegawai</label>
						    <input type="text" name="id_pegawai" class="form-control" id="id_pegawai" placeholder="Id Pegawai">
						  </div>
						  <div class="form-group">
						    <label for="nama">Nama Pegawai</label>
						    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pegawai">
						  </div>
						  <div class="form-group">
						    <label for="jenis">Jenis Kelamin</label>
						    <select name="jenis_kelamin" id="" class="form-control">
						    	<option value="">--Pilih--</option>
						    	<option value="Pria">Pria</option>
						    	<option value="Wanita">Wanita</option>
						    </select>
						  </div>
						  <div class="form-group">
						    <label for="no_hp">Nomor HP</label>
						    <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No HP">
						  </div>
						  <div class="form-group">
						    <label for="alamat">Alamat Pegawai</label>
						    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Pegawai">
						  </div>

						  <button type="submit" class="btn btn-primary">Simpan</button>
					</form>
					
				</div>
			</div>	
		</div>
	</div>	
</div>

@endsection
@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
			  <div class="card-header">
			    Tambah Data Anggota
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
			  		<form action="{{ route('anggota.store') }}" method="POST">

			  			@csrf

			  		  <div class="form-group">
					    <label for="id_anggota">ID Anggota</label>
					    <input type="number" name="id_anggota" class="form-control" id="id_anggota" placeholder="ID Anggota">
					  </div>
					  <div class="form-group">
					    <label for="nama">Nama Anggota</label>
					    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anggota">
					  </div>
					  <div class="form-group">
					    <label for="fakultas">Fakultas</label>
					    <select name="fakultas" id="" class="form-control">
					    	<option value="">--Pilih--</option>
					    	<option value="Hukum">Hukum</option>
					    	<option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
					    	<option value="Ilmu Administrasi">Ilmu Administrasi</option>
					    	<option value="Pertanian">Pertanian</option>
					    	<option value="Peternakan">Peternakan</option>
					    	<option value="Teknik">Teknik</option>
					    	<option value="Kedokteran">Kedokteran</option>
					    	<option value="Perikanan & Ilmu Kelautan">Perikanan & Ilmu Kelautan</option>
					    	<option value="Matematika & Ilmu Pengetahuan Alam">Matematika & Ilmu Pengetahuan Alam</option>
					    	<option value="Teknologi Pertanian">Teknologi Pertanian</option>
					    	<option value="Ilmu Sosial & Politik">Ilmu Sosial & Politik</option>
					    	<option value="Ilmu Budaya">Ilmu Budaya</option>
					    	<option value="Kedokteran Hewan">Kedokteran Hewan</option>
					    	<option value="Ilmu Komputer">Ilmu Komputer</option>
					    	<option value="Kedokteran Gigi">Kedokteran Gigi</option>
					    	<option value="Vokasi">Vokasi</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="jenis">Jenis Kelamin</label>
					    <select name="jenis_kelamin" id="" class="form-control">
					    	<option value="">--Pilih--</option>
					    	<option value="Laki-Laki">Laki-Laki</option>
					    	<option value="Perempuan">Perempuan</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="tempat_lahir">Tempat Lahir</label>
					    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
					  </div>
					  <div class="form-group">
					    <label for="tanggal_lahir">Tanggal Lahir</label>
					    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
					  </div>
					  <div class="form-group">
					    <label for="no_hp">Nomor HP</label>
					    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor HP">
					  </div>
					  <div class="form-group">
					    <label for="status">Status Pinjam</label>
					    <select name="status_pinjam" id="" class="form-control">
					    	<option value="">--Pilih--</option>
					    	<option value="Bebas">Bebas</option>
					    	<option value="Tertanggung">Tertanggung</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="alamat">Alamat</label>
					    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
					  </div>

					  <button type="submit" class="btn btn-primary">Simpan</button>
					</form>
			  </div>
			</div>			
		</div>
	</div>
</div>
@endsection
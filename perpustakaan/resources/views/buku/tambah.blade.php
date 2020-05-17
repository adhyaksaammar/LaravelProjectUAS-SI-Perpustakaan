@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
			  <div class="card-header">
			    Tambah Data Buku
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
			  		<form action="{{ route('buku.store') }}" method="POST">

			  			@csrf

					  <div class="form-group">
					    <label for="kode_buku">Kode Buku</label>
					    <input type="text" name="kode_buku" class="form-control" id="kode_buku" placeholder="Kode Buku">
					  </div>
					  <div class="form-group">
					    <label for="kategori">Kategori</label>
					    <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Kategori">
					  </div>
					  <div class="form-group">
					    <label for="judul">Judul Buku</label>
					    <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Buku">
					  </div>
					  <div class="form-group">
					    <label for="pengarang">Pengarang Buku</label>
					    <input type="text" name="pengarang" class="form-control" id="pengarang" placeholder="Pengarang Buku">
					  </div>
					  <div class="form-group">
					    <label for="penerbit">Penerbit Buku</label>
					    <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Penerbit Buku">
					  </div>
					  <div class="form-group">
					    <label for="tahun">Tahun Terbit</label>
					    <input type="number" name="tahun" class="form-control" id="tahun" placeholder="Tahun Terbit">
					  </div>
					  <div class="form-group">
					    <label for="jumlah">Jumlah Buku</label>
					    <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah Buku">
					  </div>

					  <button type="submit" class="btn btn-primary">Simpan</button>
					</form>
			  </div>
			</div>			
		</div>
	</div>
</div>
@endsection
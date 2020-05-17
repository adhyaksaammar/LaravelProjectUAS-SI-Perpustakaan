@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Edit Data Peminjaman
				</div>
				<div class="card-body">
					{!! Form::model($data, ['route'=> ['peminjaman.update',$data->id], 'method'=>'PUT']) !!}

						<div class="form-group">
							{!! Form::text('no_pinjam', null, ['class'=>'form-control','id'=>'no_pinjam']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('id_anggota', null, ['class'=>'form-control','id'=>'id_anggota']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('id_buku', null, ['class'=>'form-control','id'=>'id_buku']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('tanggal_pinjam', null, ['class'=>'form-control','id'=>'tanggal_pinjam']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('lama_pinjam', null, ['class'=>'form-control','id'=>'lama_pinjam']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('tanggal_kembali', null, ['class'=>'form-control','id'=>'tanggal_kembali']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('id_pegawai', null, ['class'=>'form-control','id'=>'id_pegawai']) !!}
						</div>
											
						{!! Form::submit('Simpan', ['class'=>'btn-sm btn-success']) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection
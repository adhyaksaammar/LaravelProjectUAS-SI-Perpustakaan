@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Edit Data Pegawai
				</div>
				<div class="card-body">
					{!! Form::model($data, ['route'=> ['pegawai.update',$data->id], 'method'=>'PUT']) !!}

						<div class="form-group">
							{!! Form::text('id_pegawai', null, ['class'=>'form-control','id'=>'id_pegawai']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('nama', null, ['class'=>'form-control','id'=>'nama']) !!}
						</div>
						<div class="form-group">
							{{-- {!! Form::select('jenis_kelamin', $data->jenis_kelamin,'Pilih', ['class'=>'form-control']) !!} --}}
								<select name="jenis_kelamin" id="" class="form-control">
									<option {{old('jenis_kelamin',$data->jenis_kelamin)=="Pria"? 'selected':''}} value="Pria">Pria</option>
									<option {{old('jenis_kelamin',$data->jenis_kelamin)=="Wanita"? 'selected':''}} value="Wanita">Wanita</option>
								</select>	
						</div>
						<div class="form-group">
							{!! Form::text('no_hp', null, ['class'=>'form-control','id'=>'no_hp']) !!}
						</div>
						<div class="form-group">
							{!! Form::text('alamat', null, ['class'=>'form-control','id'=>'alamat']) !!}
						</div>
											
						{!! Form::submit('Simpan', ['class'=>'btn-sm btn-success']) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection
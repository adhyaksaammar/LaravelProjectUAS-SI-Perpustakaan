@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">
					Edit Data Anggota
				</div>
				<div class="card-body">
					{!! Form::model($data, ['route'=> ['anggota.update',$data->id], 'method'=>'PUT']) !!}

					<div class="form-group">
						{!! Form::text('nama', null, ['class'=>'form-control','id'=>'nama']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('id_anggota', null, ['class'=>'form-control','id'=>'id_anggota']) !!}
					</div>
					<div class="form-group">
						{{-- {!! Form::select('fakultas', $data->fakultas,'Pilih', ['class'=>'form-control']) !!} --}}
						<select name="fakultas" id="" class="form-control">
							<option {{old('fakultas',$data->fakultas)=="Hukum"? 'selected':''}} value="Hukum">Hukum</option>
							<option {{old('fakultas',$data->fakultas)=="Ekonomi & Bisnis"? 'selected':''}} value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
							<option {{old('fakultas',$data->fakultas)=="Ilmu Administrasi"? 'selected':''}} value="Ilmu Administrasi">Ilmu Administrasi</option>
							<option {{old('fakultas',$data->fakultas)=="Pertanian"? 'selected':''}} value="Pertanian">Pertanian</option>
							<option {{old('fakultas',$data->fakultas)=="Peternakan"? 'selected':''}} value="Peternakan">Peternakan</option>
							<option {{old('fakultas',$data->fakultas)=="Teknik"? 'selected':''}} value="Teknik">Teknik</option>
							<option {{old('fakultas',$data->fakultas)=="Kedokteran"? 'selected':''}} value="Kedokteran">Kedokteran</option>
							<option {{old('fakultas',$data->fakultas)=="Perikanan & Ilmu Kelautan"? 'selected':''}} value="Perikanan & Ilmu Kelautan">Perikanan & Ilmu Kelautan</option>
							<option {{old('fakultas',$data->fakultas)=="Matematika & Ilmu Pengetahuan Alam"? 'selected':''}} value="Matematika & Ilmu Pengetahuan Alam">Matematika & Ilmu Pengetahuan Alam</option>
							<option {{old('fakultas',$data->fakultas)=="Teknologi Pertanian"? 'selected':''}} value="Teknologi Pertanian">Teknologi Pertanian</option>
							<option {{old('fakultas',$data->fakultas)=="Ilmu Sosial & Politik"? 'selected':''}} value="Ilmu Sosial & Politik">Ilmu Sosial & Politik</option>
							<option {{old('fakultas',$data->fakultas)=="Ilmu Budaya"? 'selected':''}} value="Ilmu Budaya">Ilmu Budaya</option>
							<option {{old('fakultas',$data->fakultas)=="Kedokteran Hewa"? 'selected':''}} value="Kedokteran Hewan">Kedokteran Hewan</option>
							<option {{old('fakultas',$data->fakultas)=="Ilmu Komputer"? 'selected':''}} value="Ilmu Komputer">Ilmu Komputer</option>
							<option {{old('fakultas',$data->fakultas)=="Kedokteran Gigi"? 'selected':''}} value="Kedokteran Gigi">Kedokteran Gigi</option>
							<option {{old('fakultas',$data->fakultas)=="Vokasi"? 'selected':''}} value="Vokasi">Vokasi</option>
						</select>
					</div>
					<div class="form-group">
						{{-- {!! Form::select('jenis_kelamin', $data->jenis_kelamin,'Pilih', ['class'=>'form-control']) !!} --}}
						<select name="jenis_kelamin" id="" class="form-control">
							<option {{old('jenis_kelamin',$data->jenis_kelamin)=="Laki-Laki"? 'selected':''}} value="Laki-Laki">Laki-Laki</option>
							<option {{old('jenis_kelamin',$data->jenis_kelamin)=="Perempuan"? 'selected':''}} value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						{!! Form::text('tempat_lahir', null, ['class'=>'form-control','id'=>'tempat_lahir']) !!}
					</div>
					<div class="form-group">
						{!! Form::date('tanggal_lahir', null, ['class'=>'form-control','id'=>'tanggal_lahir']) !!}
					</div>
					<div class="form-group">
						{!! Form::number('no_hp', null, ['class'=>'form-control','id'=>'no_hp']) !!}
					</div>
					<div class="form-group">
						{{-- {!! Form::select('status_pinjam', $data->status_pinjam,'Pilih', ['class'=>'form-control']) !!} --}}
						<select name="status_pinjam" id="" class="form-control">
							<option {{old('status_pinjam',$data->status_pinjam)=="Bebas"? 'selected':''}} value="Bebas">Bebas</option>
							<option {{old('status_pinjam',$data->status_pinjam)=="Tertanggung"? 'selected':''}} value="Tertanggung">Tertanggung</option>
						</select>
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

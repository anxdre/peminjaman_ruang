@extends('layouts.stisla')
@section('section')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Data Ruang</h1>
			</div>
			<div class="section-body">
				<div class="card">
					<div class="card-header">
						<h4>Ruang</h4>
						<div class="card-header-action">
						</div>
					</div>
					<div class="card-body">
						<div class="container">
							<form action="{{ url('/edit/ruang/save') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="id" value="{{$ruang->id}}">
								<div class="form-group">
									<label>Nama Ruang</label>
									<input type="text" name="nama" placeholder="Nama Ruang" class="form-control" value="{{$ruang->name}}">
									@error('nama')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" name="harga" placeholder="Harga per Jam" class="form-control" min="1" value="{{$ruang->harga}}">
									@error('harga')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea name="desc" placeholder="Tentang Rungan ini" class="form-control" style="height: 50%" >{{$ruang->desc}}</textarea>
									@error('desc')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<div class="row">
								<div class="input-field col s6">
									<input type="file" id="inputgambar" name="gambar" class="validate"/ >
								</div>
								</div>
								<br>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
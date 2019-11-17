@extends('layouts.stisla')
@section('section')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Data Fasilitas</h1>
			</div>
			<div class="section-body">
				<div class="card">
					<div class="card-header">
						<h4>Fasilitas</h4>
						<div class="card-header-action">
						</div>
					</div>
					<div class="card-body">
						<div class="container">
							<form action="/new/fasilitas/save" method="POST">
								@csrf
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" placeholder="Nama Barang" class="form-control" >
									@error('nama')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<div class="form-group">
									<label>Harga</label>
									<input type="number" name="harga" placeholder="Harga Sewa" class="form-control" min="5000" >
									@error('harga')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<div class="form-group">
									<label>Jumlah</label>
									<input type="number" name="jumlah" placeholder="Jumlah Barang" class="form-control" min="1">
									@error('jumlah')
									    {{-- <div class="invalid-feedback"> --}}
									      <div style="color:red">{{ $message }}</div>
									    {{-- </div> --}}
									@enderror
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
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
					{{-- {{$errors->all()}} --}}
					<div class="container">
						<form action="/new/ruang/save" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Nama Ruang</label>
								<input type="text" name="nama" placeholder="Nama Ruang" class="form-control">
								@error('nama')
								{{-- <div class="invalid-feedback"> --}}
									<div style="color:red">{{ $message }}</div>
								{{-- </div> --}}
								@enderror
							</div>
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" placeholder="Kapasitas Ruang" class="form-control" min="1">
                                @error('kapasitas')
                                {{-- <div class="invalid-feedback"> --}}
                                <div style="color:red">{{ $message }}</div>
                                {{-- </div> --}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Panjang">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Lebar">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" placeholder="Warna Ruang" class="form-control">
                                @error('warna')
                                {{-- <div class="invalid-feedback"> --}}
                                <div style="color:red">{{ $message }}</div>
                                {{-- </div> --}}
                                @enderror
                            </div>
							<div class="form-group">
								<label>Harga</label>
								<input type="number" name="harga" placeholder="Harga per Jam" class="form-control" min="1">
								@error('harga')
								{{-- <div class="invalid-feedback"> --}}
									<div style="color:red">{{ $message }}</div>
								{{-- </div> --}}
								@enderror
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea name="desc" placeholder="Tentang Ruangan ini" class="form-control" style="height: 50%"></textarea>
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

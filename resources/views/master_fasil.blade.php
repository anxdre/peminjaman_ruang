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
							<a href="/new/fasilitas">
								<button class="btn btn-primary pull-right">
									<i class="fas fa-plus"></i> Tambah Fasilitas
								</button>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-md">
							<thead>
								<th>#</th>
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Action</th>
							</thead>
							<tbody>
								@foreach($fasils as $key => $fasil)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{ucfirst($fasil->nama)}}</td>
										<td>{{$fasil->jumlah}} buah</td>
										<td>Rp. {{$fasil->harga}}</td>
										<td>
											{{-- <button class="btn btn-primary btn-action mr-1"><i class="fas fa-pencil-alt"></i></button> --}}
											<a href="/edit/fasilitas/{{$fasil->id}}" class="btn btn-primary btn-action mr-1"><i class="fas fa-pencil-alt"></i></a>
											<a href="/delete/fasilitas/{{$fasil->id}}" onclick="return confirm('Apakah ingin menghapus fasilitas ?');" class="btn btn-danger btn-action mr-1"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{$fasils->links()}}
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
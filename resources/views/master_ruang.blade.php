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
							<a href="/new/ruang">
								<button class="btn btn-primary pull-right">
									<i class="fas fa-plus"></i> Tambah Ruang
								</button>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-md">
							<thead>
								<th>#</th>
								<th>Gambar</th>
								<th>Nama Ruang</th>
								<th>Status</th>
								<th>Harga</th>
								<th>Action</th>
							</thead>
							<tbody>
								@foreach($ruangs as $key => $ruang)
									<tr>
										<td>{{$key+1}}</td>
										<td>
											<img src="{{asset('image/ruang/'.$ruang->gambar)}}" style="width: 50px; height: 50px; object-fit: cover;">
										</td>
										<td>{{ucfirst($ruang->name)}}</td>
										<td>{{$ruang->status}}</td>
										<td>Rp. {{$ruang->harga}}</td>
										<td>
											{{-- <button class="btn btn-primary btn-action mr-1"><i class="fas fa-pencil-alt"></i></button> --}}
											<a class="btn btn-primary btn-action mr-1" href="/edit/ruang/{{$ruang->id}}"><i class="fas fa-pencil-alt"></i></a>
											<a href="/delete/ruang/{{$ruang->id}}" onclick="return confirm('Apakah ingin menghapus ruang ?');" class="btn btn-danger btn-action mr-1"><i class="fas fa-trash"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{$ruangs->links()}}
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
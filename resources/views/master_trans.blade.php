@extends('layouts.stisla')
@section('section')
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Data Transaksi</h1>
			</div>
			<div class="section-body">
				<div class="card">
					<div class="card-header">
						<h4>Riwayat Transaksi</h4>
						<div class="card-header-action">
							<a href="/new/transaksi">
								<button class="btn btn-primary pull-right">
									<i class="fas fa-plus"></i> Transaksi Baru
								</button>
							</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-md">
							<thead>
								<th>#</th>
								<th>Contact Person</th>
								<th>Total Harga</th>
								<th>Tanggal</th>
								<th>Jam</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<tbody>
								@foreach($transaksis as $key => $transaksi)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$transaksi->user->name}}</td>
									<td>Rp. {{$transaksi->total}}</td>
									<td>{{explode(' ', $transaksi->tgl_waktu)[0]}}</td>
									<td>{{explode(' ', $transaksi->tgl_waktu)[1]}}</td>
									<td>{{$transaksi->status}}</td>
									<td>
										@if ($transaksi->status == "PENDING")
											<a href="/confirm/transaksi/{{$transaksi->id}}" class="btn btn-success" onclick="return confirm('Apakah ingin menyetujui transaksi ini ?');"><i class="fas fa-check-square"></i></a>
											<a href="/reject/transaksi/{{$transaksi->id}}" class="btn btn-danger" onclick="return confirm('Apakah ingin menolak transaksi ini ?');"><i class="fas fa-window-close"></i></a>
										@endif
										@if ($transaksi->status != "PENDING")
											<a href="/delete/transaksi/{{$transaksi->id}}"  onclick="return confirm('Apakah ingin menghapus transaksi ini ?');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$transaksis->links()}}
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
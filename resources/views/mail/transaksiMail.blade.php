{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{-- <script src="{{ asset('js/app.js') }}"></script>--}}
{{-- @include('util.bsmail')--}}
 @if ($transaksi->status == "ACCEPTED")
 	<section class="section">
 	<div class="section-header">
 		<h1>Invoice</h1>
 	</div>
 	@php
 		$total = 0;
 	@endphp
 	<div class="section-body">
 		<div class="invoice">
 			<div class="invoice-print">
 				<div class="row">
 					<div class="col-lg-12">
 						<div class="invoice-title">
 							<div class="invoice-number">Order #{{$transaksi->id}}</div>
 						</div>
 						<hr>
 						<div class="row">
 							<div class="col-md-6">
 								<address>
 									<strong>Billed To:</strong><br>
 									{{$transaksi->user->name}}<br>
 									{{$transaksi->user->email}}
 								</address>
 							</div>
 						</div>
 					</div>
 				</div>

 				<div class="row mt-4">
 					<div class="col-md-12">
 						<div class="section-title">Order Summary</div>
 						<div class="table-responsive">
 							<table style="width: 100%" class="table table-striped table-hover table-md" border="1">
 								<tr>
 									<th data-width="40">#</th>
 									<th>Item</th>
 									<th class="text-center">Price</th>
 									<th class="text-center">Quantity</th>
 									<th class="text-right">Totals</th>
 								</tr>

 								@foreach ($item as $i => $it)
 								@php
 									$total += ($it->jumlah*$it->fasilitas->harga);
 								@endphp
 								<tr>
 									<td>{{$i+2}}</td>
 									<td>{{$it->fasilitas->nama}}</td>
 									<td class="text-center">Rp. {{$it->fasilitas->harga}}</td>
 									<td class="text-center">{{$it->jumlah}}</td>
 									<td class="text-right">Rp. {{$it->jumlah*$it->fasilitas->harga}}</td>
 								</tr>
 								@endforeach
 							</table>
 						</div>
 						<div class="row mt-4">
 							<div class="col-lg-8">
 							</div>
 							<div class="col-lg-4 text-right">
 								<div class="invoice-detail-item">
 								</div>
 								<hr class="mt-2 mb-2">
 								<div class="invoice-detail-item">
 									<div class="invoice-detail-name">Total</div>
 									<div class="invoice-detail-value invoice-detail-value-lg">Rp. {{$transaksi->total}}</div>
 								</div>
 								<hr>
 								<p>Peminjaman anda telah disetujui, Silahkan datang ke kantor kami untuk melakukan pembayaran</p>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<hr>
 		</div>
 	</div>
 </section>
 @endif
 @if ($transaksi->status == "REJECTED")
 	<div>
 		Maaf, permintaan peminjaman anda ditolak, silahkan melalkukan peminjaman dengan tanggal yang berbeda
 	</div>
 @endif

<!DOCTYPE html>
<html>
<head>
	<title>Make Your Reservation</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="../modules/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../modules/css/all.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/css/components.css">
	<link rel="stylesheet" type="text/css" href="../modules/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="../modules/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
</head>
<body>
	<div id="app">
		@if(Auth::user()->priv_admin == "user")
		<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">

        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block text-primary">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
		@endif
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
						<div class="login-brand">
							My Rooms
						</div>
						@if (session('error'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						   {{ session('error') }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						@endif

						@if (session('success'))
						   <div class="alert alert-success alert-dismissible fade show" role="alert">
						   {{ session('success') }}
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
						@endif

						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Peminjaman Baru</h4>
									</div>
									<div class="card-body">
										<div class="row mt-4">
											<div class="col-12 col-lg-8 offset-lg-2">
												<div class="wizard-steps">
													<div id="wiz-tab-1" class="wizard-step wizard-step-active">
														<div class="wizard-step-icon">
															<i class="far fa-user"></i>
														</div>
														<div class="wizard-step-label">
															Data Pemesan
														</div>
													</div>
													<div id="wiz-tab-2" class="wizard-step">
														<div class="wizard-step-icon">
															<i class="fas fa-box-open"></i>
														</div>
														<div class="wizard-step-label">
															Daftar Pinjaman
														</div>
													</div>
													<div id="wiz-tab-3" class="wizard-step">
														<div class="wizard-step-icon">
															<i class="fas fa-file-invoice"></i>
														</div>
														<div class="wizard-step-label">
															Konfirmasi
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="wizard-content mt-2">
											<div class="wizard-pane wiz-1">
												<form method="POST" action="/new/transaksi/save" id="form-trans">
													@csrf
													<div class="form-group row align-items-center">
														<label class="col-md-4 text-md-right text-left">Name</label>
														<div class="col-lg-4 col-md-6">
															<input id="nama-pemesan" type="text" name="name" class="form-control" readonly value="{{Auth::user()->name}}">
														</div>
													</div>
													<div class="form-group row align-items-center">
														<label class="col-md-4 text-md-right text-left">Email</label>
														<div class="col-lg-4 col-md-6">
															<input type="email" name="email" class="form-control" readonly value="{{Auth::user()->email}}">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 text-md-right text-left mt-2">Ruang</label>
														<div class="col-lg-4 col-md-6">
															<select id="ruang" class="form-control select2" name="ruang">
																@foreach($ruangs as $ruang)
																<option data-harga="{{$ruang->harga}}" value="{{$ruang->id}}">{{$ruang->name}}</option>
																@endforeach
															</select>
														</div>

													</div>
													<div class="form-group row">
														<label class="col-md-4 text-md-right text-left mt-2">Tanggal</label>
														<div class="col-lg-4 col-md-6">
															<input id="tgl" type="text" class="form-control datepicker" name="tgl">
															@error('tgl')
															    <span class="invalid-feedback" role="alert">
															        <div style="color:red">{{ $message }}</div>
															    </span>
															@enderror
														</div>
													</div>
													<div class="form-group row">
														<label class="col-md-4 text-md-right text-left mt-2">Jam</label>
														<div class="col-lg-4 col-md-6">
															<input id="waktu" type="text" class="form-control timepicker" name="waktu">
														</div>
														@error('waktu')
														    <span class="invalid-feedback" role="alert">
														        <div style="color:red">{{ $message }}</div>
														    </span>
														@enderror
													</div>
													<div class="form-group row">
														<div class="col-md-4"></div>
														<div class="col-lg-4 col-md-6 text-right">
															<button id="btn-next-1" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
														</div>
													</div>
													<input type="hidden" name="total" id="total">
												</form>
											</div>
											<div class="wizard-pane wiz-2" style="display: none">
												<form method="POST" id="form-cart" action="{{url('/new/cart')}}">
													@csrf

													<div class="form-group">
														<label>Fasilitas</label>
														<select id="fasil" class="form-control select2" name="fasil">
														</select>
													</div>
													<div class="form-group">
														<label>Jumlah</label>
														<input class="form-control" type="number" name="jumlah" placeholder="Jumlah" id="jumlah_fasil" min="0">
													</div>
													<button type="submit" class="btn btn-primary" id="save-cart"><i class="fas fa-plus"></i> Add</button>
												</form>
												<hr>
												<table class="table table-bordered table-md">
													<thead>
														<th>Nama Fasilitas</th>
														<th>Jumlah</th>
														<th>Harga</th>
														<th>Action</th>
													</thead>
													<tbody id="tbody-cart">
														{{--  --}}
													</tbody>
												</table>
												<div class="form-group row">
													<div class="col-md-6 col-md-6">
														<button id="btn-prev-2" class="btn btn-icon icon-left btn-primary">Previous <i class="fas fa-arrow-left"></i></button>
													</div>
													<div class="col-lg-6 col-md-6 text-right">
														<button id="btn-next-2" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
													</div>
												</div>
											</div>
											<div class="wizard-pane wiz-3" style="display: none">
												<div class="invoice-print">

													<div class="row">
													  <div class="col-lg-12">
													    <hr>
													    <div class="row">
													      <div class="col-md-6">
													        <address>
													          <strong>Billed To:</strong><br>
													            <p id="nama-invoice"></p><br>
													        </address>
													      </div>
													      <div class="col-md-6 text-md-right">
													      </div>
													    </div>
													    <div class="row">
													      <div class="col-md-6">
													      	<address>
													          <strong>Order Date:</strong><br>
													          <p id="tgl-invoice"></p><br><br>
													        </address>
													      </div>
													      <div class="col-md-6 text-md-right">

													      </div>
													    </div>
													  </div>
													</div>

													<div class="row mt-4">
													  <div class="col-md-12">
													    <div class="section-title">Order Summary</div>
													    <div class="table-responsive">
													      <table class="table table-striped table-hover table-md">
													      	<thead>
													      		<tr>
													      		  <th data-width="40" style="width: 40px;">No</th>
													      		  <th>Item</th>
													      		  <th class="text-center">Price</th>
													      		  <th class="text-center">Quantity</th>
													      		  <th class="text-right">Totals</th>
													      		</tr>
													      		<tr>
													      			<th data-width="40" style="width: 40px;">#</th>
													      			<th id="th-ruang"></th>
													      			<th id="th-ruang-harga" class="text-center"></th>
													      			<th class="text-center"></th>
													      			<th id="th-ruang-total" class="text-right"></th>
													      		</tr>
													      	</thead>
													        <tbody id="tbody-invoice">
													      </tbody></table>
													    </div>
													    <div class="row mt-4">

													      <div class="col-lg-8">



													      </div><div class="col-lg-4 text-right">
													        <hr class="mt-2 mb-2">
													        <div class="invoice-detail-item">
													          <div class="invoice-detail-name">Total</div>
													          <div class="invoice-detail-value invoice-detail-value-lg"></div>
													        </div>
													      </div>
													    </div>
													  </div>
													</div>

												</div>
												<hr>
												<div class="form-group row">
													<div class="col-md-6 col-md-6">
														<button id="btn-prev-3" class="btn btn-icon icon-left btn-primary">Previous <i class="fas fa-arrow-left"></i></button>
													</div>
													<div class="col-lg-6 col-md-6 text-right">
														<button id="btn-next-final" class="btn btn-icon icon-right btn-primary">Finish <i class="fas fa-arrow-right"></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<script type="text/javascript" src="../modules/moment.min.js"></script>
	<script type="text/javascript" src="../modules/select2/dist/js/select2.full.min.js"></script>
	<script src="../modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="../modules/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript">
	  	//jangan disentuh :)
	  	$(document).ready(function() {
	  		// let bulan = {'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'};
	  		let grandTotal = 0;
	  		let harga = 0;
	  		let total = 0;
	  		$('.datepicker').daterangepicker({
	  			singleDatePicker:true
	  		});
	  		$('.timepicker').timepicker();
	  		$('#ruang').select2();
	  		$('#btn-next-1').click(function(event) {
	  			event.preventDefault();
	  			//wizard
	  			$('.wiz-1').css('display','none');
	  			$('#wiz-tab-1').removeClass('wizard-step-active');
	  			$('#wiz-tab-2').addClass('wizard-step-active');
	  			$('.wiz-2').css('display', 'block');
	  			//ajax
	  			console.log('{{url('/get/inventory/')}}/'+$('.datepicker').val());
	  			getCart();
	  			let html = '';
	  			$.ajax({
	  				type  : 'GET',
	  				url   : '{{url('/get/inventory/')}}/'+$('.datepicker').val(),
	  				async : true,
	  				dataType : 'json',
	  				success : function(data){
	  					for(let i = 0; i < data.length;i++){
	  						html += '<option data-stok="'+data[i].jumlah+'" value="'+data[i].id+'">'+data[i].nama+' '+data[i].harga+'</option>';
	  					}
	  					$('#fasil').html(html);
	  					$('#fasil').select2();
	  					$('#jumlah_fasil').attr('max', data[0].jumlah);
	  				}
	  			});//tab function jangan dirubah
	  		});
	  		$('#btn-next-2').click(function(event) {
	  			event.preventDefault();
	  			$('#tbody-invoice > tr').each(function(index, el) {
	  				grandTotal += parseInt($(this).find('td:eq(4)').text());
	  			});
	  			$('.invoice-detail-value-lg').html(grandTotal);
	  			$('#nama-invoice').html($('#nama-pemesan').val());
	  			$('#tgl-invoice').html($('#tgl').val());
	  			$('.wiz-2').css('display', 'none');
	  			$('.wiz-3').css('display', 'block');
	  			$('#wiz-tab-2').removeClass('wizard-step-active');
	  			$('#wiz-tab-3').addClass('wizard-step-active');//tab function jangan dirubah
	  		});
	  		$('#btn-prev-2').click(function(event) {
	  			event.preventDefault();
	  			$('.wiz-2').css('display', 'none');
	  			$('.wiz-1').css('display', 'block');
	  			$('#wiz-tab-2').removeClass('wizard-step-active');
	  			$('#wiz-tab-1').addClass('wizard-step-active');//tab function jangan dirubah
	  		});
	  		$('#btn-prev-3').click(function(event) {
	  			event.preventDefault();
	  			$('.wiz-3').css('display', 'none');
	  			$('.wiz-2').css('display', 'block');
	  			$('#wiz-tab-3').removeClass('wizard-step-active');
	  			$('#wiz-tab-2').addClass('wizard-step-active');//tab function jangan dirubah
	  		});
	  		$('#btn-next-final').click(function(event) {
	  			$('#total').val(grandTotal);
	  			$('#form-trans').submit();
	  		});
	  		$('#form-cart').submit(function(event) {
	  			console.log($('#form-cart').attr('action'));
	  			console.log($('#form-cart').serialize());
	  			event.preventDefault();
	  			// $('#form-cart').submit();
	  			$.ajax({
		            url : $(this).attr('action'),
		            type: "POST",
		            data: $(this).serialize(),
		            success: function (data) {
		            	console.log($('#form-cart').serialize());
		                getCart();
		            }
		        });
	  		});
	  		function getCart(){
	  			let content = '';
	  			let contentInvoice = '';
	  			$.ajax({
	  				type  : 'GET',
	  				url   : '{{url('/get/cart')}}',
	  				async : true,
	  				dataType : 'json',
	  				success : function(data){
	  					for(let i = 0; i < data.length;i++){
	  						content += '<tr>'+
											'<td>'+data[i].fasil.nama+'</td>'+
											'<td>'+data[i].jumlah+'</td>'+
											'<td>'+data[i].fasil.harga*data[i].jumlah+'</td>'+
											'<td><button data-id="'+data[i].id+'" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td>'+
										'</tr>';
							contentInvoice += '<tr>'+
										          '<td>'+(i+1)+'</td>'+
										          '<td>'+data[i].fasil.nama+'</td>'+
										          '<td class="text-center">'+data[i].fasil.harga+'</td>'+
										          '<td class="text-center">'+data[i].jumlah+'</td>'+
										          '<td class="text-right">'+data[i].fasil.harga*data[i].jumlah+'</td>'+
										        '</tr>';

	  					}
	  					$('#tbody-cart').html(content);
	  					$('#tbody-invoice').html(contentInvoice);
	  					// $('#fasil').select2();
	  					// $('#jumlah_fasil').attr('max', data[0].jumlah);
	  				}
	  			});
	  		}
	  		if ($('#ruang').val() != null) {
	  			grandTotal = parseInt($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang-harga').html($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang-total').html($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang').html($('#ruang :selected').text());
	  		}
	  		if ($('#fasil').val() != null) {
	  			let st = $('#fasil :selected').attr('data-stok');
	  			$('#jumlah_fasil').attr('max', st);
	  		}
	  		// $('table tr').each(function(){
	  		// 	if ($(this).find('td').eq(2).html() != null) {
	  		// 		total += parseInt($(this).find('td').eq(2).html());
	  		// 	}
	  		// });

	  		// $('#total').val(total);
	  		$('#ruang').on('change', function(){
	  			grandTotal = parseInt($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang-total').html($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang-harga').html($('#ruang :selected').attr('data-harga'));
	  			$('#th-ruang').html($('#ruang :selected').text());
	  		});
	  		$('#fasil').on('change',function() {
	  			$('#jumlah_fasil').attr('max', $('#fasil :selected').attr('data-stok'));
	  		});
	  		$(document).on('click','.btn-delete', function() {
	  			// event.preventDefault();
	  			console.log('{{url("/delete/cart/")."/"}}'+$(this).attr('data-id'));
	  			$.ajax({
	  				type  : 'GET',
	  				url   : '{{url("/delete/cart/")."/"}}'+$(this).attr('data-id'),
	  				async : true,
	  				dataType : 'json',
	  				success : function(data){
	  					getCart();
	  				}
	  			});
	  		});
	  	});
	  	//sampek sini jangan disentuh :)

	  </script>
	</body>
	</html>

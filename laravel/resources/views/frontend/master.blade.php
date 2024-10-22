<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="author" content="SemiColonWeb"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Stylesheets
	============================================= -->
<link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/style.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/swiper.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/dark.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/font-icons.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/animate.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/magnific-popup.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/custom.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/calendar.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/components/bs-datatable.css" type="text/css" />
<!-- NonProfit Demo Specific Stylesheet -->
<link rel="stylesheet" href="{{ asset('template/frontend') }}/css/colors.php?color=C6C09C" type="text/css"/>
<!-- Theme Color -->
<link rel="stylesheet" href="{{ asset('template/frontend') }}/nonprofit/css/fonts.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('template/frontend') }}/nonprofit/nonprofit.css" type="text/css"/>
<!-- / -->
<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
<!-- Document Title
	============================================= -->
<title>{{ $setting->website_title }}</title>
<link rel="icon" type="image/x-icon" href="{{ asset('template/frontend/images') }}/{{ $setting->favicon }}">


@include('frontend.css')
</head>
<body class="stretched">
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="clearfix">
	<!-- Header
		============================================= -->
	<header id="header" class="header-size-sm border-bottom-0" data-sticky-shrink="false">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row justify-content-lg-between">
				<!-- Logo
						============================================= -->
				<div id="logo" class="me-lg-5">
					<a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('template/frontend/images') }}/{{ $setting->logo }}"><img src="{{ asset('template/frontend/images') }}/{{ $setting->logo }}" alt="Logo"></a>
					<a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset('template/frontend/images') }}/{{ $setting->logo }}"><img src="{{ asset('template/frontend/images') }}/{{ $setting->logo }}" alt="Logo"></a>
				</div>
				<!-- #logo end -->
				<div class="header-misc">
				    @if (!session()->has('session_id_frontend'))
					<a href="javascript:void(0);" onclick="show_login()" class="button button-rounded button-light akunsaya"><div>Login</div></a>
					
					@else
					<div class="btn-group akunsaya">
						<button type="button" class="btn btn-custom">
						    @if(Session::has('session_image_frontend'))
						    <img class="img-pro" src="{{ asset('template/frontend/images/customer') }}/{{ Session::get('session_image_frontend') }}">
						    @else
						    <img class="img-pro" src="{{ asset('template/frontend/images/muslim.png') }}">
						    @endif
						    Akun Saya</button>
						<button type="button" class="btn btn-custom dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="visually-hidden">Toggle Dropdown</span>
						</button>
						<div class="dropdown-menu" style="">
							<a class="dropdown-item" href="{{ url('profil') }}">Profil</a>
							<a class="dropdown-item" href="{{ url('keanggotaan') }}">Keanggotaan</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('change_password') }}">Ubah Password</a>
							<a class="dropdown-item" href="{{ url('logout') }}">Keluar</a>
						</div>
					</div>
					@endif
				</div>
				<div id="primary-menu-trigger">
					<svg class="svg-trigger" viewbox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
				</div>
				<!-- Primary Navigation
						============================================= -->
				<nav class="primary-menu with-arrows me-lg-auto">
				<ul class="menu-container align-self-start">
					<li class="menu-item">
						<span class="menu-bg col-auto align-self-start d-flex"></span>
					</li>
					<li class="menu-item current">
						<a class="menu-link" href="{{ url('/') }}"><div>Home</div></a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="#"><div>Tentang</div></a>
						<ul class="sub-menu-container">
							<li class="menu-item">
								<a class="menu-link" href="{{ url('about') }}"><div>Tentang Kami</div></a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ url('rat') }}"><div>Rapat Anggota Tahunan (RAT)</div></a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ url('legal') }}"><div>Dokumen Legal</div></a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ url('term') }}"><div>Syarat Ketentuan</div></a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ url('ribadansolusinya') }}"><div>Riba & Solusinya</div></a>
							</li>
						</ul>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ url('product') }}"><div>Produk</div></a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ url('berita') }}"><div>Berita</div></a>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="#"><div>Bantuan</div></a>
						<ul class="sub-menu-container">
							<li class="menu-item">
								<a class="menu-link" href="{{ url('kalkulator') }}"><div>Kalkulator Pinjaman</div></a>
							</li>
							<li class="menu-item">
								<a class="menu-link" href="{{ url('faq') }}"><div>FAQ's</div></a>
							</li>
						</ul>
					</li>
					<li class="menu-item">
						<a class="menu-link" href="{{ url('contact') }}"><div>Kontak</div></a>
					</li>
				</ul>
				</nav>
				<!-- #primary-menu end --></div>
		</div>
	</div>
	<div class="header-wrap-clone"></div>
	</header>
	<!-- #header end -->
	 @yield('content')
	<div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="centerModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header"></div>
				<div class="modal-body body-modal">
					<div class="modal-container">
						<form id="form-login" type="POST">
							 @csrf <img class="img-login" src="{{ asset('template/frontend/images') }}/{{ $setting->logo }}">
							<div class="form-group">
								<input required type="text" id="login-username" name="login-username" class="form-control login-control" placeholder="masukkan email anda"></div>
							<div class="form-group">
								<input required id="login-password" name="login-password" type="password" class="form-control login-control" placeholder="masukkan password anda"></div>
							<a href="{{ url('lupa_password') }}" class="lupa-text">Lupa Password</a>
							<div style="margin-top:30px;"></div>
							<center><button class="tombol-login" type="submit">Login</button></center>
						</form>
						<div class="register-login">Belum punya akun silahkan <a class="tombol-daftar" href="{{ url('daftar') }}">Daftar<a></div>
					</div>
				</div>
				<div class="modal-footer">
					<!--<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>-->
				</div>
			</div>
		</div>
	</div>
	<div class="overlay" id="overlay" style="display:none;"></div>
	<img style="display:none;" id="loading" class="loading" src="{{ asset('template/frontend/images') }}/loading.gif">
	<div class="section section-details mb-0 bg-color mt-minus text-putih" style="padding: 30px 0 40px;">
		<div class="container clearfix">
			<div class="row">
				<div class="col-md-3 px-4 mb-5">
					<img class="logo-footer" src="{{ asset('template/frontend/images') }}/{{ $setting->footer_logo }}">
					<br></div>
				<div class="col-md-9 px-4 mb-5 mb-md-0">
					<strong>Phone :</strong> {{ $setting->phone }}<br>
					<strong>Email :</strong> {{ $setting->email }}
					<div style="margin-top:30px;" class="fw-medium mb-2 d-block">
						<strong>Lokasi :</strong> {{ $setting->lokasi }}.
					</div>
					<div class="fw-medium mb-2 d-block">{{ $setting->jam_kerja }}</div>
					<a href="{{ $setting->facebook }}" class="social-icon si-dark si-small si-facebook" title="Facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
					</a>
					<a href="{{ $setting->twitter }}" class="social-icon si-dark si-small si-twitter" title="Twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
					</a>
					<a href="{{ $setting->instagram }}" class="social-icon si-dark si-small si-instagram" title="Instagram">
					<i class="icon-instagram"></i>
					<i class="icon-instagram"></i>
					</a>
					<a href="{{ $setting->youtube }}" class="social-icon si-dark si-small si-youtube" title="You Tube">
					<i class="icon-youtube"></i>
					<i class="icon-youtube"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Footer
		============================================= -->
<footer id="footer">
<!-- Copyrights
			============================================= -->
<div id="copyrights">
	<div class="container clearfix">
		<div class="row justify-content-between align-items-center">
			<div class="col-md-6">
				 Copyrights &copy; <?= date('Y') ;?>
				 All Rights Reserved by KSSAS.<br>
				<div class="copyright-links">
					<a href="{{ url('term') }}">Syarat & Ketentuan</a> / <a href="{{ url('privacy') }}">Kebijakan Privasi</a>
				</div>
			</div>
			<div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
				<div class="copyrights-menu copyright-links clearfix">
					<a href="{{ url('/') }}">Home</a>/<a href="{{ url('/about') }}">Tentang Kami</a>/<a href="{{ url('/berita') }}">Berita</a>/<a href="{{ url('/faq') }}">FAQs</a>/<a href="{{ url('/contact') }}">Kontak</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- #copyrights end --></footer>
<!-- #footer end -->
<!-- Floating Contact
		============================================= -->
<div class="floating-contact-wrap wa-wrapper">
	<a href="https://api.whatsapp.com/send/?phone={{ $setting->whatsapp }}&text&type=phone_number&app_absent=0"
                target="_blank"><img class="whatsapp-btn" src="{{ asset('template/frontend/images/whatsapp.png') }}"></a>
</div>
</div>
<!-- #wrapper end -->
<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<!-- JavaScripts
	============================================= -->
<script src="{{ asset('template/frontend') }}/js/jquery.js"></script>
<script src="{{ asset('template/frontend') }}/js/plugins.min.js"></script>
<script src="{{ asset('template/frontend') }}/nonprofit/js/events.js"></script>
<script src="{{ asset('template/frontend') }}/js/components/bs-datatable.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


<!-- Footer Scripts
	============================================= -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDhy--rKY1Wu6qTakzK-UuIgPCaqmLOqig"></script>
<script src="{{ asset('template/frontend') }}/js/functions.js"></script>
<script>
		jQuery(document).ready( function($){
			var elementParent = $('.floating-contact-wrap');
			$('.floating-contact-btn, .btn-contact').off( 'click' ).on( 'click', function(e) {
				elementParent.toggleClass('active', );
				e.preventDefault(e);
			});
		});
		
		
		function formatRupiah(angka, prefix){
			var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
		}
</script>



@if($view == 'upload-baru')
<script>
    $("#form-upload-register").submit(function(e){
        $("#btn-submit-form").hide();
        e.preventDefault();
        $.ajax({
            url: "{{ route('upload.pendaftaran') }}",
            type: "POST",
            data : new FormData($('form')[0]),
            contentType:false,
            processData:false,
            success: function(data) {
                if(data.success) {
                    window.location = "{{ url('frontend_upload_anggota') }}";
                    $("#btn-submit-form").show();
                } else {
                    $("#btn-submit-form").show();
                }
                
                
            }
        })
    });
</script>

@endif
<script>
    // LOGIN 
    $("#form-login").submit(function(e){
       e.preventDefault();
       loading();
       $.ajax({
          url : "{{ route('frontend.login') }}",
          type : "POST",
          dataType : "JSON",
          data : $(this).serialize(),
          success : function(data) {
              console.log(data);
              unloading();
              if(data.success) {
                  show_alert("Login Sukses", "Login Berhasil", "success");
                  window.location = "{{ url('/keanggotaan') }}";
              } else {
                   show_alert("Login Gagal", data.message, "error");
              }
          }
       })
    });
    // END LOGIN
    function loading() {
        $("#overlay").show();
        $("#loading").show();
    }
    function unloading() {
        $("#overlay").hide();
        $("#loading").hide();
    }
    function show_alert(judul, text, icon) {
        Swal.fire({
          title: judul,
          text: text,
          icon: icon
        });
    }
    function show_login() {
        $("#modal-login").modal("show");
    }
    
   
</script>
 @if($view == 'register')
<script>
    $("#form-register").submit(function(e){
        e.preventDefault();
        loading();
        $.ajax({
          url : "{{ url('register') }}",
          type : "POST",
          dataType : "JSON",
          data : $(this).serialize(),
          success : function(data) {
              console.log(data);
              unloading();
              if(data.success) {
                  show_alert("Berhasil", data.message, "success");
                  reset_form();                              
              } else {
                  show_alert("Terjadi Kesalahan", data.message, "error");
              }
          }
        });
    });
    function reset_form() {
        $("#nama").attr("readonly", true);
        $("#tempat_lahir").attr("readonly", true);
        $("#tanggal_lahir").attr("readonly", true);
        $("#nip").attr("readonly", true);
        $("#fungsi").attr("readonly", true);
        $("#jenis_kelamin").attr("readonly", true);
        $("#telepon").attr("readonly", true);
        $("#email").attr("readonly", true);
        $("#alamat").attr("readonly", true);
        $("#nama_ibu").attr("readonly", true);
        $("#istri").attr("readonly", true);
        $("#lama_pemotongan").attr("readonly", true);
        $("#jumlah_potongan").attr("readonly", true);
        $("#mulai_berlaku").attr("readonly", true);
        $("#tahun").attr("readonly", true);
    }
</script>
 @endif @if($view == 'kalkulator')
<script>
    function hitung_simulasi() {
        var product = $("#product").val();
        var harga = $("#harga_beli").val();
        var dp = $("#dp").val();
        var lama = $("#lama").val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        if(product == '') {
            show_alert("Error", "Produk belum dipilih...!", "error")
        } 
        else if(lama == '') {
            show_alert("Error", "Lama pinjaman belum dipilih...!", "error")
        }
        else {
            loading();
            $.ajax({
                url : "{{ url('simulation_process') }}",
                type : "POST",
                dataType : "JSON",
                data : {"product":product, "harga":harga, "dp": dp, "lama":lama, "_token": csrf_token},
                success : function(data) {
                    unloading();
                    console.log(data);
                    $("#product_hasil").val(data.product);
                    $("#harga_beli_hasil").val(data.harga);
                    $("#dp_hasil").val(data.dp);
                    $("#harga_jual").val(data.selling_price);
                    $("#lama_hasil").val(data.lama);
                    $("#harga_angsur").val(data.pay_price);
                    $("#cicilan").val(data.pay_amount);
                    var HTML = '';
                    HTML += '<table id="table-alternative" class="table table-bordered table-striped mt-5">';
					HTML += '<tr><th colspan="3">ALTERNATIF CICILAN</th></tr>';
					HTML += '<tr><th>Lama Cicilan</th><th>Angsuran / Bulan</th><th>Harga KSSAS</th></tr>'; 
                    var dt = data.data;
                    for(var i=0; i< dt.length; i++) {
                        HTML += '<tr>';
                        HTML += '<td class="lama">'+dt[i].lama+'</td>';
                        HTML += '<td class="angsuran">'+dt[i].angsuran+'</td>';
                        HTML += '<td class="harga_jual">'+dt[i].harga_jual+'</td>';
                        HTML += '</tr>';
                    }
                    $("#table-one").hide();
                    $("#table-two").show();
                    $("#content-alternative").html(HTML);
                }
            })
        }
    }
    function new_simulasi() {
        reset_form();
        $("#table-one").show();
        $("#table-two").hide();
    }
    function reset_form() {
        $("#product").val("");
        $("#harga_beli").val("");
        $("#dp").val("");
        $("#lama").val("");
        $("#product_hasil").val("");
        $("#harga_beli_hasil").val("");
        $("#dp_hasil").val("");
        $("#harga_jual").val("");
        $("#lama_hasil").val("");
        $("#harga_angsur").val("");
        $("#cicilan").val("");
        $("#content-alternative").html("");
    }
</script>
 @endif
 
 @if($view == 'profil')
 <script>
     $('.img-edit').click(function(){ $('#file_image').trigger('click'); });
     
     $("#file_image").change(function() {
        document.getElementById('profile_image').src = window.URL.createObjectURL(this.files[0]); 
        $("#btn_ganti_gambar").show();
     });
     
     $("#form-profile").submit(function(e){
        e.preventDefault(); 
        loading();
        $.ajax({
          url : "{{ url('update_profile_image') }}",
          type : "POST",
          data : new FormData($('form')[0]),
          contentType:false,
          processData:false,
          success : function(data){
            console.log(data);
            if(data.success){
                unloading();
                show_alert("Sukses", data.message, "success");
                window.location = "{{ url('profil') }}";
            } else {
                unloading();
                show_alert("Gagal", data.message, "error");
            }
          }

      });
     });
     
 </script>
 
 @endif
 
 @if($view == 'change-password')
    <script>
        $("#form-password").submit(function(e){
           e.preventDefault();
           loading();
           $.ajax({
               url : "{{ url('update_password') }}",
               type : "POST",
               dataType : "JSON",
               data : $(this).serialize(),
               success : function(data) {
                   unloading();
                   if(data.success) {
                       show_alert("Sukses", data.message, "success");
                   } else {
                       var pesan = JSON.stringify(data.message);
                       show_alert("Gagal", pesan, "error");
                   }
               }
           }) 
        });
    </script>
 @endif
 
 @if($view == 'keanggotaan')
 <script>
    
    //  ===========================================================================
    //                                 TABLE SALDO PINJAMAN 
    // ============================================================================
    
    function hapusPembayaran(id) {
        var popup = confirm('Anda yakin ingin menghapus data pembayaran ini?');
        if(popup === true) {
            confirm_delete(id);    
        }
    }
    
    
    function confirm_delete(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "{{ url('pembayaran_delete') }}",
            type: "POST",
            dataType: "JSON",
            data: {"id":id, "_token":csrf_token},
            success: function(data) {
                tablePembayaran.ajax.reload(null, false);
            }
        })
    } 
    
    $("#payment_type").change(function(){
       var id = $(this).val();
       $.ajax({
         url: "{{ url('get_transaction_list') }}"+"/"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
             console.log(data);
             if(id == 1) {
                 var html = '';
                 html = '<option value="-1">Pembayaran Simpanan Wajib</option>';
             }
             else if(id == 2) {
                var html = '';
                for(var i=0; i<data.length; i++) {
                    html += '<option value="'+data[i].id+'">Pembiayaan Rp. '+formatRupiah(data[i].total_harga, '')+' - '+data[i].created_at+'</option>';
                }
                
             }
             
             $("#payment_transaction_list").html(html);
         }
         
       });
    });
    
    
    $("#form-pembayaran").submit(function(e){
        e.preventDefault();
        $.ajax({
             url : "{{ route('payment.with.type') }}",
             type : "POST",
             contentType:false,
             processData:false,
             data : new FormData($('#modal-pembayaran form')[0]),
             success : function(data) {
                 unloading();
                 if(data.success) {
                     $("#modal-pembayaran").modal("hide");
                     tablePembayaran.ajax.reload(null, false);
                     show_alert("Berhasil", data.message, "success");
                     
                 } else {
                     show_alert("Error", data.message, "error");
                 }
             }
        });
        
    });
    
    
    function tambah_pembayaran() {
       $("#modal-pembayaran").modal("show");
    }
      
    
    var tablePembayaran = $('#table-pembayaran').DataTable({
          dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
          ],
          processing:true,
          serverSide:true,
          ajax: "{{ route('table.pembayaran') }}",
          order: [[0, 'desc']],
          columns: [
            {data:'id', name: 'id'},
            {data:'image', name: 'image'},
            {data:'userid', name: 'userid'},
            {data:'description', name: 'description'},
            {data:'type', name: 'type'},
            {data:'pembiayaan', name: 'pembiayaan'},
            {data:'amount', name: 'amount'},
            {data:'payment_status', name: 'payment_status'},
            {data:'tanggal', name: 'tanggal'},
            {data:'action', name: 'action', orderable: false,  searchable:false}
        ]
      });
      
      
      
    
    var tablepinjaman = $('#table-saldo-pinjaman').DataTable({
          dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
          ],
          processing:true,
          serverSide:true,
          ajax: "{{ route('table.saldo.pinjaman') }}",
          order: [[0, 'desc']],
          columns: [
            {data:'id', name: 'id'},
            {data:'customer_id_pinjaman', name: 'customer_id_pinjaman'},
            {data:'product_id', name: 'product_id'},
            {data:'nilai_pengajuan', name: 'nilai_pengajuan'},
            {data:'dp', name: 'dp'},
            {data:'total_harga', name: 'total_harga'},
            {data:'sisa_dibayar', name: 'sisa_dibayar'},
            {data:'periode', name: 'periode'},
            {data:'angsuran_pokok', name: 'angsuran_pokok'},
            {data:'sudah_bayar', name: 'sudah_bayar'},
            {data:'sisa', name: 'sisa'},
            {data:'created_at', name: 'created_at'},
            {data:'action', name: 'action', orderable: false,  searchable:false}
        ]
      });
      
      
      function lihat_history(id) {
          loading();
          $.ajax({
              url : "{{ url('cek_saldo_pinjaman') }}"+"/"+id,
              type : "GET",
              success : function(data) {
                  unloading();
                  $("#content-saldo-pinjaman").html(data);
                  $("#modal-saldo-pinjaman").modal("show");
              }
          })
          
      }
      
      
      $("#btn_print_saldo_pinjaman").click(function(){
         var printContents = document.getElementById("section-to-print2").innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
         
     });  
      
      
    //  ===========================================================================
    //                                 TABLE PINJAMAN 
    // ============================================================================
      
     var imagePlaceholder = "{{ asset('template/frontend/images/image_placeholder.png') }}";
     var noImage = "{{ asset('template/frontend/images/noimage.png') }}";
        
     $('#display_image1').click(function(){ $('#image1').trigger('click'); });
     $('#display_image2').click(function(){ $('#image2').trigger('click'); });
     $('#display_image3').click(function(){ $('#image3').trigger('click'); });
     
     $("#image1").change(function() {
        document.getElementById('display_image1').src = window.URL.createObjectURL(this.files[0]);
        $("#tutup1").show();
     });
     
     $("#image2").change(function() {
        document.getElementById('display_image2').src = window.URL.createObjectURL(this.files[0]); 
        $("#tutup2").show();
     });
     
     $("#image3").change(function() {
        document.getElementById('display_image3').src = window.URL.createObjectURL(this.files[0]); 
        $("#tutup3").show();
     });
     
     $("#tutup1").click(function(){
         $("#display_image1").attr('src', imagePlaceholder);
         $("#image1").val(null);
         $(this).hide();
     });
     
     
     $("#tutup2").click(function(){
         $("#display_image2").attr('src', imagePlaceholder);
         $("#image2").val(null);
         $(this).hide();
     });
     
     
     $("#tutup3").click(function(){
         $("#display_image3").attr('src', imagePlaceholder);
         $("#image3").val(null);
         $(this).hide();
     });
     
     
     $(".reset-form").click(function() {
         reset_isian();
     });
     
     
     function reset_isian() {
         $("#tanggal_pensiun").val("");
         $("#tanggal_masuk_kerja").val("");
         $("#telepon").val("");
         $("#no_rekening").val("");
         $("#gaji_pokok").val("");
         $("#tunjangan_posisi").val("");
         $("#tunjangan_manajemen").val("");
         $("#tunjangan_daerah").val("");
         $("#shift_premium").val("");
         $("#tunjangan_lain").val("");
         $("#total_tunjangan").val("");
         $("#pajak_penghasilan").val("");
         $("#iuran_pensiun").val("");
         $("#jamsostek").val("");
         $("#potongan_kssas").val("");
         $("#potongan_selain_kssas").val("");
         $("#total_potongan").val("");
         $("#product_id").val("");
         $("#nilai_pengajuan").val("");
         $("#dp").val("");
         $("#periode").val("");
         $("#angsuran_jasa").val("");
         $("#potongan_baru").val("");
         $("#pembiayaan_lama").val("");
         $("#persentase").val("");
         $("#total_harga").val("");
         $("#sisa_dibayar").val("");
         $("#angsuran_pokok").val("");
         $("#saldo_gaji_netto").val("");
         $("#keterangan").val("");
         $("#komentar").val("");
         $("#image1").val(null);
         $("#image2").val(null);
         $("#image3").val(null);
         $("#display_image1").attr('src', imagePlaceholder);
         $("#display_image2").attr('src', imagePlaceholder);
         $("#display_image3").attr('src', imagePlaceholder);
         $("#tutup1").hide();
         $("#tutup2").hide();
         $("#tutup3").hide();
     }
     
     
      var tablepinjaman = $('#table-pinjaman').DataTable({
          dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
          ],
          processing:true,
          serverSide:true,
          ajax: "{{ route('table.pinjaman') }}",
          order: [[0, 'desc']],
          columns: [
            {data:'id', name: 'id'},
            {data:'customer_id_pinjaman', name: 'customer_id_pinjaman'},
            {data:'product_id', name: 'product_id'},
            {data:'nilai_pengajuan', name: 'nilai_pengajuan'},
            {data:'dp', name: 'dp'},
            {data:'total_harga', name: 'total_harga'},
            {data:'sisa_dibayar', name: 'sisa_dibayar'},
            {data:'periode', name: 'periode'},
            {data:'angsuran_pokok', name: 'angsuran_pokok'},
            {data:'status_loan', name: 'status_loan'},
            {data:'created_at', name: 'created_at'},
            {data:'action', name: 'action', orderable: false,  searchable:false}
        ]
      });
      
      
      function tambah_ajukan_pinjaman() {
          $("#metode").val('tambah');
          $(".modal-judul").text("Tambah Pengajuan Pembiayaan");
          $("#modal-pinjaman").modal("show");
      }
      
      function hitung_total_tunjangan() {
          var gajipokok = $("#gaji_pokok").val();
          if(gajipokok == '') {
              gajipokok = 0;
          }
          
          var tunjanganposisi = $("#tunjangan_posisi").val();
          if(tunjanganposisi == '') {
              tunjanganposisi = 0;
          }
          
          var tunjanganmanajemen = $("#tunjangan_manajemen").val();
          if(tunjanganmanajemen == '') {
              tunjanganmanajemen = 0;
          }
          
          
          var tunjangandaerah = $("#tunjangan_daerah").val();
          if(tunjangandaerah == '') {
              tunjangandaerah = 0;
          }
          
          var shiftpremium = $("#shift_premium").val();
          if(shiftpremium == '') {
              shiftpremium = 0;
          }
          
          var tunjanganlain = $("#tunjangan_lain").val();
          if(tunjanganlain == '') {
              tunjanganlain = 0;
          }
            
          var total_tunjangan = parseInt(gajipokok) + parseInt(tunjanganposisi) + parseInt(tunjanganmanajemen) + parseInt(tunjangandaerah) + parseInt(shiftpremium) + parseInt(tunjanganlain);      
          $("#total_tunjangan").val(total_tunjangan);
          kalkulasi_sisa_gaji();
      }
      
      
      $(".tunjangan").keyup(function(){
         hitung_total_tunjangan(); 
      });
      
      
      function hitung_total_potongan() {
          var pajak = $("#pajak_penghasilan").val();
          if(pajak == '') {
              pajak = 0;
          }
          
          var pensiun = $("#iuran_pensiun").val();
          if(pensiun == '') {
              pensiun = 0;
          }
          
          var jamsostek = $("#jamsostek").val();
          if(jamsostek == '') {
              jamsostek = 0;
          }
          
          
          var kssas = $("#potongan_kssas").val();
          if(kssas == '') {
              kssas = 0;
          }
          
          var selain_kssas = $("#potongan_selain_kssas").val();
          if(selain_kssas == '') {
              selain_kssas = 0;
          }
          
          
          var total_potongan = parseInt(pajak) + parseInt(pensiun) + parseInt(jamsostek) + parseInt(kssas) + parseInt(selain_kssas);      
          $("#total_potongan").val(total_potongan);  
          kalkulasi_sisa_gaji();
      }
      
      
      $(".potongan").keyup(function(){
         hitung_total_potongan(); 
      });
      
      
      
      $("#product_id").change(function(){
          var productId = $(this).val();
          loading();
          $.ajax({
              url: "{{ url('periode_by_product') }}"+"/"+productId,
              type: "GET",
              dataType: "JSON",
              success: function(data) {
                  console.log(data);
                  unloading();
                  var html = '';
                  html += '<option value="">Pilih periode</option>';
                  for(var i=0; i<data.length; i++) {
                      html += '<option value="'+data[i].product_term+'">'+data[i].product_term+' bulan</option>';
                  }
                  
                  $("#periode").html(html);
                  
              }
          })
          
          
          
      });
      
      
      $("#periode").change(function(){
          loading();
          var productId = $("#product_id").val();
          var nilaiPengajuan = $("#nilai_pengajuan").val();
          var dp = $("#dp").val();
          var lama = $(this).val();
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          
          if(productId == '') {
              return show_alert("Error", "Produk Tidak Boleh Kosong...!", "error");
          }
          
          $.ajax({
              url : "{{ url('kalkulasi_pinjaman') }}",
              type : "POST",
              dataType : "JSON",
              data : {'productId':productId, 
                        'nilaiPengajuan':nilaiPengajuan, 
                        'dp':dp, 
                        'lama':lama,
                        '_token':csrf_token },
              success : function(data) {
                  unloading();
                  $("#angsuran_jasa").val("0");
                  $("#potongan_baru").val(data.angsuran);
                  $("#pembiayaan_lama").val("0");
                  $("#persentase").val(data.persentase);
                  $("#total_harga").val(data.total_harga);
                  $("#sisa_dibayar").val(data.sisa);
                  $("#angsuran_pokok").val(data.angsuran);
                  hitung_sisa_gaji(data.angsuran);
                  
              }
          })
          
      });
      
      function kalkulasi_sisa_gaji() {
          var totalTunjangan = $("#total_tunjangan").val();
          var totalPotongan = $("#total_potongan").val();
          var angsuranPokok = $("#angsuran_pokok").val();
          
          if(totalTunjangan == '') {
              totalTunjangan = 0;
          }
          if(totalPotongan == '') {
              totalPotongan = 0;
          }
          if(angsuranPokok == '') {
              angsuranPokok = 0;
          }
          
          var sisaGaji = parseInt(totalTunjangan) - parseInt(totalPotongan) - parseInt(angsuranPokok);
          $("#saldo_gaji_netto").val(sisaGaji);
      }
      
      
      function hitung_sisa_gaji(angsuran) {
          var totalTunjangan = $("#total_tunjangan").val();
          var totalPotongan = $("#total_potongan").val();
          if(totalTunjangan == '') {
              totalTunjangan = 0;
          }
          if(totalPotongan == '') {
              totalPotongan = 0;
          }
          
          var sisaGaji = parseInt(totalTunjangan) - parseInt(totalPotongan) - parseInt(angsuran);
          $("#saldo_gaji_netto").val(sisaGaji);
      }
      
      
      $("#form-pinjaman").submit(function(e){
          e.preventDefault();
          loading();
          var method = $("#metode").val();
          if(method == 'tambah') {
              url = "{{ url('submit_pinjaman') }}";
          } else {
              url = "{{ url('update_pinjaman') }}";
          }
          $.ajax({
             url : url,
             type : "POST",
             contentType:false,
             processData:false,
             data : new FormData($('#modal-pinjaman form')[0]),
             success : function(data) {
                 unloading();
                 if(data.success) {
                     
                     $("#modal-pinjaman").modal("hide");
                     tablepinjaman.ajax.reload(null, false);
                     show_alert("Berhasil", data.message, "success");
                     
                 } else {
                     show_alert("Error", data.message, "error");
                 }
             }
          });
      });
      
      
      function edit_pinjaman(id) {
          $(".modal-judul").text("Edit Pengajuan Pembiayaan");
          $("#metode").val('edit');
          loading();
          $.ajax({
              url : "{{ url('pinjaman_edit') }}"+"/"+id,
              type : "GET",
              dataType : "JSON",
              success : function(data) {
                  unloading();
                  $("#pinjaman_id").val(data.id);
                  $("#tanggal_pensiun").val(data.tanggal_pensiun);
                  $("#tanggal_masuk_kerja").val(data.tanggal_masuk_kerja);
                  $("#telepon").val(data.telepon);
                  $("#no_rekening").val(data.no_rekening);
                  $("#gaji_pokok").val(data.gaji_pokok);
                  $("#tunjangan_posisi").val(data.tunjangan_posisi);
                  $("#tunjangan_manajemen").val(data.tunjangan_manajemen);
                  $("#tunjangan_daerah").val(data.tunjangan_daerah);
                  $("#shift_premium").val(data.shift_premium);
                  $("#tunjangan_lain").val(data.tunjangan_lain);
                  $("#total_tunjangan").val(data.total_tunjangan);
                  $("#pajak_penghasilan").val(data.pajak_penghasilan);
                  $("#iuran_pensiun").val(data.iuran_pensiun);
                  $("#jamsostek").val(data.jamsostek);
                  $("#potongan_kssas").val(data.potongan_kssas);
                  $("#potongan_selain_kssas").val(data.potongan_selain_kssas);
                  $("#total_potongan").val(data.total_potongan);
                  $("#product_id").val(data.product_id);
                  $("#nilai_pengajuan").val(data.nilai_pengajuan);
                  $("#dp").val(data.dp);
                  $("#periode").val(data.periode);
                  $("#angsuran_jasa").val(data.angsuran_jasa);
                  $("#potongan_baru").val(data.potongan_baru);
                  $("#pembiayaan_lama").val(data.pembiayaan_lama);
                  $("#persentase").val(data.persentase);
                  $("#total_harga").val(data.total_harga);
                  $("#sisa_dibayar").val(data.sisa_dibayar);
                  $("#angsuran_pokok").val(data.angsuran_pokok);
                  $("#saldo_gaji_netto").val(data.saldo_gaji_netto);
                  $("#keterangan").val(data.keterangan);
                  $("#komentar").val(data.komentar);
                  if(data.image1 == null || data.image1 == '') {
                      $("#display_image1").attr('src', noImage);
                  } else {
                      $("#display_image1").attr('src', '{{ asset('template/frontend/images/pinjaman/') }}'+'/'+data.image1);
                  }
                  
                  if(data.image2 == null || data.image2 == '') {
                      $("#display_image2").attr('src', noImage);
                  } else {
                      $("#display_image2").attr('src', '{{ asset('template/frontend/images/pinjaman/') }}'+'/'+data.image2);
                  }
                  
                  if(data.image3 == null || data.image3 == '') {
                      $("#display_image3").attr('src', noImage);
                  } else {
                      $("#display_image3").attr('src', '{{ asset('template/frontend/images/pinjaman/') }}'+'/'+data.image3);
                  }
                  
                  $("#modal-pinjaman").modal("show");
                  
              }
          })
      }
      
      
      function delete_pinjaman(id) {
        Swal.fire({
              title: "Hapus Data?",
              text: "Anda yakin ingin menghapus data ini..?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
              if (result.isConfirmed) {
                
                loading();
                var csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                   url : "{{ url('delete_pinjaman') }}",
                   dataType : "JSON",
                   type : "POST",
                   data : {'id':id, '_token':csrf_token},
                   success : function(data) {
                        unloading();
                        tablepinjaman.ajax.reload(null, false);
                        Swal.fire({
                          title: "Berhasil Dihapus!",
                          text: "Data Telah Dihapus.",
                          icon: "success"
                        });
                        
                   }
                });
              }
        });
      }
      
      
      function lihat_pinjaman(id) {
          loading();
          $.ajax({
             url : "{{ url('lihat_pinjaman') }}"+"/"+id,
             type : "GET",
             success : function(data) {
                 unloading();
                 $("#content-lihat-pinjaman").html(data);
                 $("#modal-lihat-pinjaman").modal("show");
          
             }
          });
          
      }
      
      
     
     $("#btn_print_pinjaman").click(function(){
         var printContents = document.getElementById("section-to-print").innerHTML;
         var originalContents = document.body.innerHTML;
    
         document.body.innerHTML = printContents;
    
         window.print();
    
         document.body.innerHTML = originalContents;
         
     });      
      
      
      
      
    // ============================================================================
    // ============================================================================
      
      var table = $('#table-simpanan').DataTable({
          dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
          ],
          processing:true,
          serverSide:true,
          ajax: "{{ route('table.simpanan') }}",
          order: [[0, 'desc']],
          columns: [
            {data:'id', name: 'id'},
            {data:'customer_id', name: 'customer_id'},
            {data:'type', name: 'type'},
            {data:'amount', name: 'amount'},
            {data:'reason', name: 'reason'},
            {data:'status', name: 'status'},
            {data:'created_at', name: 'created_at'},
          ]
      });
      table
    .on('order.dt search.dt', function () {
        let i = 1;
 
        table
            .cells(null, 0, { search: 'applied', order: 'applied' })
            .every(function (cell) {
                this.data(i++);
            });
    })
    .draw();
      
      function tambah_tarik_simpanan() {
          $("#modal-simpanan").modal("show");
      }
      
      $("#form-simpanan").submit(function(e){
          e.preventDefault();
          loading();
          $.ajax({
             url : "{{ route('tambah.penarikan.simpanan') }}",
             type : "POST",
             dataType : "JSON",
             data : $(this).serialize(),
             success : function(data){
                 unloading();
                 console.log(data);
                 show_alert("Sukses", data.message, "success");
                 table.ajax.reload(null, false);
                 $("#modal-simpanan").modal("hide");
             }
          });
      })
      
          
    //   TABEL SIMPANAN SALDO 
    
   tablesaving = $('#table-saving').DataTable({
   dom: 'Blfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All'],
          ],
   });
   
   
   function tambah_simpanan() {
       $("#modal-saving").modal("show");
   }
   
   $("#form-saving").submit(function(e){
          e.preventDefault();
          loading();
          $.ajax({
             url : "{{ route('tambah.pembuatan.simpanan') }}",
             type : "POST",
             data : new FormData($('form')[2]),
             contentType:false,
             processData:false,
             success : function(data){
                 
                 window.location = "{{ url('/keanggotaan') }}";
             }
          });
      })
      
 </script>
 @endif
 
 @if($view == 'contact')
 <script>
     
     $("#contact-form").submit(function(e){
        e.preventDefault();
        loading();
        $.ajax({
           url : "{{ url('send_contact') }}",
           type : "POST",
           dataType : "JSON",
           data : $(this).serialize(),
           success : function(data) {
               unloading();
               show_alert("Sukses", "Email Berhasil Dikirim", "success");
               console.log(data);
               $("#name").val("");
               $("#email").val("");
               $("#subject").val("");
               $("#message").val("");
           }
        });
     });
     
 </script>
 @endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
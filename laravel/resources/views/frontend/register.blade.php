@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,.5)), url('{{ asset('template/frontend') }}/images/reg.jpg') no-repeat center center; background-size: cover; padding: 120px 0;">
<div class="container clearfix">
	<h1>DAFTAR ANGGOTA</h1>
	<span>Halaman Pendaftaran Anggota</span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Daftar</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row gutter-40 col-mb-80">
			<!-- Post Content
						============================================= -->
			@php
			    $setting = \App\Models\Setting::findorFail(1);
			@endphp
			<form id="form-register" method="POST" action="{{ url('register') }}">
			@csrf    
			<div class="postcontent col-lg-12">
				<div class="row justify-content-center mb-5">
					<div class="col-md-9 center">
						<div class="heading-block border-bottom-0 mb-4">
							<h2 class="mb-4 nott">Formulir Pendaftaran Anggota</h2>
						</div>
						<div class="svg-line bottommargin-sm clearfix">
							<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
						</div>
						<p>
							 Isilah Form Dibawah Ini Dengan data data yang Benar dan Lengkap
						</p>
						<div class="row" style="text-align:left;">
							<div class="card">
								<div class="card-header bg-warning">
									<h3 class="text-white">Data Pribadi</h3>
									<a href="{{ url('frontend_upload_anggota') }}"><button type="button" class="btn btn-success btn-upload-anggota-baru"> Upload Form Anggota Baru</button></a>
									<a href="{{ asset('template/frontend/files/'.$setting->form_pendaftaran_baru) }}"><button type="button" class="btn btn-primary btn-download-anggota-baru"> Download Form Anggota Baru</button></a>
									
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Nama Lengkap</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama lengkap anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Tempat/Tgl Lahir</label>
												</div>
												<div class="col-md-3">
													<input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="tempat lahir"></div>
												<div class="col-md-6">
													<input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>NIP</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="nip" name="nip" placeholder="masukkan nomor induk pegawai anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Fungsi</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="fungsi" name="fungsi" placeholder="masukkan fungsi pada posisi pekerjaan anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Jenis Kelamin</label>
												</div>
												<div class="col-md-9">
													<select required class="form-control" id="jenis_kelamin" name="jenis_kelamin">
														<option value="">- Pilih -</option>
														<option value="laki laki">Laki Laki</option>
														<option value="perempuan">Perempuan</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Telepon / Whatsapp</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="telepon" name="telepon" placeholder="masukkan nomor telepon anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Email</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="email" name="email" placeholder="masukkan email anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Alamat Lengkap</label>
												</div>
												<div class="col-md-9">
													<textarea required class="form-control" id="alamat" name="alamat" placeholder="masukkan alamat lengkap anda" style="height:90px;"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Nama Ibu Kandung</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="masukkan nama ibu kandung anda"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Nama Istri / Suami/ Ahli Waris</label>
												</div>
												<div class="col-md-9">
													<input required type="text" class="form-control" id="istri" name="istri" placeholder="masukkan nama istri/suami/ahli waris anda">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-5">
								<div class="card-header bg-info">
									<h3 class="text-white">Data Tambahan</h3>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Lama Pemotongan</label>
												</div>
												<div class="col-md-9">
													<select required class="form-control" id="lama_pemotongan" name="lama_pemotongan">
														<option value="Selama Menjadi Anggota">Selama Menjadi Anggota</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Jumlah Potongan</label>
												</div>
												<div class="col-md-9">
													<input value="250000" readonly type="number" class="form-control" id="jumlah_potongan" name="jumlah_potongan" placeholder="masukkan potongan perbulan">
												    <ul style="margin-top:5px;margin-left:20px;color:orange;font-size:14px;">
												        <li>Simpanan Pokok (1x) Rp. 100.000,-</li>
												        <li>Simpanan Wajib (Bulanan) Rp. 250.000,-</li>
												        <li>Biaya Admin (1x) Rp. 5.000,-</li>
												        <li>Total Transfer Awal Rp. 355.000,-</strong></li>
												    </ul>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<label>Mulai Berlaku</label>
												</div>
												<div class="col-md-5">
													<select required class="form-control" id="mulai_berlaku" name="mulai_berlaku">
														<option value="">- Pilih -</option>
														<option value="01">Januari</option>
														<option value="02">Februari</option>
														<option value="03">Maret</option>
														<option value="04">April</option>
														<option value="05">Mei</option>
														<option value="06">Juni</option>
														<option value="07">Juli</option>
														<option value="08">Agustus</option>
														<option value="09">September</option>
														<option value="10">Oktober</option>
														<option value="11">November</option>
														<option value="12">Desember</option>
													</select>
												</div>
												<div class="col-md-4">
													<input required type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
				<center><button type="submit" class="button button-3d button-rounded gradient-ocean"> Daftar</button></center>
				
			</div>
			</form>
			<div class="mt-5" style="margin-bottom:40px;"></div>
			<!-- .postcontent end -->
			<!-- Sidebar
						============================================= --></div>
	</div>
	</section>
	@endsection 
	<!-- #content end -->
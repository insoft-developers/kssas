@extends('frontend.master') @section('content') 
<section id="page-title" class="page-title-dark dark">
<div class="container clearfix">
	<h1>Ubah Password</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row gutter-40 col-mb-80">
			<!-- Post Content
						============================================= -->
			<div class="postcontent col-lg-12">
				<div class="row justify-content-center mb-5">
					<div class="col-md-7 center">
						<form id="form-password">
						    @csrf
						<div class="heading-block border-bottom-0 mb-4">
							<h2 class="mb-4 nott">Ubah Password</h2>
						</div>
						<div class="svg-line bottommargin-sm clearfix">
							<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
						</div>
						<div class="form-group">
							<label>Password Lama</label>
							<input type="password" class="form-control cinput" id="password_lama" name="password_lama" placeholder="masukkan password lama anda"></div>
							
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" class="form-control cinput" id="password_baru" name="password_baru" placeholder="masukkan password baru anda"></div>
							
						<div class="form-group">
							<label>Konfirmasi</label>
							<input type="password" class="form-control cinput" id="password_konfirmasi" name="password_konfirmasi" placeholder="masukkan kembali password baru anda"></div>
						<button type="submit" class="button button-3d button-rounded gradient-ocean"> Submit</button>
						</form>
					</div>
				</div>
			</div>
			<!-- .postcontent end -->
			<!-- Sidebar
						============================================= --></div>
	</div>
	</section>
	@endsection 
	<!-- #content end -->
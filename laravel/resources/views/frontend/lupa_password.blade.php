@extends('frontend.master') @section('content') 
<section id="page-title" class="page-title-dark dark">
<div class="container clearfix">
	<h1>Lupa Password</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Lupa Password</li>
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
			    <div class="row">
			        <div class="col-md-12">
			            @if ($message = Session::get('sukses'))
        			    <div class="style-msg successmsg">
							<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Sukses!</strong> {{ $message }}</div>
						</div>
                        @endif
                        
                        @if ($message = Session::get('gagal'))
                        <div class="style-msg errormsg">
							<div class="sb-msg"><i class="icon-remove"></i><strong>Gagal!</strong> {{ $message }}</div>
						</div>
                        @endif
			        </div>
			    </div>
				<div class="row justify-content-center mb-5">
					<div class="col-md-7 center">
						<form id="form-password" method="POST" action="{{ url('reset_password') }}">
						    @csrf
						<div class="heading-block border-bottom-0 mb-4">
							<h2 class="mb-4 nott">Lupa Password</h2>
						</div>
						<div class="svg-line bottommargin-sm clearfix">
							<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
						</div>
						<div class="form-group">
							<label>Email Anda</label>
							<input type="email" class="form-control cinput" id="email_anda" name="email_anda" placeholder="masukkan email anda" required></div>
							
						
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
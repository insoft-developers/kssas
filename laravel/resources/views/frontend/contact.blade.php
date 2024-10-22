@extends('frontend.master') @section('content') 
<section id="page-title" class="page-title-dark dark" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,.5)), url('{{ asset('template/frontend/images/contact') }}/{{ $setting->contact_image_header }}') no-repeat center center; background-size: cover; padding: 120px 0;">
<div class="container clearfix">
	<h1>Kontak</h1>
	<span>Hubungi Kami </span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Kontak</li>
	</ol>
</div>
</section>



<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row gutter-40 col-mb-80">
			<!-- Postcontent
						============================================= -->
			<div class="postcontent col-lg-7">
				<h3>Kirim Email</h3>
				<div class="form-widget">
				
					<form class="row mb-0" id="contact-form" method="post">
					    @csrf
						
						<div class="col-md-6 form-group">
							<label for="template-contactform-name">Nama <small>*</small></label>
							<input type="text" id="name" name="name" class="sm-form-control required"/>
						</div>
						<div class="col-md-6 form-group">
							<label for="template-contactform-email">Email <small>*</small></label>
							<input type="email" id="email" name="email" class="required email sm-form-control"/>
						</div>
						
						<div class="w-100"></div>
						<div class="col-md-12 form-group">
							<label for="template-contactform-subject">Subject <small>*</small></label>
							<input type="text" id="subject" name="subject" value="" class="required sm-form-control"/>
						</div>
						
						<div class="w-100"></div>
						<div class="col-12 form-group">
							<label for="template-contactform-message">Pesan <small>*</small></label>
							<textarea class="required sm-form-control" id="message" name="message" rows="6" cols="30"></textarea>
						</div>
					
						
						<div class="col-12 form-group">
							<button class="button button-3d m-0" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Kirim</button>
						</div>
						</form>
				</div>
			</div>
			<!-- .postcontent end -->
			<!-- Sidebar
						============================================= -->
			<div class="col-lg-2"></div>
			<div class="sidebar col-lg-3">
				<address>
				<strong>Alamat:</strong><br>
				 {{ $setting->lokasi }}</address>
				<abbr title="Phone Number"><strong>Telepon:</strong></abbr>{{ $setting->phone }}<br>
				
				<abbr title="Email Address"><strong>Email:</strong></abbr> {{ $setting->email }}
				
				<div class="widget border-0 pt-0">
					<a href="{{ $setting->facebook }}" class="social-icon si-small si-dark si-facebook">
					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
					</a>
					<a href="{{ $setting->twitter }}" class="social-icon si-small si-dark si-twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
					</a>
					
					<a href="{{ $setting->instagram }}" class="social-icon si-small si-dark si-instagram">
					<i class="icon-instagram"></i>
					<i class="icon-instagram"></i>
					</a>
					<a href="{{ $setting->youtube }}" class="social-icon si-small si-dark si-youtube">
					<i class="icon-youtube"></i>
					<i class="icon-youtube"></i>
					</a>
				</div>
			</div>
			<!-- .sidebar end --></div>
	</div>
</div>
</section>


@endsection 
<!-- #content end -->
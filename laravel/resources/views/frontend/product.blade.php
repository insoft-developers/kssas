@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,.5)), url('{{ asset('template/frontend') }}/images/produk/{{ $setting->product_image_header }}') no-repeat center center; background-size: cover; padding: 120px 0;">
<div class="container clearfix">
	<h1>Produk</h1>
	<span>Kami Memberikan Pelayanan Terbaik dengan menawarkan Produk Produk Unggulan</span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Produk</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row justify-content-center">
			<div class="col-md-9 center">
				<div class="heading-block border-bottom-0 mb-4">
					<h2 class="mb-4 nott">Simpanan</h2>
				</div>
				<div class="svg-line bottommargin-sm">
					<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
				</div>
			</div>
		</div>
		<div id="portfolio" class="portfolio row grid-container gutter-30 has-init-isotope" data-layout="fitRows" style="position: relative; height: 1164px;">
			@foreach($simpanan as $key)
			<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media pf-icons" style="position: absolute; left: 0%; top: 0px;">
			<div class="grid-inner">
				<div class="portfolio-image">
					<a href="portfolio-single.html"><img class="product-image" src="{{ asset('template/frontend') }}/images/produk/{{ $key->product_image }}" alt="Open Imagination"></a>
					<div class="bg-overlay">
						<div class="bg-overlay-content dark animated fadeOut" data-hover-animate="fadeIn" style="animation-duration: 600ms;"></div>
						<div class="bg-overlay-bg dark animated fadeOut" data-hover-animate="fadeIn" style="animation-duration: 600ms;"></div>
					</div>
				</div>
				<div class="portfolio-desc">
					<h3><a href="portfolio-single.html">{{ $key->product_name }}</a></h3>
					<span><a href="#">
					<?= $key->product_description ;?>
					</span>
					<a href="{{ url('daftar') }}" class="button button-3d button-small button-rounded button-leaf">Daftar</a>
				</div>
			</div>
			</article>
			@endforeach
		</div>
		<div class="row justify-content-center mt-5">
			<div class="col-md-9 center">
				<div class="heading-block border-bottom-0 mb-4">
					<h2 class="mb-4 nott">Pembiayaan</h2>
				</div>
				<div class="svg-line bottommargin-sm">
					<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
				</div>
			</div>
		</div>
		<div id="portfolio" class="portfolio row grid-container gutter-30 has-init-isotope" data-layout="fitRows" style="position: relative; height: 1164px;">
			@foreach($pembiayaan as $p)
			<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-media pf-icons" style="position: absolute; left: 0%; top: 0px;">
			<div class="grid-inner">
				<div class="portfolio-image">
					<a href="portfolio-single.html"><img class="product-image" src="{{ asset('template/frontend') }}/images/produk/{{ $p->product_image }}" alt="Product Image"></a>
					<div class="bg-overlay">
						<div class="bg-overlay-content dark animated fadeOut" data-hover-animate="fadeIn" style="animation-duration: 600ms;"></div>
						<div class="bg-overlay-bg dark animated fadeOut" data-hover-animate="fadeIn" style="animation-duration: 600ms;"></div>
					</div>
				</div>
				<div class="portfolio-desc">
					<h3><a href="portfolio-single.html">{{ $p->product_name }}</a></h3>
					<span><?= $p->product_description ;?></span><a href="{{ url('keanggotaan') }}" class="button button-3d button-small button-rounded button-leaf">Ajukan</a>
				</div>
			</div>
			</article>
			@endforeach
		</div>
	</div>
</div>
</section>
@endsection 
<!-- #content end -->
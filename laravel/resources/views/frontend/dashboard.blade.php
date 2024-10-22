@extends('frontend.master') @section('content') 
<!-- Slider
		============================================= -->
<section id="slider" class="slider-element dark swiper_wrapper slider-parallax min-vh-75">
<div class="slider-inner">
	<div class="swiper-container swiper-parent">
		<div class="swiper-wrapper">
		    
		    @foreach($slider as $slide) 
			<div class="swiper-slide dark">
				<div class="container">
					<div class="slider-caption">
						<div>
							<h2 class="nott" data-animate="fadeInUp">{{ $slide->judul }}</h2>
							<a href="{{ url('daftar') }}" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Daftar Sekarang</a>
						</div>
					</div>
				</div>
				<div class="swiper-slide-bg" style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.5)), url('{{ asset('template/frontend') }}/images/slider/{{ $slide->gambar }}') no-repeat center center; background-size: cover;">
				</div>
			</div>
			@endforeach
		</div>
		<div class="swiper-navs">
			<div class="slider-arrow-left">
				<i class="icon-line-arrow-left"></i>
			</div>
			<div class="slider-arrow-right">
				<i class="icon-line-arrow-right"></i>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Content
		============================================= -->
<div class="container">
	<div class="slider-feature w-100">
		<div class="row justify-content-center">
			<div class="col-md-3 px-1">
				<a href="{{ url('kalkulator') }}" class="card center border-start-0 border-end-0 border-top-0 border-bottom border-bottom shadow py-3 rounded-0 fw-semibold text-uppercase ls1">
				<div class="card-body">
					Kalkulator Pembiayaan
				</div>
				</a>
			</div>
			<div class="col-md-3 px-1">
				@if(Session::has('session_id_frontend'))
					
				<a href="{{ url('keanggotaan') }}" class="card center border-start-0 border-end-0 border-top-0 border-bottom border-bottom shadow py-3 rounded-0 fw-semibold text-uppercase ls1">
				<div class="card-body">
					Ajukan Pembiayaan
				</div>
				</a>
				@else
				<a href="{{ url('daftar') }}" class="card center border-start-0 border-end-0 border-top-0 border-bottom border-bottom shadow py-3 rounded-0 fw-semibold text-uppercase ls1">
				<div class="card-body">
					Ajukan Pembiayaan
				</div>
				</a>
				@endif
			</div>
			<div class="col-md-3 px-1">
				<a href="{{ url('berita') }}" class="card center border-start-0 border-end-0 border-top-0 border-bottom border-bottom shadow py-3 rounded-0 fw-semibold text-uppercase ls1">
				<div class="card-body">
					Berita Terbaru
				</div>
				</a>
			</div>
		</div>
	</div>
</div>
<section id="content">
<div class="content-wrap py-0" style="overflow: visible">
	<div class="section mt-3" style="background: #FFF">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott"><?= $topik->judul ?></h2>
					</div>
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<p>
						 <?= $topik->isi ?>
					</p>
				</div>
			</div>
			<div class="row mt-5 col-mb-20 mb-0">
				<div class="col-md-4">
					<div class="feature-box flex-column mx-0">
						<div class="fbox-media position-relative">
							<img src="{{ asset('template/frontend') }}/images/topic/{{ $topik->gambar1 }}" alt="Featured Icon" width="60" class="mb-3">
						</div>
						<div class="fbox-content px-0">
							<h3 class="nott ls0"><a href="#" class="text-dark"><?= $topik->sub_judul1 ;?></a></h3>
							<p>
								 <?= $topik->sub_isi1 ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature-box flex-column mx-0">
						<div class="fbox-media position-relative">
							<img src="{{ asset('template/frontend') }}/images/topic/{{ $topik->gambar2 }}" alt="Featured Icon" width="60" class="mb-3">
						</div>
						<div class="fbox-content px-0">
							<h3 class="nott ls0"><a href="#" class="text-dark"><?= $topik->sub_judul2 ?></a></h3>
							<p>
								 <?= $topik->sub_isi2 ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="feature-box flex-column mx-0">
						<div class="fbox-media position-relative">
							<img src="{{ asset('template/frontend') }}/images/topic/{{ $topik->gambar3 }}" alt="Featured Icon" width="60" class="mb-3">
						</div>
						<div class="fbox-content px-0">
							<h3 class="nott ls0"><a href="#" class="text-dark"><?= $topik->sub_judul3 ?></a></h3>
							<p>
								 <?= $topik->sub_isi3 ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section mt-3">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Keuntungan Menjadi Anggota KSSAS</h2>
					</div>
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<table class="table table-profit table-bordered table-striped">
					@foreach($benefit as $b)
					<tr>
						<td>
							 {{ $b->list_keuntungan }}
						</td>
					</tr>
				    @endforeach
					</table>
					<a href="{{ url('daftar') }}" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Daftar Sekarang</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section bg-white mt-minus">
		<div class="container clearfix">
			<div class="row">
				<div class="col-lg-8">
					<h3 class="mb-2">Visi <span>&amp;</span> Misi</h3>
					<div class="svg-line mb-2 clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="10">
					</div>
					<p class="mb-5">
						<?= $about->judul_visi_misi ;?>

					</p>
					<div class="row mission-goals gutter-30 mb-0">
						<div class="col-md-12">
							<div class="feature-box fbox-plain bg-white mx-0">
								<div class="fbox-media position-relative col-auto p-0 me-4">
									<img src="{{ asset('template/frontend') }}/images/about/{{ $about->visi_icon }}" alt="Featured Icon 1" width="50">
								</div>
								<div class="fbox-content">
									<h3 class="nott ls0"><a href="#" class="text-dark">Visi Kami</a></h3>
									<p>
										<?= $about->visi ;?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="feature-box fbox-plain bg-white mx-0">
								<div class="fbox-media position-relative col-auto p-0 me-4">
									<img src="{{ asset('template/frontend') }}/images/about/{{ $about->misi_icon }}" alt="Featured Icon 1" width="50">
								</div>
								<div class="fbox-content">
									<h3 class="nott ls0"><a href="#" class="text-dark">Misi Kami</a></h3>
									<p>
									<?= $about->misi ;?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="feature-box fbox-plain bg-white mx-0">
								<div class="fbox-media position-relative col-auto p-0 me-4">
									<img src="{{ asset('template/frontend') }}/images/about/{{ $about->tujuan_icon }}" alt="Featured Icon 1" width="50">
								</div>
								<div class="fbox-content">
									<h3 class="nott ls0"><a href="#" class="text-dark">Tujuan Kami</a></h3>
									<p>
										<?= $about->tujuan ;?>
									</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-4 mt-5 mt-lg-0">
					<h3 class="mb-2">Video Kami</h3>
					<div class="svg-line mb-2 clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="10">
					</div>
					<p class="mb-5">Simak Video Tentang Kami</p>
					@foreach($video as $v)
					<div class="clear"></div>
					<iframe width="853" height="480" src="{{ $v->link_video }}" title="{{ $v->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
					</iframe>
					<div class="clear" style="margin-top:5px;"></div>
					@endforeach
					<a href="{{ url('videolist') }}" class="button button-mini button-circle button-red" style="margin-top:10px;"> selengkapnya ...</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section" style="padding: 60px 0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Produk</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="15">
					</div>
					<p>
						 Beberapa produk yang dikembangkan KSSAS antara lain produk SIMPANAN DAN PEMBIAYAAN.
					</p>
				</div>
				<div class="container-fluid my-5 clearfix">
					<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget owl-loaded owl-drag" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
						<div class="owl-stage-outer">
							<div class="owl-stage" style="transform: translate3d(-284px, 0px, 0px); transition: all 0.25s ease 0s; width: 2272px;">
								
								@foreach($product as $key)
								<div class="owl-item" style="width: 264px; margin-right: 20px;">
									<div class="portfolio-item">
										<div class="portfolio-image">
											<a href="#"><img class="product-image" src="{{ asset('template/frontend') }}/images/produk/{{ $key->product_image }}" alt="Product Category"></a>
											<div class="bg-overlay">
												<div class="bg-overlay-content dark animated fadeOut" data-hover-animate="fadeIn" data-hover-speed="350" style="animation-duration: 350ms;">
													</div>
												<div class="bg-overlay-bg dark animated fadeOut" data-hover-animate="fadeIn" data-hover-speed="350" style="animation-duration: 350ms;"></div>
											</div>
										</div>
										<div class="portfolio-desc">
											<center><h3 class="product-text"><a href="#">{{ $key->product_name }}</a></h3></center>
											
										</div>
									</div>
								</div>
							    @endforeach
								
							</div>
						</div>
						<div class="owl-nav">
							<button type="button" role="presentation" class="owl-prev"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-angle-right"></i></button>
						</div>
						<div class="owl-dots disabled"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section bg-transparent mt-minus">
		<div class="container clearfix">
			<div class="row justify-content-center">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0">
						<h2 class="mb-4 nott">Staff & Pengurus</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<p>
						 Kami memberikan yang terbaik untuk solusi keuangan anda tanpa riba didukung oleh staf dan pengurus yang profesional
					</p>
				</div>
			</div>
			<div class="row justify-content-around">
				
				@foreach($staff as $s)
				<div class="col-lg-2 col-md-4 col-6">
					<div class="team overflow-hidden mt-5">
						<div class="team-image">
							<img src="{{ asset('template/frontend') }}/images/staff/{{ $s->staff_image }}" alt="Penny Tool">
						</div>
						<div class="team-desc">
							<h4 class="team-title pt-3 mb-0 fw-medium nott">{{ $s->staff_name }}<small>{{ $s->position }}</small></h4>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container clearfix">
			<div class="row justify-content-center">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Mitra Kami</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="15">
					</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-11 my-5">
					<ul class="clients-grid grid-2 grid-sm-3 grid-md-5 mb-0">
						@foreach($partner as $p)
						<li class="grid-item">
							<a href="#"><img src="{{ asset('template/frontend') }}/images/clients/{{ $p->logo }}" alt="Clients"></a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- #content end -->
@endsection
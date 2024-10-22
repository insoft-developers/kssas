@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,.5)), url('{{ asset('template/frontend') }}/images/berita/{{ $setting->berita_image_header }}') no-repeat center center; background-size: cover; padding: 120px 0;">
<div class="container clearfix">
	<h1>Berita</h1>
	<span>Berita Terbaru Seputar Dunia Koperasi</span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Berita</li>
	</ol>
</div>
</section>
<section id="content" style="transform: none;">
<div class="content-wrap pt-0" style="transform: none;">
	<!-- Carousel - Highlighted News
				============================================= -->
	<div class="section mt-0">
		<div class="container clearfix">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Berita Populer</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
				</div>
			</div>
			<!-- Owl Carousel
						============================================= -->
			<div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md owl-loaded owl-drag" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="3">
				<div class="owl-stage-outer">
					<div class="owl-stage" style="transform: translate3d(-852px, 0px, 0px); transition: all 0.25s ease 0s; width: 1988px;">
					
						
						@foreach($popular as $k)
						<div class="owl-item" style="width: 264px; margin-right: 20px;">
							<div class="oc-item">
								<div class="entry">
									<div class="entry-image">
										<a href="{{ url('berita-detail') }}/{{ $k->tag }}" data-lightbox="{{ asset('template/frontend/images/berita/post') }}/{{ $k->image }}"><img src="{{ asset('template/frontend/images/berita/post') }}/{{ $k->image }}" alt="Berita Image"></a>
									</div>
									<div class="entry-title title-xs nott">
										<h3><a href="{{ url('berita-detail') }}/{{ $k->tag }}">{{ $k->judul }}</a></h3>
									</div>
									<div class="entry-meta">
										<ul>
											<li>
												<i class="icon-calendar3"></i> {{ date('d-m-Y', strtotime($k->tanggal)) }}
											</li>
											<li>
												<a href="{{ url('berita-detail') }}/{{ $k->tag }}"><i class="icon-user"></i> {{ $k->author }}</a>
											</li>
										</ul>
									</div>
									<div class="entry-content">
										<p>
											{{ substr(strip_tags($k->isi), 0, 180).'...' }}
										</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
				<div class="owl-nav tombol-owl">
					<button type="button" role="presentation" class="owl-prev disabled"><i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next disabled"><i class="icon-angle-right"></i></button>
				</div>
				<div class="owl-dots disabled"></div>
			</div>
			<!-- Carousel End --></div>
	</div>
	<!-- Carousel End -->
	<div class="container clearfix" style="transform: none;">
		<div class="row clearfix" style="transform: none;">
			<!-- Posts Area
						============================================= -->
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Berita Terkini</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row col-mb-50 mb-0 infinity-wrapper">
				    
				    @foreach($berita as $d)
					<div class="col-md-3">
						<!-- Post Article -->
						<div class="posts-md">
							<div class="entry">
								<div class="entry-image">
									<a href="{{ url('berita-detail') }}/{{ $d->tag }}"><img src="{{ asset('template/frontend/images/berita/post') }}/{{ $d->image }}" alt="Image 3"></a>
								</div>
								<div class="entry-title title-sm nott">
									<h4 class="mb-2"><a href="{{ url('berita-detail') }}/{{ $d->tag }}">{{ $d->judul }}</a></h3>
								</div>
								<div class="entry-meta">
									<ul>
										<li>
											<span>by</span><a href="{{ url('berita-detail') }}/{{ $d->tag }}"> {{ $d->author }}</a>
										</li>
										<li>
											<i class="icon-time"></i><a href="{{ url('berita-detail') }}/{{ $d->tag }}">{{ date('d-m-Y', strtotime($d->tanggal)) }}</a>
										</li>
									</ul>
								</div>
								<div class="entry-content">
									<p class="mb-0">
										 {{ substr(strip_tags($d->isi), 0, 180).'...' }}
									</p>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Infinity Scroll Loader
							============================================= -->
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="page-load-status hovering-load-status">
							<div class="css3-spinner infinite-scroll-request">
								<div class="css3-spinner-ball-pulse-sync">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</div>
						</div>
						<!-- Infinity Scroll Button
									============================================= --></div>
				</div>
			</div>
			<!-- Top Sidebar Area
						============================================= -->
			<!-- Sidebar End --></div>
	</div>
	<!-- Container End --></div>
</section>
@endsection 
<!-- #content end -->
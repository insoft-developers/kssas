
@extends('frontend.master') @section('content') 
<section id="slider" class="slider-element swiper_wrapper min-vh-75 justify-content-start dark" style="background: #063639">
<div class="container">
	<div class="row h-100 align-items-center justify-content-between">
		<div class="col-lg-4 col-md-6 py-5 py-md-0">
			<div class="heading-block border-bottom-0 mb-4">
				<h5 class="mb-1 text-uppercase ls2 color op-06">Tentang Kami</h5>
				<h2 class="mb-4 nott"><?= $about->about_title ;?></h2>
			</div>
			<div class="svg-line bottommargin-sm">
				<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
			</div>
			<p class="mb-5">
			<?= $about->about_content ;?>
			</p>
			<a href="{{ url('daftar') }}" class="button button-rounded button-xlarge bg-color button-light text-dark shadow nott ls0 m-0">Daftar Sekarang</a>
		</div>
		<div class="col-lg-8 col-md-6">
			<img src="{{ asset('template/frontend') }}/images/about/{{ $about->about_header_image }}" alt="Image" class="full-width-img">
		</div>
	</div>
</div>
</section>
<!-- Content
		============================================= -->
<section id="content">
<div class="content-wrap py-0 overflow-visible">
	<div class="spasi"></div>
	<div class="section m-0 bg-transparent pt-0">
		<div class="container clearfix">
			<div class="row">
				<div class="col-lg-8">
					<h3 class="mb-2">Visi <span>&amp;</span> Misi</h3>
					<div class="svg-line mb-2 clearfix">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="10">
					</div>
					<p class="mb-5">
						<?=  $about->judul_visi_misi ;?>

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
	<div class="section mt-3" style="padding: 80px 0;">
		<div class="container clearfix">
			<div class="row justify-content-center mb-5">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
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
				<@foreach($staff as $s)
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
	<div class="section bg-transparent">
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
</div>
</section>
@endsection
<!-- #content end -->
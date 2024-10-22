@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark">
<div class="container clearfix">
	<h1>Detil Berita</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="{{ url('/berita') }}">Berita</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Berita Detail</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container">
		<div class="row gutter-40 col-mb-80">
			<!-- Post Content
						============================================= -->
			<div class="postcontent col-lg-1"></div>			
			<div class="postcontent col-lg-10">
				<div class="single-post mb-0">
					<!-- Single Post
								============================================= -->
					<div class="entry clearfix mobile-detail">
						<div class="entry-image mb-0">
							<a href="#"><img src="{{ asset('template/frontend/images/berita/post') }}/{{ $berita->image }}" alt="Blog Single"></a>
						</div>
						<div class="row justify-content-center mt-5">
							<div class="col-md-12 center">
								<div class="heading-block border-bottom-0 mb-4">
									<h4 class="mb-4 nott">{{ $berita->judul }}</h4>
								</div>
								<div class="entry-meta">
									<ul>
										<li>
											<span>by</span><a href="javascript:void(0);"> {{ $berita->author }}</a>
										</li>
										<li>
											<i class="icon-time"></i><a href="javascript:void(0);">{{ date('d-m-Y', strtotime($berita->tanggal)) }}</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="entry-content mt-0">
							<?= $berita->isi ;?>
							
					    </div>
					
			</div>
			
	</div>
</div>
            <div class="postcontent col-lg-1"></div>
</section>
@endsection 
<!-- #content end -->
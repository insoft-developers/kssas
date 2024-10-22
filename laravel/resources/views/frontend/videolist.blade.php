@extends('frontend.master') @section('content') 
<section id="page-title" class="page-title-dark dark">
<div class="container clearfix">
	<h1>VIDEO KAMI</h1>
	<span>Daftar Semua Video Yang Kami Upload</span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Video Kami</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
        <div class="masonry-thumbs grid-container grid-4 has-init-isotope" data-big="4" data-lightbox="gallery">
				@foreach($video as $v)
				<a class="grid-item" href="images/portfolio/full/1.jpg" data-lightbox="gallery-item" >
				    <iframe width="853" height="480" src="{{ $v->link_video }}" title="{{ $v->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
					</iframe>
				</a>
				@endforeach		
		</div>
		<div style="margin-bottom:30px;"></div>
		
	</div>
</div>
</section>
@endsection 
<!-- #content end -->
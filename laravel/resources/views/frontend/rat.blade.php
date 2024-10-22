@extends('frontend.master') @section('content') 


<section id="content">
<div class="content-wrap py-0" style="overflow: visible">
	
	<div class="section mt-3 bg-transparent">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Rapat Anggota Tahunan</h2>
					</div>
						<p>
						 Koperasi Syariah Setia Amanah Sejahtera (KSSAS) 
					</p>
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<table class="table table-profit table-bordered table-striped">
					@foreach($rat as $r)
					<tr>
						<td>
							{{ $r->judul }} | {{ $r->waktu }}
						</td>
					</tr>
					@endforeach
					</table>
					<a href="#" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Dokumentasi RAT</a>
				</div>
			</div>
		</div>
		
	</div>
	<div clss="section mt-3" style="margin-top:-60px;margin-bottom:80px;">
	    <div class="container clearfix">
	        <div class="masonry-thumbs grid-container grid-5" data-big="1" data-lightbox="gallery">
						@foreach($gal as $key)
						<a class="grid-item" href="{{ asset('template/frontend') }}/images/rat/{{ $key->foto }}" data-lightbox="gallery-item"><img src="{{ asset('template/frontend/images/rat') }}/{{ $key->foto }}" alt="Gallery RAT"></a>
						@endforeach
						
					</div>
					<center><p style="margin-top:20px;margin-bottom:40px;">UNTUK KEPERLUAN DATA LAINNYA YANG TIDAK DAPAT KAMI TAMPILKAN DAPAT MENGHUBUNGI ADMIN</center> 

</p>
	    </div>
	</div>
	
	
<!-- #content end -->
@endsection
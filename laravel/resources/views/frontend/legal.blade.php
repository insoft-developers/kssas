@extends('frontend.master') @section('content') <section id="content">
<div class="content-wrap py-0" style="overflow: visible">
	<div class="section mt-3 bg-transparent">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">DOKUMEN LEGAL</h2>
						<h3>Halaman ini berisi dokumen legal dan jawaban mengenai pertanyaan yang sering kami terima mengenai legalitas usaha termasuk bentuk usaha </h3>
					</div>
					<p>
						 DATA DOKUMEN LEGAL
					</p>
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<div class="list-group">
						<a href="javascript:void(0);" class="list-group-item list-group-item-action active">LIHAT DOKUMEN</a>
						@foreach($legal as $l)
						<a href="{{ $l->document_link }}" target="_blank" class="list-group-item list-group-item-action">{{ $l->document_name }}</a>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div clss="section mt-3" style="margin-top:0px;margin-bottom:120px;">
		<div class="container clearfix">
			<div class="list-group">
				@foreach($faq as $f)
				<a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h4 class="mb-2"><?= $f->pertanyaan ;?></h4>
				</div>
				<p class="mb-1"><?= $f->jawaban ;?>
				</p>
			
				</a>
				@endforeach
				
			</div>
			<center>
			<p style="margin-top:20px;margin-bottom:40px;">
				 UNTUK KEPERLUAN DATA LAINNYA YANG TIDAK DAPAT KAMI TAMPILKAN DAPAT MENGHUBUNGI ADMIN</center>
			</p>
		</div>
	</div>
	<!-- #content end -->
@endsection
@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,.5)), url('{{ asset('template/frontend') }}/images/faq/{{ $setting->faq_image_header }}') no-repeat center center; background-size: cover; padding: 120px 0;">
<div class="container clearfix">
	<h1>FAQ's</h1>
	<span>Pertanyaan Yang Sering Ditanyakan Seputar KSSAS</span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">FAQ's</li>
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
			    <div class="row justify-content-center mb-5">
				<div class="col-md-7 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Masih ada Yang Kurang Jelas ?</h2>
					</div>
					<div class="svg-line bottommargin-sm clearfix">
						<img src="{{ asset('') }}/template/frontend/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<p>
						Simak Bagaimana kami menjawab pertanyaan - pertanyaan Anda
					</p>
				</div>
			</div>
				<div class="clear"></div>
				<div id="faqs" class="faqs">
				   
				    @foreach($faq as $d)
					<div class="toggle faq faq-marketplace faq-authors">
						<div class="toggle-header">
							<div class="toggle-icon">
								<i class="toggle-closed icon-question-sign"></i>
								<i class="toggle-open icon-question-sign"></i>
							</div>
							<div class="toggle-title"><?= $d->pertanyaan ?></div>
						</div>
						<div class="toggle-content" style="display: none;">
							<?= $d->jawaban ;?> 
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<!-- .postcontent end -->
			<!-- Sidebar
						============================================= -->
		
	</div>
</div>
</section>
@endsection 
<!-- #content end -->
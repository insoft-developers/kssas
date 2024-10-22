@extends('frontend.master') @section('content') <section id="content">
<div class="content-wrap py-0" style="overflow: visible">
	<div class="section mt-3 bg-transparent">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Syarat & Ketentuan</h2>
						<h3>SYARAT & KETENTUAN KOPERASI SYARIAH SETIA AMANAH SEJAHTERA (KSSAS)</h3>
					</div>
					
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<div class="mobile-page"><?= $setting->term ;?></div>
					   
					
				</div>
			</div>
		</div>
	</div>

	<!-- #content end -->
@endsection
@extends('frontend.master') @section('content') 
<section id="page-title" class="page-title-dark dark">
<div class="container clearfix">
	<h1>Upload Form Anggota Baru</h1>
	<span>Upload Form Pendaftaran Anggota yang telah diisi dan di tanda tangani oleh calon anggota </span>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Upload Form Anggota Baru</li>
	</ol>
</div>
</section>



<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row gutter-40 col-mb-80">
			<!-- Postcontent
						============================================= -->
			<div class="postcontent col-lg-7">
				<h3>Upload Form Pendaftaran </h3>
				@if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
				<div class="form-widget">
				
					<form id="form-upload-register" method="POST" enctype="multipart/form-data">
					    @csrf
						
						
						<div class="col-12 form-group">
							<label>Upload Form <small>*</small></label>
							<input class="form-control" id="foto" name="foto" rows="6" cols="30" type="file">
						</div>
					
						
						<div class="col-12 form-group">
							<button id="btn-submit-form" class="button button-3d m-0" type="submit" value="submit">Kirim</button>
						</div>
					</form>
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
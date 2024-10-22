@extends('backend.master') @section('content') 
<section class="content-header">
<h1>Form Download Pendaftaran</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Form User</a>
	</li>
	<li class="active">Form Download Pendaftaran</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			   @if ($message = Session::get('sukses'))
			    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ $message }}
                </div>
                @endif
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			    
				<div class="row">
					<form method="POST" id="form-upload-register-data" enctype="multipart/form-data" action="{{ route('upload.form.download') }}">
					@csrf
					<div class="col-md-12">
						<div class="form-group">
						    <label>Masukkan File Form untuk di downlod User</label>
						    <input required type="file" id="image" name="image" class="form-control">
						</div>
						<button class="btn btn-primary btn-sm" type="submit">Submit</button>
					</div>
					</form>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->



</section>
@endsection
@extends('backend.master') @section('content') <section class="content-header">
<h1>Topik Utama Management</h1>
<ol class="breadcrumb">
	<li>
		<a href="{{ url('/backoffice') }}"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Topik Utama</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			  
			</div>
			<!-- /.box-header -->
			<form id="form-update-topic" method="POST" enctype="multipart/form-data" action="{{ url('topic') }}">
			    @csrf
			<div class="box-body">
			    @if ($message = Session::get('sukses'))
			    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ $message }}
                </div>
                @endif
                
                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                {{ $message }}
                </div>
                @endif
                
			    <div class="row">
			        
				    <div class="col-md-4">
				        <div class="form-group">
				            <label>Image:</label>
				            <img id="display_image1" class="img-topic" src="{{ asset('template/frontend/images/topic') }}/{{ $topic->gambar1 }}">
				        </div>
				        <input style="display:none;" type="file" id="gambar1" name="gambar1" accept=".png, .jpg, .jpeg">
				        <input style="display:none;" type="file" id="gambar2" name="gambar2" accept=".png, .jpg, .jpeg">
				        <input style="display:none;" type="file" id="gambar3" name="gambar3" accept=".png, .jpg, .jpeg">
				    </div>
				    <div class="col-md-4">
				        <div class="form-group">
				            <label>Image:</label>
				            <img id="display_image2" class="img-topic" src="{{ asset('template/frontend/images/topic') }}/{{ $topic->gambar2 }}">
				        </div>
				    </div>
				    <div class="col-md-4">
				        <div class="form-group">
				            <label>Image:</label>
				            <img id="display_image3" class="img-topic" src="{{ asset('template/frontend/images/topic') }}/{{ $topic->gambar3 }}">
				        </div>
				    </div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						    <label>Judul :</label>
						    <textarea id="judul" name="judul" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>Isi :</label>
						    <textarea id="isi" name="isi" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Judul :</label>
						    <textarea id="sub_judul1" name="sub_judul1" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Judul :</label>
						    <textarea id="sub_judul2" name="sub_judul2" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Judul :</label>
						    <textarea id="sub_judul3" name="sub_judul3" class="form-control" required></textarea>
						</div>
					</div>
					
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Isi :</label>
						    <textarea id="sub_isi1" name="sub_isi1" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Isi :</label>
						    <textarea id="sub_isi2" name="sub_isi2" class="form-control" required></textarea>
						</div>
					</div>
					<div class="col-md-4">
					    <div class="form-group">
						    <label>Sub Isi :</label>
						    <textarea id="sub_isi3" name="sub_isi3" class="form-control" required></textarea>
						</div>
					</div>
				</div>
				
				<div style="margin-top:50px;"></div>
				<hr />
				<div class="row">
				    <div class="col-md-12">
				        <button type="submit" class="btn btn-primary form-control">Submit</button>
				    </div>
				</div>
			</div>
			</form>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->





</section>
@endsection
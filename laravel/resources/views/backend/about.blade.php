@extends('backend.master') @section('content') <section class="content-header">
<h1>About Management</h1>
<ol class="breadcrumb">
	<li>
		<a href="{{ url('/backoffice') }}"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">About</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			
			<!-- /.box-header -->
			<form id="form-update-about" method="POST" enctype="multipart/form-data" action="{{ url('backabout') }}">
			    @csrf
			<div class="box-body body-box">
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
					<div class="col-md-6">
						<div class="form-group">
						    <label>Judul Visi Misi:</label>
						    <textarea id="judul_visi_misi" name="judul_visi_misi" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>Visi Kami:</label>
						    <textarea id="visi" name="visi" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>Misi Kami:</label>
						    <textarea id="misi" name="misi" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>Tujuan Kami:</label>
						    <textarea id="tujuan" name="tujuan" class="form-control" required></textarea>
						</div>
					</div>	
					<div class="col-md-6">
					    <div class="form-group">
						    <label>About Title:</label>
						    <textarea id="about_title" name="about_title" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>About Content:</label>
						    <textarea id="about_content" name="about_content" class="form-control" required></textarea>
						</div>
						<div class="form-group">
						    <label>About Header Image:</label>
						    <img id="display_image4" class="header-image" src="{{ asset('template/frontend/images/about/') }}/{{ $about->about_header_image }}">
						    <input style="display:none;" type="file" id="about_header_image" name="about_header_image" accept=".png, .jpg, .jpeg">
						</div>
					</div>
				</div>
				<div style="margin-top:50px;"></div>
				<hr />
			    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Visi Icon:</label>
                            <img id="display_image1" class="img-topic" src="{{asset('template/frontend/images/about')}}/{{ $about->visi_icon }}">
                        </div>
                        <input style="display:none;" type="file" id="visi_icon" name="visi_icon" accept=".png, .jpg, .jpeg">
                        
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Misi Icon:</label>
                            <img id="display_image2" class="img-topic" src="{{asset('template/frontend/images/about')}}/{{ $about->misi_icon }}">
                        </div>
                        <input style="display:none;" type="file" id="misi_icon" name="misi_icon" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tujuan Icon:</label>
                            <img id="display_image3" class="img-topic" src="{{asset('template/frontend/images/about')}}/{{ $about->tujuan_icon }}">
                        </div>
                        <input style="display:none;" type="file" id="tujuan_icon" name="tujuan_icon" accept=".png, .jpg, .jpeg">
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
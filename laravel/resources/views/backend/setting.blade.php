@extends('backend.master') @section('content') <section class="content-header">
<h1>General Setting</h1>
<ol class="breadcrumb">
	<li>
		<a href="{{ url('/backoffice') }}"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Setting</a>
	</li>
	<li class="active">General Setting</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			
			<!-- /.box-header -->
			<form id="form-update-about" method="POST" enctype="multipart/form-data" action="{{ url('setting') }}">
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
					    
					    <div class="panel panel-success">
					        <div class="panel-body">
        					    <div class="form-group">
        						    <label>Judul Website:</label>
        						    <textarea id="website_title" name="website_title" class="form-control" required></textarea>
        						</div>
        						<div class="form-group">
        						    <label>Judul Admin:</label>
        						    <textarea id="admin_title" name="admin_title" class="form-control" required></textarea>
        						</div>
        						
        						
        						
        						<div class="form-group">
        						    <label>Short Name:</label>
        						    <textarea id="short_name" name="short_name" class="form-control" required></textarea>
        						</div>
        						<div class="form-group">
        						    <label>Company Name:</label>
        						    <textarea id="company_name" name="company_name" class="form-control" required></textarea>
        						</div>
        						<div class="row">
        						    <div class="col-md-4">
                						<div class="form-group">
                						    <label>Whatsapp:</label>
                						    <textarea id="whatsapp" name="whatsapp" class="form-control" required></textarea>
                						</div>
        						    </div>
        						    <div class="col-md-4">
                						<div class="form-group">
                						    <label>Telepon:</label>
                						    <textarea id="phone" name="phone" class="form-control" required></textarea>
                						</div>
        						    </div>
        						    <div class="col-md-4">
                						<div class="form-group">
                						    <label>Email:</label>
                						    <textarea id="email" name="email" class="form-control" required></textarea>
                						</div>
        						    </div>
        						</div>
        						<div class="form-group">
        						    <label>Lokasi:</label>
        						    <textarea id="lokasi" name="lokasi" class="form-control" required></textarea>
        						</div>
        						<div class="form-group">
        						    <label>Jam Kerja:</label>
        						    <textarea id="jam_kerja" name="jam_kerja" class="form-control" required></textarea>
        						</div>
        						<div class="row">
        						    <div class="col-md-12">
                						<div class="form-group">
                						    <label>Map Lokasi:</label>
                						    <textarea id="map_lokasi" name="map_lokasi" class="form-control" required></textarea>
                						</div>
        						    </div>
        						    <div class="col-md-12">
                						<div class="form-group">
                						    <label>Map Text:</label>
                						    <textarea id="map_text" name="map_text" class="form-control" required></textarea>
                						</div>
        						    </div>
        						</div> 
        						<div class="row">
        						    <div class="col-md-6">
                						<div class="form-group">
                						    <label>Website:</label>
                						    <textarea id="website" name="website" class="form-control" required></textarea>
                						</div>
        						    </div>
        						    <div class="col-md-6">
                					    <div class="form-group">
                						    <label>Versi:</label>
                						    <textarea id="versi" name="versi" class="form-control" required></textarea>
                						</div>
        						    </div>
        						</div> 
        						
					        </div>
					    </div>
						
						
					</div>	
					<div class="col-md-6">
					    <div class="panel panel-success">
					        <div class="panel-body">
					            <div class="row">
        						    <div class="col-md-4">
            						    <div class="form-group">
                                            <label>Logo:</label>
                                            <img id="display_logo" class="img-topic" src="{{ asset('template/frontend/images') }}/{{ $setting->logo }}">
                                        </div>
                                        <input style="display:none;" type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg">
        						    </div>
        						    <div class="col-md-4">
            						    <div class="form-group">
                                            <label>Footer Logo:</label>
                                            <img id="display_footer_logo" class="img-topic" src="{{ asset('template/frontend/images') }}/{{ $setting->footer_logo }}">
                                        </div>
                                        <input style="display:none;" type="file" id="footer_logo" name="footer_logo" accept=".png, .jpg, .jpeg">
        						    </div>
        						    <div class="col-md-4">
            						    <div class="form-group">
                                            <label>Favicon:</label>
                                            <img id="display_favicon" class="img-topic" src="{{ asset('template/frontend/images') }}/{{ $setting->favicon }}">
                                        </div>
                                        <input style="display:none;" type="file" id="favicon" name="favicon" accept=".png, .jpg, .jpeg">
        						    </div>
        						</div>
					            <div class="row">
					                <div class="col-md-6">
					                    <div class="form-group">
                						    <label>Facebook:</label>
                						    <textarea id="facebook" name="facebook" class="form-control" required></textarea>
                						</div>
					                </div>
					                <div class="col-md-6">
					                    <div class="form-group">
                						    <label>Twitter:</label>
                						    <textarea id="twitter" name="twitter" class="form-control" required></textarea>
                						</div>
					                </div>
					                
					            </div>
					            <div class="row">
					                <div class="col-md-6">
					                    <div class="form-group">
                						    <label>Instagram:</label>
                						    <textarea id="instagram" name="instagram" class="form-control" required></textarea>
                						</div>
					                </div>
					                <div class="col-md-6">
					                    <div class="form-group">
                						    <label>Youtube:</label>
                						    <textarea id="youtube" name="youtube" class="form-control" required></textarea>
                						</div>
					                </div>
					                
					            </div>
					            <div class="row">
					                <div class="col-md-12">
					                    <div class="form-group">
                						    <label>Product Header Image:</label>
                						    <img id="display_product_header" class="header-image" src="{{ asset('template/frontend/images/produk') }}/{{ $setting->product_image_header }}">
                						    <input style="display:none;" type="file" id="product_image_header" name="product_image_header" accept=".png, .jpg, .jpeg">
                						</div>
                						<div class="form-group">
                						    <label>Berita Header Image:</label>
                						    <img id="display_berita_header" class="header-image" src="{{ asset('template/frontend/images/berita') }}/{{ $setting->berita_image_header }}">
                						    <input style="display:none;" type="file" id="berita_image_header" name="berita_image_header" accept=".png, .jpg, .jpeg">
                						</div>
                						<div class="form-group">
                						    <label>FAQ Header Image:</label>
                						    <img id="display_faq_header" class="header-image" src="{{ asset('template/frontend/images/faq') }}/{{ $setting->faq_image_header }}">
                						    <input style="display:none;" type="file" id="faq_image_header" name="faq_image_header" accept=".png, .jpg, .jpeg">
                						</div>
                						<div class="form-group">
                						    <label>Contact:</label>
                						    <img id="display_contact_header" class="header-image" src="{{ asset('template/frontend/images/contact') }}/{{ $setting->contact_image_header }}">
                						    <input style="display:none;" type="file" id="contact_image_header" name="contact_image_header" accept=".png, .jpg, .jpeg">
                						</div>
					                </div>
					            </div>
					        </div>
					    </div>
					    
					</div>
				</div>
				<div style="margin-top:50px;"></div>
				<hr />
			    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
						    <label>Term & Condition:</label>
						    <textarea id="term" name="term" class="form-control" required></textarea>
						</div>
                        <div class="form-group">
						    <label>Kebijakan Privasi:</label>
						    <textarea id="privacy" name="privacy" class="form-control" required></textarea>
						</div>
                        <div class="form-group">
						    <label>Deskripsi Riba:</label>
						    <textarea id="riba" name="riba" class="form-control" required></textarea>
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
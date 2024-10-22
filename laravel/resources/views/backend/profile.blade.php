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
			<form id="form-update-profile" method="POST" enctype="multipart/form-data" action="{{ url('update_profile') }}">
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
					
				</div>
				
				<hr />
				<div class="row">
				    <div class="col-md-12">
				        <center><img style="cursor:pointer;" id="display_profile" class="img-me" src="{{ asset('template/frontend/images/user') }}/{{ $user->profile_image }}"></center>
				        <div style="margin-top:20px;"></div>
				        <input style="display:none;" type="file" id="profile_image" name="profile_image" class="form-control">
				        
				        
				        <div class="form-group">
				            <label>Nama Lengkap :</label>
				            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
				        </div>
				        <div class="form-group">
				            <label>Email :</label>
				            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
				        </div>
				        <div class="form-group">
				            <label>Password :</label>
				            <input type="password" class="form-control" id="password" name="password" value="">
				        </div>
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
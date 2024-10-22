@extends('backend.master') @section('content') <section class="content-header">
<h1>User List</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">User Management</a>
	</li>
	<li class="active">User List</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			    <button onclick="addData()" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped table-cantik" id="table_user">
						<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Level</th>
							<th>Image</th>
							<th>action</th>
						</tr>
						</thead>
						<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


<div class="modal fade" id="modal-tambah" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-tambah" method="post" enctype="multipart/form-data">
				 {{ csrf_field() }} {{ method_field('POST') }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title"></h3>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id" name="id">
					<div class="form-group">
					    <label>Nama Lengkap:</label>
					    <input type="text" class="form-control" name="name" id="name" required>
					</div>
					<div class="form-group">
					    <label>Email:</label>
					    <input type="email" class="form-control" name="email" id="email" required>
					</div>
					<div class="form-group">
					    <label>Password:</label>
					    <input type="password" class="form-control" name="password" id="password" required>
					</div>
					<div class="form-group">
					    <label>Level:</label>
					    <select class="form-control" name="level" id="level" required>
					        <option value="">Pilih</option>
					        @foreach($jabatan as $jab)
					        <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
					        @endforeach
					    </select>
					</div>
					<div class="form-group">
					    <label>Foto Profil:</label>
					    <input type="file" class="form-control" name="profile_image" id="profile_image" accept=".jpg, .png, .jpeg">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-save">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end modal-->


</section>
@endsection
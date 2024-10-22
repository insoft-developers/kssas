@extends('backend.master') @section('content') <section class="content-header">
<h1>Staff & Pengurus Management</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Staff & Pengurus</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_staff">
						<thead>
						<tr>
							<th>#</th>
							<th>Nama Staf</th>
							<th>Jabatan</th>
							<th>Foto</th>
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


<div class="modal fade" id="modal-staff" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="form-staff" method="post" class="form-horizontal" enctype="multipart/form-data">
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
						<label class="col-md-3 control-label">Nama Staff & Pengurus :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="staff_name" name="staff_name" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Jabatan :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="position" name="position" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Foto Staff & Pengurus :</label>
						<div class="col-md-8">
							<input type="file" class="form-control" id="staff_image" name="staff_image" accept=".png, .jpg, .jpeg" required>
						</div>
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
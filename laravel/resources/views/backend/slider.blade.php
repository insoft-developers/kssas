@extends('backend.master') @section('content') <section class="content-header">
<h1>Slider Management</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Slider</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_slider">
						<thead>
						<tr>
							<th>#</th>
							<th>Judul</th>
							<th>Gambar Slider</th>
							<th>is active</th>
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


<div class="modal fade" id="modal-slider" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="form-slider" method="post" class="form-horizontal" enctype="multipart/form-data">
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
						<label class="col-md-3 control-label">Judul Slider :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="judul" name="judul" required></textarea>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Gambar Slider :</label>
						<div class="col-md-8">
							<input type="file" class="form-control" id="gambar" name="gambar" accept=".png, .jpg, .jpeg" required>
							<span class="help-block with-errors"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Is Active :</label>
						<div class="col-md-8">
							<select class="form-control" id="is_active" name="is_active" required>
							    <option value="">Pilih</option>
							    <option value="1">active</option>
							    <option value="0">not active</option>
							</select>
							<span class="help-block with-errors"></span>
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
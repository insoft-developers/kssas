@extends('backend.master') @section('content') 
<section class="content-header">
<h1>Video List</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Video List</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_video">
						<thead>
						<tr>
							<th>#</th>
							<th>Video Link</th>
							<th>Judul</th>
							<th>Is Home</th>
							<th>Is Active</th>
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


<div class="modal fade" id="modal-video" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form-video" method="post" class="form-horizontal" enctype="multipart/form-data">
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
						<label class="col-md-3 control-label">Link Video Embeded :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="link_video" name="link_video" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Judul Video :</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="title" name="title" required>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Is Home :</label>
						<div class="col-md-8">
							<select class="form-control" id="is_home" name="is_home" required>
							    <option value="">Pilih</option>
							    <option value="1">Yes</otion>
							    <option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Is Active :</label>
						<div class="col-md-8">
							<select class="form-control" id="is_active" name="is_active" required>
							    <option value="">Pilih</option>
							    <option value="1">active</otion>
							    <option value="0">not active</option>
							</select>
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
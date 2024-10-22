@extends('backend.master') @section('content') <section class="content-header">
<h1>Berita Management</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Berita</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_berita">
						<thead>
						<tr>
							<th>#</th>
							<th>Judul</th>
							<th>Isi</th>
							<th>Tag</th>
							<th>Tanggal</th>
							<th>Author</th>
							<th>Image</th>
							<th>is popular</th>
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form id="form-tambah" method="post" class="form-horizontal" enctype="multipart/form-data">
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
						<label class="col-md-3 control-label">Judul Berita :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="judul" name="judul" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Tag :</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="tag" name="tag" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Content Berita :</label>
						<div class="col-md-8">
							<textarea class="form-control" id="isi_input" name="isi_input" required></textarea>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Gambar Slider :</label>
						<div class="col-md-8">
							<input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg" required>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Author :</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="author" name="author" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Is Popular :</label>
						<div class="col-md-8">
							<select class="form-control" id="is_popular" name="is_popular" required>
							    <option value="">Pilih</option>
							    <option value="1">Yes</option>
							    <option value="0">No</option>
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
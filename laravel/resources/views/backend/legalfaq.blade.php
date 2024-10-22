@extends('backend.master') @section('content') 
<section class="content-header">
<h1>Legal Faq's</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Master Data</a>
	</li>
	<li class="active">Legal Faq's</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_legalfaq">
						<thead>
						<tr>
							<th>#</th>
							<th>Pertanyaan</th>
							<th>Jawaban</th>
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
				    <div class="row">
				        <div class="col-md-12">
        				    <input type="hidden" id="id" name="id">
        					<div class="form-group">
        						
        						    <label>Pertanyaan:</label>
        							<textarea class="form-control" id="pertanyaan_input" name="pertanyaan_input" required></textarea>
        							
        					</div>
        					<div class="form-group">
        						    <label>Jawaban:</label>
        							<textarea class="form-control" id="jawaban_input" name="jawaban_input" required></textarea>
        						
        					</div>
        					
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
@extends('backend.master') @section('content') 
<section class="content-header">
<h1>Manajemen Penarikan</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li class="active">Penarikan</li>
</ol>
</section>
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			    
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
						<table class="table table-bordered table-striped table-cantik" id="table_bo_withdraw">
						<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Type</th>
							<th>Jumlah</th>
							<th>Alasan</th>
							<th>Status</th>
							<th>Tanggal</th>
							<th>action</th>
						</tr>
						</thead>
						<tbody></tbody>
						</table>
						</div>
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
					    <label>Nama Anggota</label>
					    <select required class="form-control" name="customer_id" id="customer_id">
					        <option value="">Pilih</option>
					        @foreach($customer as $c)
					            <option value="{{ $c->id }}">{{ $c->nama }}</option>
					        @endforeach
					    </select>
					</div>
					<div class="form-group">
					    <label>Nama Produk</label>
					    <select required class="form-control" name="product_id" id="product_id">
					        <option value="">Pilih</option>
					        @foreach($product as $p)
					            <option value="{{ $p->id }}">{{ $p->product_name }}</option>
					        @endforeach
					    </select>
					</div>
					<input type="hidden" name="amount_out" value="0">
					<div class="form-group">
					    <label>Jumlah Simpanan:</label>
					    <input type="number" class="form-control" id="amount_in" name="amount_in" required>
					</div>
					<div class="form-group">
					    <label>Keterangan:</label>
					    <textarea class="form-control" id="description" name="description" required></textarea>
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
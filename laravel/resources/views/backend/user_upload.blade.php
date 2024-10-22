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
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped table-cantik" id="table_user_upload">
						<thead>
						<tr>
							<th>#</th>
							<th>Tanggal</th>
							<th>File</th>
							<th>Status</th>
							<th>action</th>
						</tr>
						</thead>
						<tbody>
						    @foreach($data as $index => $d)
						    <tr>
						        <td>{{ $index + 1 }}</td>
						        <td>{{ date('d-m-Y', strtotime($d->created_at)) }}</td>
						        @if(! empty($d->foto))
						        <td><a href="{{ asset('template/frontend/images/form-pendaftaran/'.$d->foto) }}" target="_blank"><img class="img-customer" src="{{ asset('template/frontend/images/form-pendaftaran/'.$d->foto) }}"></a></td>
						        @else
						        <td></td>
						        @endif
						        
						            @if($d->status == 1)
						                <td><i class="glyphicon glyphicon-check"></i></td>
						            @else
						            <td>Proses</td>
						            @endif
						        
						        <td>
						            <center><a title="Edit" onclick="editForm({{ $d->id }})" style="width:25px;margin-bottom:3px;" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-check"></i></a><br><a title="Hapus" onclick="deleteData({{ $d->id }})" style="width:25px;margin-bottom:3px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a></center>
                                        
						        </td>
						    </tr>
						    @endforeach
						</tbody>
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
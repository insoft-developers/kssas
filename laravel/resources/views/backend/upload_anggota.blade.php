@extends('backend.master') @section('content') <section class="content-header">
<h1>Upload Data Anggota</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li class="active">Upload Data Anggota</li>
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
						<form action="{{ route('import.anggota') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Upload CSV File</label>
                                <input type="file" name="file" class="form-control" accept=".csv" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary form-control">Upload</button>
                        </form>
					</div>
					<div style="margin-top:30px;" class="col-md-12">
					    <div class="table-responsive">
					    <table id="table_upload_item" class="table table-bordered table-triped table-menawan nowrap">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>Nama</th>
					                <th>NIP</th>
					                <th>Fungsi</th>
					                <th>JKelamin</th>
					                <th>Telepon</th>
					                <th>Email</th>
					                <th>Alamat</th>
					                <th>Pewaris</th>
					                <th>Password</th>
					                <th>TTL</th>
					                <th>Nama Ibu</th>
					                <th>Jabatan</th>
					                <th>Lama Pemotongan</th>
					                <th>Jumlah potongan</th>
					                <th>Mulai Berlaku</th>
					                <th>Tahun</th>
					                <th>Is Active</th>
					                <th>Simp Pokok</th>
					                <th>Simp Wajib</th>
					                <th>Simp Sukarela</th>
					            </tr>
					        </thead>
					        <tbody>
					            @php
					                $nomor=0;
					            @endphp
					            @foreach($upload as $u)
					            @php
					                $nomor++;
					            @endphp
					            
					            <tr>
					                <td>{{ $nomor }}</td>
					                <td>{{ $u->nama }}</td>
					                <td>{{ $u->nip }}</td>
					                <td>{{ $u->fungsi }}</td>
					                <td>{{ $u->jenis_kelamin }}</td>
					                <td>{{ $u->telepon }}</td>
					                <td>{{ $u->email }}</td>
					                <td>{{ $u->alamat }}</td>
					                <td>{{ $u->istri }}</td>
					                <td>{{ $u->password }}</td>
					                <td>{{ $u->tempat_lahir }} - {{ date('d-m-Y',strtotime($u->tanggal_lahir)) }}</td>
					                <td>{{ $u->nama_ibu }}</td>
					                <td>{{ $u->jabatan }}</td>
					                <td>{{ $u->lama_pemotongan }}</td>
					                <td>{{ $u->jumlah_potongan }}</td>
					                <td>{{ $u->mulai_berlaku }}</td>
					                <td>{{ $u->tahun }}</td>
					                <td>{{ $u->is_active }}</td>
					                <td>{{ $u->simpanan_pokok }}</td>
					                <td>{{ $u->simpanan_wajib }}</td>
					                <td>{{ $u->simpanan_sukarela }}</td>
					            </tr>
					            @endforeach
					        </tbody>
					    </table>
					    
					    <div style="margin-bottom:30px;"></div>
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
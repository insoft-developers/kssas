@extends('backend.master') @section('content') <section class="content-header">
<h1>Daftar Anggota</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li class="active">Daftar Anggota</li>
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
						<table class="table table-bordered table-striped table-cantik" id="table_anggota">
						<thead>
						<tr>
						    <th>action</th>
						    <th>is active</th>
							<th>#</th>
							<th>Foto</th>
							<th>Nama_Lengkap</th>
							<th>Tempat/Tgl Lahir</th>
							<th>Alamat_Jelas</th>
							<th>NIP</th>
							<th>Fungsi</th>
							<th>Gender</th>
							<th>Telepon</th>
							<th>Email</th>
							
							
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
	<div class="modal-dialog modal-lg">
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
				    <div class="row">
				        <div class="col-md-4">
				            <div class="panel panel-success">
				                <div class="panel-body">
        				            <div class="form-group">
                					    <label>Nama:</label>
                					    <input type="text" class="form-control" id="nama" name="nama" required > 
                					</div>
                					<div class="form-group">
                					    <label>NIP:</label>
                					    <input type="text" class="form-control" id="nip" name="nip" required> 
                					</div>
                					<div class="form-group">
                					    <label>Fungsi:</label>
                					    <input type="text" class="form-control" id="fungsi" name="fungsi" required> 
                					</div>
                					<div class="form-group">
                					    <label>Jenis Kelamin:</label>
                					    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                					    <option value="">Pilih</option>
                					    <option value="laki laki">Laki Laki</option>
                					    <option value="perempuan">Perempuan</option>
                					    </select> 
                					</div>
                					<div class="form-group">
                					    <label>Telepon:</label>
                					    <input type="text" class="form-control" id="telepon" name="telepon" required> 
                					</div>
                					<div class="form-group">
                					    <label>Email:</label>
                					    <input type="email" class="form-control" id="email" name="email" required> 
                					</div>
                					<div class="form-group">
                					    <label>Alamat:</label>
                					    <textarea class="form-control" id="alamat" name="alamat" required></textarea> 
                					</div>
				                </div>
				            </div>
        				    
				        </div>
				        <div class="col-md-4">
				            <div class="panel panel-success">
				                <div class="panel-body">
        				            <div class="form-group">
                					    <label>Ahli Waris:</label>
                					    <input type="text" class="form-control" id="istri" name="istri" required> 
                					</div>
                					<div class="form-group">
                					    <label>Tempat Lahir:</label>
                					    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required> 
                					</div>
                					<div class="form-group">
                					    <label>Tanggal Lahir:</label>
                					    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required> 
                					</div>
                					<div class="form-group">
                					    <label>Nama Ibu:</label>
                					    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required> 
                					</div>
                					<div class="form-group">
                					    <label>Jabatan:</label>
                					    <select class="form-control" id="jabatan" name="jabatan" required>
                					    <option value="">Pilih</option>
                					    @foreach($jabatan as $jab)
                					        <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                					    @endforeach
                					    </select> 
                					</div>
                					<div class="form-group">
                					    <label>Foto Anggota:</label>
                					    <input type="file" class="form-control" id="file_image" name="file_image" accept=".jpg, .png, .jpeg" required> 
                					</div>
				                </div>
				            </div>
				            
				        </div>
				        <div class="col-md-4">
				            <div class="panel panel-success">
				                <div class="panel-body">
        				            <div class="form-group">
                					    <label>Lama Pemotongan:</label>
                					    <input type="text" readonly class="form-control" id="lama_pemotongan" name="lama_pemotongan" > 
                					</div>
                					<div class="form-group">
                					    <label>Jumlah Pemotongan:</label>
                					    <input type="text" readonly class="form-control" id="jumlah_potongan" name="jumlah_potongan" > 
                					</div>
                					<div class="form-group">
                					    <label>Mulai Berlaku:</label>
                					    <div class="row">
                					        <div class="col-md-6">
                					             <select class="form-control" id="mulai_berlaku" name="mulai_berlaku" required>
                            					    <option value="">Pilih</option>
                            					    <option value="01">Januari</option>
                            					    <option value="02">Februari</option>
                            					    <option value="03">Maret</option>
                            					    <option value="04">April</option>
                            					    <option value="05">Mei</option>
                            					    <option value="06">Juni</option>
                            					    <option value="07">Juli</option>
                            					    <option value="08">Agustus</option>
                            					    <option value="09">September</option>
                            					    <option value="10">Oktober</option>
                            					    <option value="11">November</option>
                            					    <option value="12">Desember</option>
                            					  </select> 
                					        </div>
                					        <div class="col-md-6">
                					             <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun..."> 
                					        </div>
                					    </div>
                					   
                					</div>
                					<div class="form-group">
                					    <label>Simpanan Pokok:</label>
                					    <input type="text" readonly class="form-control" id="simpanan_pokok" name="simpanan_pokok" > 
                					</div>
                					<div class="form-group">
                					    <label>Simpanan Wajib:</label>
                					    <input type="text" readonly class="form-control" id="simpanan_wajib" name="simpanan_wajib" > 
                					</div>
                					<div class="form-group">
                					    <label>Simpanan Sukarela:</label>
                					    <input type="text" readonly class="form-control" id="simpanan_sukarela" name="simpanan_sukarela" > 
                					</div>
				                </div>
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

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Data Anggota</h4>
			</div>
			<div class="modal-body">
				<p>
					One fine body&hellip;
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


 <div class="modal modal-success fade" id="modal-activate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <p>Aktifkan Data Ini Sebagai Anggota...?</p>
        <input type="hidden" id="id_anggota_register">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <button onclick="aktivasi_akun()" type="button" class="btn btn-outline">Aktifkan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<div class="modal modal-warning fade" id="modal-disactivate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <p>Non Aktifkan Data Ini Dari Anggota...?</p>
        <input type="hidden" id="id_anggota_remove">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <button onclick="disaktivasi_akun()" type="button" class="btn btn-outline">Non Aktifkan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


</section>
@endsection
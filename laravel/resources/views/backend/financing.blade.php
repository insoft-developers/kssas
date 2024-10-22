@extends('backend.master') @section('content') 
<section class="content-header">
<h1>Pembiayaan</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li class="active">Pembiayaan</li>
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
					    <div class="table-responsive">
						<table class="table table-bordered table-striped table-cantik" id="table_financing">
						<thead>
						<tr>
						    <th>action</th>
						    <th>Tanggal</th>
							<th>#</th>
							<th>Nama</th>
							<th>Produk</th>
							<th>Pengajuan</th>
							<th>DP</th>
							<th>Total</th>
							<th>Harus Dibayar</th>
							<th>Term</th>
							<th>Angsuran</th>
							<th>Pembayaran</th>
							<th>Sisa</th>
							<th>Status</th>
							
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
				<div class="modal-container">
				        <input type="hidden" id="id" name="id"> 
						<input type="hidden" id="status_loan" name="status_loan" value="1">
						<div class="row">
						  
						   <div class="col-md-12">
						        <div class="panel panel-warning">
						            <div class="panel-heading">
						                <h3>Data Pribadi</h3>
						            </div>
						            <div class="panel-body">
        						         <div class="form-group">
        						            <label>Nama:</label>
        						            <select class="form-control" id="customer_id_pinjaman" name="customer_id_pinjaman" required>
        						                <option value="">Pilih</option>
        						                @foreach($customer as $cust)
        						                    <option value="{{ $cust->id }}">{{ $cust->nama }}</option>
        						                @endforeach
        						            </select>      
        						         </div>
        						         <div class="form-group">
        						            <label>Umur:</label>
        						            <input readonly type="text" class="form-control cinput" id="umur" name="umur">
        						         </div>
        						         <div class="form-group">
        						            <label>Tanggal Pensiun:</label>
        						            <input required type="date" class="form-control cinput" id="tanggal_pensiun" name="tanggal_pensiun">
        						         </div>
        						         <div class="form-group">
        						            <label>Tanggal Masuk Kerja:</label>
        						            <input required type="date" class="form-control cinput" id="tanggal_masuk_kerja" name="tanggal_masuk_kerja">
        						         </div>
        						         <div class="form-group">
        						            <label>No Telepon/ Whatsapp:</label>
        						            <input required type="text" class="form-control cinput" id="telepon" name="telepon">
        						         </div>
        						         <div class="form-group">
        						            <label>No Rekening:</label>
            						            <textarea required class="form-control cinput" id="no_rekening" name="no_rekening"></textarea>
        						         </div>
						            </div>
						        </div>
						   </div> 
					    </div>
					    <div style="margin-top:10px;"></div>
					    <div class="row">   
						   <div class="col-md-6">
						       <div class="panel panel-info">
						            <div class="panel-heading">
						                    <h3>Tunjangan</h3>
						                </div>
						            <div class="panel-body">
						                
						                <div class="form-group">
        						            <label>Gaji Pokok:</label>
        						            <input required type="number" class="form-control cinput tunjangan" id="gaji_pokok" name="gaji_pokok">
        						         </div>
        						         <div class="form-group">
        						            <label>Tunjangan Posisi:</label>
        						            <input type="number" class="form-control cinput tunjangan" id="tunjangan_posisi" name="tunjangan_posisi">
        						         </div>
        						         <div class="form-group">
        						            <label>Tunjangan Manajemen:</label>
        						            <input type="number" class="form-control cinput tunjangan" id="tunjangan_manajemen" name="tunjangan_manajemen">
        						         </div>
        						         <div class="form-group">
        						            <label>Tunjangan Daerah:</label>
        						            <input type="number" class="form-control cinput tunjangan" id="tunjangan_daerah" name="tunjangan_daerah">
        						         </div>
        						         <div class="form-group">
        						            <label>Shift Premium:</label>
        						            <input type="number" class="form-control cinput tunjangan" id="shift_premium" name="shift_premium">
        						         </div>
        						         <div class="form-group">
        						            <label>Tunjangan Lain:</label>
        						            <input type="number" class="form-control cinput tunjangan" id="tunjangan_lain" name="tunjangan_lain">
        						         </div>
        						         <div class="form-group">
        						            <label>Total Tunjangan:</label>
        						            <input readonly type="number" class="form-control cinput" id="total_tunjangan" name="total_tunjangan">
        						         </div>
        						         
						            </div>
						        </div>
						   </div>
						   <div class="col-md-6">
						        <div class="panel panel-success">
						            <div class="panel-heading">
						                <h3>Potongan</h3>
						            </div>
						            <div class="panel-body">
						                <div class="form-group">
        						            <label>Pajak Penghasilan:</label>
        						            <input type="number" class="form-control cinput potongan" id="pajak_penghasilan" name="pajak_penghasilan">
        						         </div>
        						         <div class="form-group">
        						            <label>Iuran Pensiun:</label>
        						            <input type="number" class="form-control cinput potongan" id="iuran_pensiun" name="iuran_pensiun">
        						         </div>
        						         <div class="form-group">
        						            <label>Potongan Jamsostek:</label>
        						            <input type="number" class="form-control cinput potongan" id="jamsostek" name="jamsostek">
        						         </div>
        						         <div class="form-group">
        						            <label>Potongan KSSAS:</label>
        						            <input type="number" class="form-control cinput potongan" id="potongan_kssas" name="potongan_kssas">
        						         </div>
        						         <div class="form-group">
        						            <label>Potongan Selain KSSAS:</label>
        						            <input type="number" class="form-control cinput potongan" id="potongan_selain_kssas" name="potongan_selain_kssas">
        						         </div>
        						         <div class="form-group">
        						            <label>Total Potongan:</label>
        						            <input type="number" readonly class="form-control cinput" id="total_potongan" name="total_potongan">
        						         </div>
        						         
						            </div>
						        </div>
						   </div>
						</div>
						<div style="margin-top:10px;"></div>
						<div class="row">
						    <div class="col-md-12">
						        <div class="panel panel-danger">
						            <div class="panel-heading">
						                <h3>Data Pembiayaan</h3>
						            </div>
						            <div class="panel-body">
						                <div class="form-group">
        						            <label>Produk:</label>
        						            <select class="form-control cinput" id="product_id" name="product_id">
        						                <option value="">Pilih</option>
        						                @foreach($product as $key)
        						                    <option value="{{ $key->id }}">{{ $key->product_name }}</option>
        						                @endforeach
        						            </select>
        						         </div>
        						         <div class="form-group">
        						            <label>Nilai Pengajuan:</label>
        						            <input required type="number" class="form-control cinput" id="nilai_pengajuan" name="nilai_pengajuan">
        						         </div>
        						         <div class="form-group">
        						            <label>DP (Down Payment):</label>
        						            <input required type="number" class="form-control cinput" id="dp" name="dp">
        						         </div>
        						         <div class="form-group">
        						            <label>Periode:</label>
        						            <select required class="form-control cinput" id="periode" name="periode">
        						                <option value="">Pilih</option>
        						                @foreach($periode as $p)
        						                    <option value="{{ $p->periode_name }}">{{ $p->periode_name }} bulan</option>
        						                @endforeach
        						            </select>
        						         </div>
        						         
        						         <div class="form-group">
        						            <label>Angsuran Jasa:</label>
        						            <input readonly type="number" class="form-control cinput" id="angsuran_jasa" name="angsuran_jasa">
        						         </div>
        						         <div class="form-group">
        						            <label>Potongan Baru:</label>
        						            <input readonly type="number" class="form-control cinput" id="potongan_baru" name="potongan_baru">
        						         </div>
        						         <div class="form-group">
        						            <label>Pembiayaan Lama:</label>
        						            <input readonly type="number" class="form-control cinput" id="pembiayaan_lama" name="pembiayaan_lama">
        						         </div>
        						         <div class="form-group">
        						            <label>Persentase:</label>
        						            <input readonly type="text" class="form-control cinput" id="persentase" name="persentase">
        						         </div>
        						         
        						         <div class="form-group">
        						            <label>Total Harga:</label>
        						            <input readonly type="number" class="form-control cinput" id="total_harga" name="total_harga">
        						         </div>
        						         <div class="form-group">
        						            <label>Sisa Dibayar:</label>
        						            <input readonly type="number" class="form-control cinput" id="sisa_dibayar" name="sisa_dibayar">
        						         </div>
        						         <div class="form-group">
        						            <label>Angsuran Pokok:</label>
        						            <input readonly type="number" class="form-control cinput" id="angsuran_pokok" name="angsuran_pokok">
        						         </div>
        						         <div class="form-group">
        						            <label>Saldo Gaji Netto:</label>
        						            <input readonly type="number" class="form-control cinput" id="saldo_gaji_netto" name="saldo_gaji_netto">
        						         </div>
        						         
						            </div>
						        </div>
						    </div>
						    <div style="margin-top:10px;"></div>
						    <div class="col-md-12">
						        <div class="panel panel-primary">
						            <div class="panel-heading">
						                <h3>Foto Pendukung:</h3>
						            </div>
						            <div class="panel-body">
						                 <div class="row">
						                     <div class="col-md-4">
						                         <img id="display_image1" src="{{ asset('template/frontend/images/image_placeholder.png') }}" class="img-pinjaman">
						                         <img id="tutup1" src="{{ asset('template/frontend/images/icon_tutup.png') }}" class="img-tutup">
						                     </div>
						                     <div class="col-md-4">
						                         <img id="display_image2" src="{{ asset('template/frontend/images/image_placeholder.png') }}" class="img-pinjaman">
						                         <img id="tutup2" src="{{ asset('template/frontend/images/icon_tutup.png') }}" class="img-tutup">
						                     </div>
						                     <div class="col-md-4">
						                         <img id="display_image3" src="{{ asset('template/frontend/images/image_placeholder.png') }}" class="img-pinjaman">
						                         <img id="tutup3" src="{{ asset('template/frontend/images/icon_tutup.png') }}" class="img-tutup">
						                     </div>
						                 </div>
						                 
						                 <input style="display:none;" type="file" class="form-control" id="image1" name="image1">
						                 <input style="display:none;" type="file" class="form-control" id="image2" name="image2">
						                 <input style="display:none;" type="file" class="form-control" id="image3" name="image3">
						            </div>
						        </div>
						    </div>
						    <div style="margin-top:10px;"></div>
						    <div class="col-md-12">
						        <div class="panel panel-success">
						            <div class="panel-heading">
						                <h3>Tambahan</h3>
						            </div>
						            <div class="panel-body">
						                 <div class="form-group">
        						            <label>Keterangan:</label>
        						            <textarea required class="form-control cinput" id="keterangan" name="keterangan"></textarea>
        						         </div>
        						         <div class="form-group">
        						            <label>Komentar:</label>
        						            <textarea class="form-control cinput" id="komentar" name="komentar"></textarea>
        						         </div>
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




<div class="modal fade" id="modal-payment" tabindex="1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="width:1200px;">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title">Data Pembayaran</h3>
				</div>
				<div class="modal-body">
					<div class="row">
					    <div class="col-md-12">
					        <div id="pembiayaan-modal-payment"></div>
					    </div>
					</div>
				</div>
				<div class="modal-footer">
					
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
		
		</div>
	</div>
</div>
<!--end modal-->



<div class="modal fade" id="modal-detail" tabindex="1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="width:1200px;">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h3 class="modal-title">Data Pembiayaan Detail</h3>
				</div>
				<div class="modal-body">
					<input type="hidden" id="id_detail" name="id_detail">
					<div class="row">
					    <div class="col-md-12">
					        <div id="pembiayaan-modal-content"></div>
					    </div>
					</div>
					
					
				</div>
				<div class="modal-footer">
					<button onclick="onProcessLoan()" id="btn_process_loan" class="btn btn-warning btn-save">Processing</button>
					<button onclick="onApproveLoan()" id="btn_approve_loan" class="btn btn-success btn-save">Approve</button>
					<button onclick="onResetLoan()" id="btn_reset_loan" class="btn btn-danger btn-save">Reset</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
		
		</div>
	</div>
</div>
<!--end modal-->


</section>
@endsection
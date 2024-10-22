@extends('frontend.master') @section('content') <section id="page-title" class="page-title-dark dark">

@php

$setting = \App\Models\Setting::findorFail(1);
@endphp
<div class="container clearfix">
	<h1>Keanggotaan</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ url('/') }}">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Keanggotaan</li>
	</ol>
</div>
</section>
<section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row clearfix">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 mb-4">
						<div class="flip-card top-to-bottom">
							<div class="flip-card-front dark" data-height-xl="200" style="background-image: url({{ asset('template/frontend/images/simp.jpg') }}); height: 200px;">
								<div class="flip-card-inner">
									<div class="card bg-transparent border-0">
										<div class="card-body">
											<h3 class="card-title mb-0 keanggotaan-title"><center>Saldo Simpanan Pokok</center></h3>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back" data-height-xl="200">
								<div class="flip-card-inner">
									<h1 class="mb-2 text-white"><center>Rp. {{ number_format($customer->simpanan_pokok) }}</center></h1>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="flip-card top-to-bottom">
							<div class="flip-card-front dark" data-height-xl="200" style="background-image: url({{ asset('template/frontend/images/simp2.jpg') }} ); height: 200px;">
								<div class="flip-card-inner">
									<div class="card bg-transparent border-0">
										<div class="card-body">
											<h3 class="card-title mb-0 keanggotaan-title"><center>Saldo Iuran Mudhorobah Tetap</center></h3>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back" data-height-xl="200">
								<div class="flip-card-inner">
									<h1 class="mb-2 text-white"><center>Rp. {{ number_format($customer->simpanan_wajib) }}</center></h1>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-4">
						<div class="flip-card top-to-bottom">
							<div class="flip-card-front dark" data-height-xl="200" style="background-image: url({{ asset('template/frontend/images/simp3.jpg') }}); height: 200px;">
								<div class="flip-card-inner">
									<div class="card bg-transparent border-0">
										<div class="card-body">
											<h3 class="card-title mb-0 keanggotaan-title"><center>Saldo Tabungan Mudhorobah Mutlaqoh</center></h3>
										</div>
									</div>
								</div>
							</div>
							<div class="flip-card-back" data-height-xl="200">
								<div class="flip-card-inner">
									<h1 class="mb-2 text-white"><center>Rp. {{ number_format($customer->simpanan_sukarela) }}</center></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div style="margin-top:30px;"></div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<div class="tabs tabs-alt clearfix ui-tabs ui-corner-all ui-widget ui-widget-content" id="tabs-profile">
							<ul class="tab-nav clearfix ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header" role="tablist">
								<li role="tab" tabindex="0" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active" aria-controls="tab-feeds" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
									<a href="#tab-feeds" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Penarikan Simpanan</a>
								</li>
								<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tab-posts" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
									<a href="#tab-posts" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Pengajuan Pembiayaan</a>
								</li>
								<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tab-replies" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
									<a href="#tab-replies" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Laporan Simpanan</a>
								</li>
								<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tab-connections" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
									<a href="#tab-connections" tabindex="-1" class="ui-tabs-anchor" id="ui-id-4">Laporan Pembiayaan</a>
								</li>
								<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tab-payments" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
									<a href="#tab-payments" tabindex="-1" class="ui-tabs-anchor" id="ui-id-5">Pembayaran</a>
								</li>
							</ul>
							<div class="tab-container">
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-feeds" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false">
									<div class="card">
										<div class="card-header">
											<a href="javascript:void(0);" onclick="tambah_tarik_simpanan()" class="button button-3d button-rounded gradient-blue-green"><i class="icon-plus"></i> Buat Penarikan Baru</a>
										</div>
										<div class="card-body">
										    <div class="table-responsive">
											<table width="100%" id="table-simpanan" class="table table-bordered table-striped ctable">
											<thead>
											<tr>
												<th>ID</th>
												<th>Nama</th>
												<th>Type</th>
												<th>Jumlah</th>
												<th>Keterangan</th>
												<th>Status</th>
												<th>Tanggal</th>
											</tr>
											</thead>
											<tbody></tbody>
											</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-posts" aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true" style="display: none;">
									<div class="card">
										<div class="card-header">
											<a href="javascript:void(0);" onclick="tambah_ajukan_pinjaman()" class="button button-3d button-rounded gradient-blue-green"><i class="icon-plus"></i> Ajukan Pembiayaan Baru</a>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table width="100%" id="table-pinjaman" class="table table-striped table-bordered ctable">
												<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Produk</th>
													<th>Pengajuan</th>
													<th>DP</th>
												    <th>Total</th>
												    <th>Sisa Dibayar</th>
													<th>Lama</th>
													<th>Angsuran</th>
													<th>Status</th>
													<th>Diajukan Tgl</th>
													<th>Action</th>
												</tr>
												</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-replies" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
									<div class="card">
									    <div class="card-header">
											<a href="javascript:void(0);" onclick="tambah_simpanan()" class="button button-3d button-rounded gradient-blue-green"><i class="icon-plus"></i> Tambah Simpanan Baru</a>
										</div>
										<div class="card-body">
										    <div class="table-responsive">
											<table width="100%" id="table-saving" class="table table-bordered table-striped ctable">
											<thead>
											<tr>
												<th>ID</th>
												<th>Nama</th>
												<th>Type</th>
												<th>Masuk</th>
												<th>Keluar</th>
												<th>Saldo</th>
												<th>Keterangan</th>
												<th>Tanggal</th>
												<th>Status</th>
											</tr>
											</thead>
											<tbody>
											 @php 
											 $nomor=0; 
											 $saldo=0; 
											 @endphp 
											 @foreach($saving as $index => $s) 
											 @php $nomor++; 
											 
											 if($s->status == 1) {
    											 $saldo= $saldo + $s->amount_in - $s->amount_out; 
											 } 
											 
											 $cust = \App\Models\Customer::findorFail($s->customer_id); 
											 $pr = \App\Models\Product::findorFail($s->product_id); 
											 @endphp
											<tr>
												<td>{{ $nomor }}</td>
												<td>{{ $cust->nama }}</td>
												<td>{{ $pr->product_name }}</td>
												<td style="text-align:right;">{{ number_format($s->amount_in) }}</td>
												<td style="text-align:right;">{{ number_format($s->amount_out) }}</td>
												<td style="text-align:right;">{{ $s->status == 1 ? number_format($saldo) : 'on-review' }}</td>
												<td>{{ $s->description }}</td>
												<td>
													<center>{{ date('d-m-Y', strtotime($s->created_at)) }}</center>
												</td>
												<td>
												    @if($s->status == 1)
												    <center><span class="badge-success">Sukses</span></center>
												    @else
												    <center><span class="badge-danger">Review</span></center>
												    @endif
												</td>
											</tr>
											 @endforeach
											</tbody>
											</table>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-connections" aria-labelledby="ui-id-4" role="tabpanel" aria-hidden="true" style="display: none;">
								    <div class="card">
										
										<div class="card-body">
											<div class="table-responsive">
												<table width="100%" id="table-saldo-pinjaman" class="table table-striped table-bordered ctable">
												<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Produk</th>
													<th>Pengajuan</th>
													<th>DP</th>
												    <th>Total</th>
												    <th>Sisa Dibayar</th>
													<th>Lama</th>
													<th>Angsuran</th>
													<th>Dibayar</th>
													<th>Sisa</th>
													<th>Diajukan Tgl</th>
													<th>Action</th>
												</tr>
												</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content" id="tab-payments" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
								    <div class="card">
								        <div class="card-heading">
										<a href="javascript:void(0);" onclick="tambah_pembayaran()" class="button button-3d button-rounded gradient-blue-green"><i class="icon-plus"></i> Tambah Pembayaran Baru</a>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table width="100%" id="table-pembayaran" class="table table-striped table-bordered ctable">
												<thead>
												<tr>
													<th>#</th>
													<th>Image</th>
													<th>Nama</th>
													<th>Keterangan</th>
													<th>Jenis</th>
													<th>Pembiayaan</th>
												    <th>Jumlah</th>
												    <th>Status</th>
												    <th>Tanggal</th>
													<th>Action</th>
												</tr>
												</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>



<div class="modal fade" id="modal-simpanan" tabindex="-1" aria-labelledby="centerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		    	<form id="form-simpanan" type="POST">
					    @csrf
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Buat Penarikan Baru</h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
				<div class="modal-container">
						<input type="hidden" id="customer_id" name="customer_id" value="{{ $customer->id }}">
						<input type="hidden" id="status" name="status" value="1">
						<div class="form-group">
						    <label>Jenis Simpanan:</label>
						    <select id="type" name="type" class="form-control cinput" required>
						        <option value="">Pilih</option>
						        
						        <option value="3">Simpanan Sukarela</option>
						    </select>
						</div>
						<div class="form-group">
						    <label>Jumlah Ditarik:</label>
						    <input type="number" class="form-control cinput" id="amount" name="amount" required> 
						</div>
						<div class="form-group">
						    <label>Keterangan:</label>
						    <textarea class="form-control cinput" id="reason" name="reason" required style="height:90px;"></textarea> 
						</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="modal-pinjaman" tabindex="1" rore="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
		    <form id="form-pinjaman" type="POST" enctype="multipart/form-data">
					    @csrf
			<div class="modal-header">
				<h4 class="modal-title modal-judul" id="myModalLabel"></h4>
				<button onclick="tutup_modal()" type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
				<div class="modal-container">
				        <input type="hidden" id="pinjaman_id" name="pinjaman_id"> 
						<input type="hidden" id="metode" name="metode">
						<input type="hidden" id="customer_id_pinjaman" name="customer_id_pinjaman" value="{{ $customer->id }}">
						<input type="hidden" id="status_loan" name="status_loan" value="1">
						<div class="row">
						   <div><p class="reset-form">Reset Form</p></div>
						   <div class="col-md-12">
						        <div class="card">
						            <div class="card-header">
						                <h3>Data Pribadi</h3>
						                <a href="{{ asset('template/frontend/files/'.$setting->form_pembiayaan) }}"><button type="button" class="btn btn-primary">Download Form Pengajuan Pembiayaan</button></a>
						                <hr />
						                <div class="form-group">
						                    <label>Upload Form Pengajuan Pembiayaan</label>
						                <input type="file" class="form-control cinput" name="upload_pembiayaan">
						                </div>
						            </div>
						            <div class="card-body">
        						         <div class="form-group">
        						            <label>Nama:</label>
        						            <input readonly type="text" class="form-control cinput" id="nama_pinjaman" value="{{ $customer->nama }}">
        						         </div>
        						         <div class="form-group">
        						            <label>Umur:</label>
        						            <input readonly type="text" class="form-control cinput" id="umur" name="umur" value="{{ $umur }}">
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
					    <div class="row" style="display:none;">   
						   <div class="col-md-6">
						       <div class="card">
						            <div class="card-header">
						                    <h3>Tunjangan</h3>
						                </div>
						            <div class="card-body">
						                
						                <div class="form-group">
        						            <label>Gaji Pokok:</label>
        						            <input value="1" required type="number" class="form-control cinput tunjangan" id="gaji_pokok" name="gaji_pokok">
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
        						            <input value="1" readonly type="number" class="form-control cinput" id="total_tunjangan" name="total_tunjangan">
        						         </div>
        						         
						            </div>
						        </div>
						   </div>
						   <div class="col-md-6">
						        <div class="card">
						            <div class="card-header">
						                <h3>Potongan</h3>
						            </div>
						            <div class="card-body">
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
        						            <input value="1" type="number" readonly class="form-control cinput" id="total_potongan" name="total_potongan">
        						         </div>
        						         
						            </div>
						        </div>
						   </div>
						</div>
						<div style="margin-top:10px;"></div>
						<div class="row">
						    <div class="col-md-12">
						        <div class="card">
						            <div class="card-header">
						                <h3>Data Pembiayaan</h3>
						            </div>
						            <div class="card-body">
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
        						         <div class="form-group" style="display:none;">
        						            <label>Saldo Gaji Netto:</label>
        						            <input readonly type="number" class="form-control cinput" id="saldo_gaji_netto" name="saldo_gaji_netto">
        						         </div>
        						         
						            </div>
						        </div>
						    </div>
						    <div style="margin-top:10px;"></div>
						    <div class="col-md-12">
						        <div class="card">
						            <div class="card-header">
						                <h3>Foto Pendukung:</h3>
						            </div>
						            <div class="card-body">
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
						        <div class="card">
						            <div class="card-header">
						                <h3>Tambahan</h3>
						            </div>
						            <div class="card-body">
						                 <div class="form-group">
        						            <label>Keterangan:</label>
        						            <textarea required class="form-control cinput" id="keterangan" name="keterangan"></textarea>
        						         </div>
        						         <div class="form-group">
        						            <label>Komentar:</label>
        						            <textarea class="form-control cinput" id="komentar" readonly></textarea>
        						         </div>
						            </div>
						        </div>
						    </div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="tutup_modal()" type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>

</div>
<div class="modal fade" id="modal-lihat-pinjaman" tabindex="1" rore="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg" id="section-to-print">
		<div class="modal-content">
		    <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Data Pembiayaan</h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
			    <div id="content-lihat-pinjaman"></div>
			</div>
			<div class="modal-footer no-print">
				<a href="{{ url('keanggotaan') }}">Reload</a>
				<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button id="btn_print_pinjaman" type="button" class="btn btn-info"><i class="icon-line-printer"></i> Print</button>
			</div>
			
		</div>
	</div>
</div>

<div class="modal fade" id="modal-saldo-pinjaman" tabindex="1" rore="dialog" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-fullscreen" id="section-to-print2">
		<div class="modal-content">
		    <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">History Transaksi</h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
			    <div id="content-saldo-pinjaman"></div>
			</div>
			<div class="modal-footer no-print">
				<a href="{{ url('keanggotaan') }}">Reload</a>
				<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button id="btn_print_saldo_pinjaman" type="button" class="btn btn-info"><i class="icon-line-printer"></i> Print</button>
			</div>
			
		</div>
	</div>
</div>


<div class="modal fade" id="modal-saving" tabindex="-1" aria-labelledby="centerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		    	<form id="form-saving" type="POST" enctype="multipart/form-data">
					    @csrf
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Buat Simpanan Baru</h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
				<div class="modal-container">
						<input type="hidden" id="customer_id" name="customer_id" value="{{ $customer->id }}">
						<input type="hidden" id="status_simpanan" name="status_simpanan" value="0">
						<input type="hidden" id="amount_out" name="amount_out" value="0">
						<div class="form-group">
						    <label>Jenis Simpanan:</label>
						    <select id="produt_id" name="product_id" class="form-control cinput" required>
						        <option value="">Pilih</option>
						        @foreach($simp as $sim)
						        <option value="{{ $sim->id }}">{{ $sim->product_name }}</option>
						        @endforeach
						    </select>
						</div>
						<div class="form-group">
						    <label>Jumlah Simpanan:</label>
						    <input type="number" class="form-control cinput" id="amount_in" name="amount_in" required> 
						</div>
						<div class="form-group">
						    <label>Keterangan:</label>
						    <textarea class="form-control cinput" id="description" name="description" required style="height:90px;"></textarea> 
						</div>
						<div class="form-group">
						    <label>Upload Bukti Transfer:</label>
						    <input type="file" class="form-control cinput" id="upload_bukti" name="upload_bukti" required> 
						</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-pembayaran" tabindex="-1" aria-labelledby="centerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		    	<form id="form-pembayaran" type="POST" enctype="multipart/form-data">
					    @csrf
			<div class="modal-header">
				<h4 class="modal-title-pembayaran" id="myModalLabel">Buat Pembayaran Baru</h4>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body">
				<div class="modal-container">
						<input type="hidden" id="customer_id" name="customer_id" value="{{ $customer->id }}">
						<div class="form-group">
						    <label>Jenis Pembayaran:</label>
						    <select id="payment_type" name="payment_type" class="form-control cinput" required>
						        <option value="">Pilih</option>
						        <option value="1">Pembayaran Simpanan Wajib</option>
						        <option value="2">Pembayaran Pembiayaan</option>
						    </select>
						</div>
						<div class="form-group">
						    <label>Pembayaran:</label>
						    <select id="payment_transaction_list" name="payment_transaction_list" class="form-control cinput" required>
						        <option value="">Pilih</option>
						        
						    </select>
						</div>
						<div class="form-group">
						    <label>Jumlah Pembayaran:</label>
						    <input type="number" class="form-control cinput" id="payment_amount" name="payment_amount" required> 
						</div>
						<div class="form-group">
						    <label>Keterangan:</label>
						    <textarea class="form-control cinput" id="payment_description" name="payment_description" required style="height:90px;"></textarea> 
						</div>
						<div class="form-group">
						    <label>Upload Bukti Transfer:</label>
						    <input type="file" class="form-control cinput" id="payment_image" name="payment_image" required> 
						</div>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-bs-dismiss="modal" class="btn btn-default">Tutup</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>


@endsection
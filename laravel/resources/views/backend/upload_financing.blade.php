@extends('backend.master') @section('content') <section class="content-header">
<h1>Upload Data Pembiayaan</h1>
<ol class="breadcrumb">
	<li>
		<a href="#"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li class="active">Upload Data Pembiayaan</li>
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
						<form action="{{ route('import.financing') }}" method="POST" enctype="multipart/form-data">
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
					    <table id="table_upload_pembiayaan" class="table table-bordered table-triped table-menawan nowrap">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>Tanggal</th>
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
					        <tbody>
					            @php
					                $nomor=0;
					            @endphp
					            @foreach($upload as $u)
					            @php
					                $nomor++;
					                $cust = \App\Models\Customer::findorFail($u->customer_id_pinjaman); 
					                $prod = \App\Models\Product::findorFail($u->product_id);
					            @endphp
					            
					            <tr>
					                <td>{{ $nomor }}</td>
					                <td style="text-align:center;">{{ date('d-m-Y', strtotime($u->created_at)) }}</td>
					                <td>{{ $cust->nama }}</td>
					                <td>{{ $prod->product_name }}</td>
					                <td style="text-align:right;">{{ number_format($u->nilai_pengajuan) }}</td>
					                <td style="text-align:right;">{{ number_format($u->dp) }}</td>
					                <td style="text-align:right;">{{ number_format($u->total_harga) }}</td>
					                <td style="text-align:right;">{{ number_format($u->sisa_dibayar) }}</td>
					                <td style="text-align:right;">{{ number_format($u->periode) }}</td>
					                <td style="text-align:right;">{{ number_format($u->angsuran_pokok) }}</td>
					                <td style="text-align:right;">{{ number_format($u->nilai_pengajuan) }}</td>
					                <td style="text-align:right;">{{ number_format($u->nilai_pengajuan) }}</td>
					                <td>{{ $u->status_loan }}</td>
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



<!--end modal-->


</section>
@endsection
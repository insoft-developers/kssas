@extends('backend.master') @section('content') <section class="content-header">
<h1>Data Anggota Detail</h1>
<ol class="breadcrumb">
	<li>
		<a href="{{ url('/backoffice') }}"><i class="fa fa-dashboard"></i> Home</a>
	</li>
	<li>
		<a href="#">Keanggotaan</a>
	</li>
	<li>
		<a href="{{ url('membership') }}">Daftar Anggota</a>
	</li>
	<li class="active">Data Anggota Detail</li>
</ol>
</section>
 <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if($member->file_image == null) 
              
              <img class="img-me" src="{{ asset('template/frontend/images/image_placeholder.png') }}" alt="User profile picture">
              @else
              
              <img class="img-me" src="{{ asset('template/frontend/images/customer') }}/{{ $member->file_image }}" alt="User profile picture">
              
              @endif
              
              @if($member->is_active == 1)
              <a class="btn-me bg-green img-status"><i class="fa fa-check"></i></a>     
              @else
              <a class="btn-me bg-red img-status"><i class="fa fa-warning"></i></a>    
              @endif
              <h3 class="profile-username text-center">{{ $member->nama }}</h3>
              @php
                $jabatan = \App\Models\Jabatan::findorFail($member->jabatan);
              @endphp
              <p class="text-muted text-center">{{ $jabatan->jabatan }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Simp Pokok</b> <a class="pull-right">Rp. {{ number_format($member->simpanan_pokok) }}</a>
                </li>
                <li class="list-group-item">
                  <b>Simp Wajib</b> <a class="pull-right">Rp. {{ number_format($member->simpanan_wajib) }}</a>
                </li>
                <li class="list-group-item">
                  <b>Simp Sukarela</b> <a class="pull-right">Rp. {{ number_format($member->simpanan_sukarela) }}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>NIP - {{ $member->nip }}</b></a>
              <a href="#" class="btn btn-danger btn-block"><b>{{ $member->fungsi }}</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Tempat/Tgl Lahir</strong>

              <p class="text-muted">
               {{ $member->tempat_lahir }} / {{ date('d-m-Y', strtotime($member->tanggal_lahir)) }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">{{ $member->alamat }}</p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Telepon</strong>

              <p class="text-muted">{{ $member->telepon }}</p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

              <p class="text-muted">{{ $member->email }}</p>

              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Extra</a></li>
              <li><a href="#timeline" data-toggle="tab">Simpanan</a></li>
              <li><a href="#settings" data-toggle="tab">Pembiayaan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input readonly type="text" class="form-control" value="{{ $member->jenis_kelamin }}"> 
                  </div>
                  <div class="form-group">
                      <label>Ahli Waris</label>
                      <input readonly type="text" class="form-control" value="{{ $member->istri }}"> 
                  </div>
                  <div class="form-group">
                      <label>Nama Ibu Kandung </label>
                      <input readonly type="text" class="form-control" value="{{ $member->nama_ibu }}"> 
                  </div>
                  <div class="form-group">
                      <label>Lama Pemotongan </label>
                      <input readonly type="text" class="form-control" value="{{ $member->lama_pemotongan }}"> 
                  </div>
                  <div class="form-group">
                      <label>Jumlah Potongan </label>
                      <input readonly type="text" class="form-control" value="Rp.{{ number_format($member->jumlah_potongan) }}"> 
                  </div>
                  <div class="form-group">
                      <label>Mulai Berlaku </label>
                      <input readonly type="text" class="form-control" value="{{ $member->mulai_berlaku }} - {{ $member->tahun }}"> 
                  </div>
                  
                </div>
              </div>
              
              
              
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="table_simpanan_profile" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Produk</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
                                        <th>Saldo</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor =0;
                                        $saldo=0; 
                                    @endphp
                                    @foreach($saving as $s)
                                    @php
                                        $nomor++;
                                        $saldo = $saldo + $s->amount_in - $s->amount_out;
                                        $customer = \App\Models\Customer::findorFail($s->customer_id);
                                        
                                        $product = \App\Models\Product::findorFail($s->product_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $nomor }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td style="text-align:right;">Rp. {{ number_format($s->amount_in) }}</td>
                                        <td style="text-align:right;">Rp. {{ number_format($s->amount_out) }}</td>
                                        <td style="text-align:right;">Rp. {{ number_format($saldo) }}</td>
                                        <td>{{ $s->description }}</td>
                                        <td>{{ date('d-m-Y', strtotime($s->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table id="table_pinjaman_profile" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Nama Lengkap</th>
                                        <th>Produk</th>
                                        <th>Pengajuan</th>
                                        <th>DP</th>
                                        <th>Total</th>
                                        <th>Sisa Dbyar</th>
                                        <th>Lama/Bln</th>
                                        <th>Angsuran</th>
                                        <th>Dibayar</th>
                                        <th>Sisa</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor =0;
                                         
                                    @endphp
                                    @foreach($loan as $l)
                                    @php
                                        $customer = \App\Models\Customer::findorFail($l->customer_id_pinjaman);
                                        $product = \App\Models\Product::findorFail($l->product_id);
                                        $bayar = \App\Models\Angsuran::where('pinjaman_id', $l->id)->sum('jumlah_dibayar');
                                        $sisa = $l->sisa_dibayar - $bayar;
                                        $nomor++;
                                    @endphp
                                    <tr>
                                        <td>{{ $nomor }}</td>
                                        <td>
                                            @if($l->status_loan == 3)
                                                <a class="btn-me bg-green"><i class="fa fa-check"></i></a>
                                            @elseif($l->status_loan  == 2)
                                                <a class="btn-me bg-yellow"><i class="fa fa-recycle"></i></a>
                                            @elseif($l->status_loan  == 1)
                                                <a class="btn-me bg-red"><i class="fa fa-warning"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td style="text-align:right;">{{ number_format($l->nilai_pengajuan) }}</td>
                                        <td style="text-align:right;">{{ number_format($l->dp) }}</td>
                                        <td style="text-align:right;">{{ number_format($l->total_harga) }}</td>
                                        <td style="text-align:right;">{{ number_format($l->sisa_dibayar) }}</td>
                                        <td style="text-align:right;">{{ $l->periode }}</td>
                                        <td style="text-align:right;">{{ number_format($l->angsuran_pokok) }}</td>
                                        <td style="text-align:right;">{{ number_format($bayar) }}</td>
                                        <td style="text-align:right;">{{ number_format($sisa) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($s->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
          <div class="row">
          <div class="col-md-12">
              @if($member->is_active == 1)
              <button onclick="disactivate()" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-remove"></i> Non Aktifkan</button>
              @else
              <button onclick="activate()" class="btn btn-success"><i class="glyphicon glyphicon-floppy-saved"></i> Aktifkan</button>
              @endif
          </div>
      </div>
        </div>
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
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
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <button onclick="activate_confirm({{ $member->id }})" type="button" class="btn btn-outline">Aktifkan</button>
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
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
        <button onclick="disactivate_confirm({{ $member->id }})" type="button" class="btn btn-outline">Non Aktifkan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
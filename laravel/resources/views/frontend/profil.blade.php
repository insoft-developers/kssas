@extends('frontend.master') @section('content') <section id="content">
<div class="content-wrap">
	<div class="container clearfix">
		<div class="row clearfix">
			<div class="col-md-12">
			    <form id="form-profile">
			     @csrf       
			    <input type="hidden" id="id" name="id" value="{{ $customer->id }}">       
				<?php
				
				if($customer->file_image != NULL && file_exists(public_path('template/frontend/images/customer/'.$customer->file_image))) { ?>
				<img id="profile_image" src="{{ asset('template/frontend/images/customer') }}/{{ $customer->file_image }}" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="width:84px;height:84px;">
				<?php } else { ?>
				<img id="profile_image" src="{{ asset('template/frontend/images/') }}/muslim.png" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="width:84px;height:84px;">
				<?php } ?>
				<img class="img-edit" src="{{ asset('template/frontend/images/') }}/edit_icon.png">
				<input style="display:none;" accept="image/png, image/jpeg" type="file" id="file_image" name="file_image">
				<div class="heading-block border-0">
					<h3>{{ $customer->nama }}</h3>
					 @if($customer->jabatan == 1) <span>Anggota</span>
					@else <span>Pengurus</span>
					@endif
				</div>
				<button type="submit" style="display:none;" id="btn_ganti_gambar" class="btn btn-ganti-gambar">Ganti Gambar</button>
				</form>
				<div class="clear"></div>
				<div class="row clearfix">
					<div class="col-lg-12">
						<table class="table table-bordered table-striped">
						<tbody>
						<tr>
							<th>NIP</th>
							<td>{{ $customer->nip }}</td>
						</tr>
						<tr>
							<th>Tempat/Tanggal Lahir</th>
							<td>
								{{ $customer->tempat_lahir }}, {{ date('d-M-Y', strtotime($customer->tanggal_lahir)) }}
							</td>
						</tr>
						<tr>
							<th>Fungsi</th>
							<td>{{ $customer->fungsi }}</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>{{ $customer->jenis_kelamin }}</td>
						</tr>
						<tr>
							<th>No Telepon</th>
							<td>{{ $customer->telepon }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $customer->email }}</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>{{ $customer->alamat }}</td>
						</tr>
						<tr>
							<th>Nama Istri/Suami/Ahli Waris</th>
							<td>{{ $customer->istri }}</td>
						</tr>
						<tr>
							<th>Nama Ibu Kandung</th>
							<td>{{ $customer->nama_ibu }}</td>
						</tr>
						</tbody>
						</table>
						<table class="table table-bordered table-striped mt-5">
						<tbody>
						<tr>
							<th>Lama Pemotongan</th>
							<td>{{ $customer->lama_pemotongan }}</td>
						</tr>
						<tr>
							<th>Jumlah Potongan/Bulan</th>
							<td>
								Rp. {{ number_format($customer->jumlah_potongan, 2) }}
							</td>
						</tr>
						<tr>
							<th>Mulai Berlaku</th>
							<td>{{ $customer->mulai_berlaku }} {{ $customer->tahun }}</td>
						</tr>
						<tr>
							<th>Tanggal Registrasi</th>
							<td>{{ date('d-m-Y H:i:s', strtotime($customer->created_at)) }}</td>
						</tr>
						
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="w-100 line d-block d-md-none"></div>
	</div>
</div>
</div>
</section>
@endsection
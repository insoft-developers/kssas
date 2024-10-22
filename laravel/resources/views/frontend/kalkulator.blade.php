@extends('frontend.master') @section('content') 


<section id="content">
<div class="content-wrap py-0" style="overflow: visible">
	
	<div class="section mt-3 bg-transparent">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 center">
					<div class="heading-block border-bottom-0 mb-4">
						<h2 class="mb-4 nott">Kalkulator Pinjaman</h2>
					</div>
						<p>
						 Kalkulator ini hanya sebagai gambaran awal untuk mengetahui besaran cicilan ketika teman-teman anggota KSSAS ingin mengajukan pembiayaan murobahah.Untuk hitungan yang sebenarnya silahkan teman-teman menghubungi kontak CS PEMBIAYAAN di WA 62 821-6517-4835 
					</p>
					<div class="svg-line bottommargin-sm">
						<img src="{{ asset('template/frontend') }}/nonprofit/images/divider-1.svg" alt="svg divider" height="20">
					</div>
					<div id="table-one">
					<table class="table table-bordered table-striped">
					    <tr>
					        <th colspan="2">
					            INFORMASI SIMULASI
					        </th>
					    </tr>
					    <tr>
					        <th>Jenis Produk</th>
					        <th><select name="product" id="product"class="form-control">
					            <option value=""> - Pilih - </option>
					            @foreach($product as $key)
					            <option value="{{ $key->id }}">{{ $key->product_name }}</option>
					            @endforeach
					        </select>
					        </th>
					    </tr>
					    <tr>
					        <th>Harga Beli Barang/Produk</th>
					        <th><input type="number" name="harga_beli" id="harga_beli" placeholder="Contoh : 30.000.000 (tulis tanpa titik)" class="form-control"></th>
					    </tr>
					    <tr>
					        <th>Uang Muka/DP yang bisa disetorkan diawal</th>
					        <th><input type="number" name="dp" id="dp" placeholder="Contoh : 10.000.000 (tulis tanpa titik)" class="form-control"></th>
					    </tr>
					    <tr>
					        <th>Lama Cicilan</th>
					        
					        <th><select name="lama" id="lama" class="form-control">
					            <option value=""> - Pilih - </option>
					            @foreach($periode as $k)
					            <option value="{{ $k->periode_name }}">{{ $k->periode_name }} Bulan</option>
					            @endforeach
					            </select>
					        </th>
					    </tr>
					</table>
					
					<a onclick="hitung_simulasi()" href="javascript:void(0);" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Hitung Simulasi</a>
					</div>
					<div id="table-two" style="display:none;">
					<table id="table-ringkasan" class="table table-bordered mt-5">
					    <tr>
					        <th colspan="2">
					            RINGKASAN SIMULASI
					        </th>
					    </tr>
					    <tr>
					        <th>Jenis Produk</th>
					        <th><select style="pointer-events: none;" id="product_hasil" class="form-control" readonly required>
					            <option value=""> - Pilih - </option>
					            @foreach($product as $key)
					            <option value="{{ $key->id }}">{{ $key->product_name }}</option>
					            @endforeach
					        </select>
					        </th>
					    </tr>
					    <tr>
					        <th>Harga Beli Barang/Produk</th>
					        <th><input type="text" id="harga_beli_hasil" class="form-control" readonly></th>
					    </tr>
					    <tr>
					        <th>Uang Muka/DP </th>
					        <th><input type="text" id="dp_hasil" class="form-control" readonly></th>
					    </tr>
					    <tr>
					        <th>Harga Jual KSSAS</th>
					        <th><input type="text" id="harga_jual" class="form-control" readonly></th>
					    </tr>
					    <tr>
					        <th>Harga Yang Diangsur</th>
					        <th><input type="text" id="harga_angsur" class="form-control" readonly></th>
					    </tr>
					    <tr>
					        <th>Lama Cicilan</th>
					        <th><select style="pointer-events: none;" id="lama_hasil" class="form-control" readonly required>
					            <option value=""> - Pilih - </option>
					            <option value="6">6 Bulan</option>
					            <option value="12">12 Bulan</option>
					            <option value="18">18 Bulan</option>
					            <option value="24">24 Bulan</option>
					            <option value="30">30 Bulan</option>
					            <option value="36">36 Bulan</option>
					            </select>
					        </th>
					    </tr>
					    <tr>
					        <th>Besar Cicilan / Bulan</th>
					        <th><input type="text" id="cicilan" class="form-control" readonly></th>
					    </tr>
					</table>
					
					<div id="content-alternative"></div>
					
					    
					    
					<!--</table>-->
					<a onclick="new_simulasi()" href="javascript:void(0);" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Simulasi Baru</a>
					</div>
					
					
				</div>
			</div>
		</div>
		
	</div>
	<div clss="section mt-3" style="margin-top:-60px;margin-bottom:80px;">
	    <div class="container clearfix">
	       
		
</p>
	    </div>
	</div>
	
	
<!-- #content end -->
@endsection
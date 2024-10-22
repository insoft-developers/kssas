<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Angsuran;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DB;
use Session;

class FinancingController extends Controller
{
    public function apiFinancing() {
        $data = Loan::all();
        return Datatables::of($data)
            ->addColumn('pembayaran', function($data){
                $payment = Angsuran::where('pinjaman_id', $data->id)->sum('jumlah_dibayar');
                
                return '<div style="text-align:right;">'.number_format($payment).'</div>';
            })
            ->addColumn('sisa', function($data){
                $payment = Angsuran::where('pinjaman_id', $data->id)->sum('jumlah_dibayar');
                $sisa = $data->sisa_dibayar - $payment;
                
                return '<div style="text-align:right;">'.number_format($sisa).'</div>';
            })
            ->addColumn('status_loan', function($data){
                if($data->status_loan == 1) {
                    return '<center><a class="btn-me bg-red"><i class="fa fa-warning"></i></a></center>';
                }
                else if($data->status_loan == 2) {
                    return '<center><a class="btn-me bg-yellow"><i class="fa fa-recycle"></i></a></center>';
                }
                else if($data->status_loan == 3) {
                    return '<center><a class="btn-me bg-green"><i class="fa fa-check"></i></a></center>';
                }
            })
            ->addColumn('nilai_pengajuan', function($data){
                return '<div style="text-align:right;">'.number_format($data->nilai_pengajuan).'</div>';
            })
            ->addColumn('dp', function($data){
                return '<div style="text-align:right;">'.number_format($data->dp).'</div>';
            })
            ->addColumn('total_harga', function($data){
                return '<div style="text-align:right;">'.number_format($data->total_harga).'</div>';
            })
            ->addColumn('sisa_dibayar', function($data){
                return '<div style="text-align:right;">'.number_format($data->sisa_dibayar).'</div>';
            })
            ->addColumn('angsuran_pokok', function($data){
                return '<div style="text-align:right;">'.number_format($data->angsuran_pokok).'</div>';
            })
            ->addColumn('customer_id_pinjaman', function($data){
                $cust = Customer::findorFail($data->customer_id_pinjaman);
                return $cust->nama;
            })
            ->addColumn('product_id', function($data){
                $prod = Product::findorFail($data->product_id);
                return $prod->product_name;
            })
            ->addColumn('created_at', function($data){
                return date('d-m-Y', strtotime($data->created_at));
            })
            ->addColumn('action', function($data){
                if($data->status_loan == 3) {
                    return '<center><a onclick="detailForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-th-list"></i></a>'.
                    '<br><a title="pembayaran" onclick="payData('. $data->id.')" style="width:25px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-usd"></i></a></center>';
                } else {
                    return '<center><a onclick="detailForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-th-list"></i></a>'.
                    '<br><a onclick="editForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>'.
                    '<br><a onclick="deleteForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>'.
                    '</center>';
                }
                
            })->rawColumns(['action','customer_id_pinjaman','product_id','created_at','nilai_pengajuan','dp','angsuran_pokok','sisa_dibayar','total_harga','dp','nilai_pengajuan','status_loan','pembayaran','sisa'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->pembiayaan != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-financing';
        $setting = Setting::findorFail(1);
        $customer = Customer::where('is_active', 1)->get();
        $product = Product::where('product_category', 2)->get();
        $periode = \App\Models\Periode::all();
        return view('backend.financing', compact('view','setting','customer','product','periode'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = $request->all();
        try{
            $unik = uniqid();
            
            $input['image1'] = null;
            if($request->hasFile('image1')){
                $input['image1'] = Str::slug('1'.$unik, '-').'.'.$request->image1->getClientOriginalExtension();
                $request->image1->move(public_path('/template/frontend/images/pinjaman'), $input['image1']);
            }
            
            $input['image2'] = null;
            if($request->hasFile('image2')){
                $input['image2'] = Str::slug('2'.$unik, '-').'.'.$request->image2->getClientOriginalExtension();
                $request->image2->move(public_path('/template/frontend/images/pinjaman'), $input['image2']);
            }
            
            $input['image3'] = null;
            if($request->hasFile('image3')){
                $input['image3'] = Str::slug('3'.$unik, '-').'.'.$request->image3->getClientOriginalExtension();
                $request->image3->move(public_path('/template/frontend/images/pinjaman'), $input['image3']);
            }
            
            
            \App\Models\Loan::create($input);
            return response()->json([
               "success" => true,
               "message" => 'Pengajuan anda Berhasil ditambahkan!'
            ]);
        }catch(\Exception $e) {
            return response()->json([
               "success" => false,
               "message" => $e->getMessage()
            ]);
        }
    }
    
    

 
    public function show($id)
    {
        $data = Loan::findorFail($id);
        $cust = Customer::findorFail($data->customer_id_pinjaman);
        $prod = Product::findorFail($data->product_id);
        
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-4"><img class="header-image" src="'.asset('template/frontend/images/pinjaman').'/'.$data->image1.'"></div>';
        $html .= '<div class="col-md-4"><img class="header-image" src="'.asset('template/frontend/images/pinjaman').'/'.$data->image2.'"></div>';
        $html .= '<div class="col-md-4"><img class="header-image" src="'.asset('template/frontend/images/pinjaman').'/'.$data->image3.'"></div>';
        $html .= '</div>';
        
        $html .= '<div class="row" style="margin-top:20px;">';
        $html .= '<div class="col-md-6">';
        $html .= '<table class="table table-bordered table-striped">';
        $html .= '<tr><th>Nama Anggota</th><td>'.$cust->nama.'</td></tr>';
        $html .= '<tr><th>Umur</th><td>'.$data->umur.'</td></tr>';
        $html .= '<tr><th>Tanggal Pensiun</th><td>'.$data->tanggal_pensiun.'</td></tr>';
        $html .= '<tr><th>Tanggal Masuk Kerja</th><td>'.$data->tanggal_masuk_kerja.'</td></tr>';
        $html .= '<tr><th>No Telepon</th><td>'.$data->telepon.'</td></tr>';
        $html .= '<tr><th>No Rekening</th><td>'.$data->no_rekening.'</td></tr>';
        $html .= '<tr><th>Gaji Pokok</th><td>'.number_format($data->gaji_pokok).'</td></tr>';
        $html .= '<tr><th>Tunjangan Posisi</th><td>'.number_format($data->tunjangan_posisi).'</td></tr>';
        $html .= '<tr><th>Tunjangan Manajemen</th><td>'.number_format($data->tunjangan_manajemen).'</td></tr>';
        $html .= '<tr><th>Tunjangan Daerah</th><td>'.number_format($data->tunjangan_daerah).'</td></tr>';
        $html .= '<tr><th>Shift Premium</th><td>'.number_format($data->shift_premium).'</td></tr>';
        $html .= '<tr><th>Tunjangan Lain</th><td>'.number_format($data->tunjangan_lain).'</td></tr>';
        $html .= '<tr><th>Pajak Penghasilan</th><td>'.number_format($data->pajak_penghasilan).'</td></tr>';
        $html .= '<tr><th>Iuran Pensiun</th><td>'.number_format($data->iuran_pensiun).'</td></tr>';
        $html .= '<tr><th>Jamsostek</th><td>'.number_format($data->jamsostek).'</td></tr>';
        $html .= '<tr><th>Potongan KSSAS</th><td>'.number_format($data->potongan_kssas).'</td></tr>';
        $html .= '<tr><th>Potongan Selain KSSAS</th><td>'.number_format($data->potongan_selain_kssas).'</td></tr>';
        $html .= '</table>';
        $html .= '</div>';
        
        $html .= '<div class="col-md-6">';
        $html .= '<table class="table table-bordered table-striped">';
        $html .= '<tr><th>Produk</th><td>'.$prod->product_name.'</td></tr>';
        $html .= '<tr><th>Nilai Pengajuan</th><td>'.number_format($data->nilai_pengajuan).'</td></tr>';
        $html .= '<tr><th>Angsuran Pokok</th><td>'.number_format($data->angsuran_pokok).'</td></tr>';
        $html .= '<tr><th>Periode</th><td>'.number_format($data->periode).'</td></tr>';
        $html .= '<tr><th>DP (down payment)</th><td>'.number_format($data->dp).'</td></tr>';
        $html .= '<tr><th>Angsuran Jasa</th><td>'.number_format($data->angsuran_jasa).'</td></tr>';
        $html .= '<tr><th>Potongan Baru</th><td>'.number_format($data->potongan_baru).'</td></tr>';
        $html .= '<tr><th>Pembiayaan Lama</th><td>'.number_format($data->pembiayaan_lama).'</td></tr>';
        $html .= '<tr><th>Persentase</th><td>'.$data->persentase.'%</td></tr>';
        $html .= '<tr><th>Total Harga</th><td>'.number_format($data->total_harga).'</td></tr>';
        $html .= '<tr><th>Sisa Dibayar</th><td>'.number_format($data->sisa_dibayar).'</td></tr>';
        $html .= '<tr><th>Total Tunjangan</th><td>'.number_format($data->total_tunjangan).'</td></tr>';
        $html .= '<tr><th>Total Potongan</th><td>'.number_format($data->total_potongan).'</td></tr>';
        $html .= '<tr><th>Saldo Gaji Netto</th><td>'.number_format($data->saldo_gaji_netto).'</td></tr>';
        $html .= '<tr><th>Keterangan</th><td>'.$data->keterangan.'</td></tr>';
        $html .= '<tr><th>Komentar</th><td>'.$data->komentar.'</td></tr>';
        if($data->status_loan == 1) {
            $html .= '<tr><th>Status</th><td><center><a class="btn-action bg-red">diajukan</a></center></td></tr>';    
        }
        else if($data->status_loan == 2) {
            $html .= '<tr><th>Status</th><td><center><a class="btn-action bg-yellow">diproses</a></center></td></tr>';    
        }
        else if($data->status_loan == 3) {
            $html .= '<tr><th>Status</th><td><center><a class="btn-action bg-green">selesai</a></center></td></tr>';    
        }
        
        
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        
        $d['data'] = $data;
        $d['html'] = $html;
        return $d;
    }

  
    public function edit($id)
    {
        $data = Loan::findorFail($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = Loan::findorFail($id);
        $path1 = public_path('/template/frontend/images/pinjaman/'.$data->image1);
        $path2 = public_path('/template/frontend/images/pinjaman/'.$data->image2);
        $path3 = public_path('/template/frontend/images/pinjaman/'.$data->image3);
        $path = public_path('/template/frontend/images/pinjaman');
        $input = $request->all();
        $unik = uniqid();
        
        $input['image1'] = $data->image1;
        $input['image2'] = $data->image2;
        $input['image3'] = $data->image3;
        
        
        if($request->hasFile('image1')){
            if($data->gambar1 != NULL && file_exists($path1)){
                unlink($path1);
            }

            $input['image1'] = Str::slug($unik, '-').'.'.$request->image1->getClientOriginalExtension();
            $request->image1->move($path, $input['image1']);
        }
        
        if($request->hasFile('image2')){
            if($data->gambar2 != NULL && file_exists($path2)){
                unlink($path2);
            }

            $input['image2'] = Str::slug($unik, '-').'.'.$request->image2->getClientOriginalExtension();
            $request->image2->move($path, $input['image2']);
        }
        if($request->hasFile('image3')){
            if($data->gambar3 != NULL && file_exists($path3)){
                unlink($path3);
            }

            $input['image3'] = Str::slug($unik, '-').'.'.$request->image3->getClientOriginalExtension();
            $request->image3->move($path, $input['image3']);
        }

        $data->update($input);
        
        return response()->json([
            'success'=>true
        ]);
    }

    
    public function destroy($id)
    {
        $data = Loan::findorFail($id);
        $path1 = public_path('/template/frontend/images/pinjaman/'.$data->image1);
        $path2 = public_path('/template/frontend/images/pinjaman/'.$data->image2);
        $path3 = public_path('/template/frontend/images/pinjaman/'.$data->image3);
        
        if($data->image1 != NULL && file_exists($path1)){
            unlink($path1);
        }
        if($data->image2 != NULL && file_exists($path2)){
            unlink($path2);
        }
        if($data->image3 != NULL && file_exists($path3)){
            unlink($path3);
        }

        Loan::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function loanProcess(Request $request) {
        $input = $request->all();
        $data = Loan::findorFail($input['id']);
        $data->status_loan = 2;
        $data->save();
        return $data;
    }
    
    public function loanReset(Request $request) {
        $input = $request->all();
        $data = Loan::findorFail($input['id']);
        $data->status_loan = 1;
        $data->save();
        return $data;
    }
    
    public function loanApprove(Request $request) {
        $input = $request->all();
        $data = Loan::findorFail($input['id']);
        $data->status_loan = 3;
        $data->save();
        
        $lama_angsuran = $data->periode;
        for($i=1; $i<= $lama_angsuran; $i++) {
            $a = new Angsuran;
            $a->customer_id = $data->customer_id_pinjaman;
            $a->pinjaman_id = $data->id;
            $a->jumlah_pinjaman = $data->nilai_pengajuan;
            $a->harga_kssas = $data->total_harga;
            $a->dp = $data->dp;
            $a->harus_dibayar = $data->sisa_dibayar;
            $a->periode = $data->periode;
            $a->cicilan = $data->angsuran_pokok;
            $a->cicilan_ke = $i;
            $a->jumlah_dibayar = 0;
            $a->keterangan = "";
            $a->save();
        }
        return $data;
    }
    
    public function paymentShow($id) {
        $data = Angsuran::where('pinjaman_id', $id)->get();
        
        $html = '';
        $html .= '<table id="table_angsuran_cantik" class="table table-cantik table-bordered table-hoverred">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>Jumlah</th>';
        $html .= '<th>Harga KSSAS</th>';
        $html .= '<th>DP</th>';
        $html .= '<th>Harus Dibayar</th>';
        $html .= '<th>Term</th>';
        $html .= '<th>Cicilan</th>';
        $html .= '<th>Pembayaran</th>';
        $html .= '<th>Saldo</th>';
        $html .= '<th>Ke</th>';
        $html .= '<th>Tanggal Bayar</th>';
        $html .= '<th>Keterangan</th>';
        $html .= '<th>Action</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        $nomor=0;
        $saldo=$data[0]->harus_dibayar; 
        foreach($data as $d) {
            $cust = Customer::findorFail($d->customer_id);
            $nomor++;
            $saldo = $saldo - $d->jumlah_dibayar;
            $html .= '<tr>';
            $html .= '<td>'.$nomor.'</td>';
            $html .= '<td style="text-align:right;">'.number_format($d->jumlah_pinjaman).'</td>';
            $html .= '<td style="text-align:right;">'.number_format($d->harga_kssas).'</td>';
            $html .= '<td style="text-align:right;">'.number_format($d->dp).'</td>';
            $html .= '<td style="text-align:right;">'.number_format($d->harus_dibayar).'</td>';
            $html .= '<td>'.$d->periode.'</td>';
            $html .= '<td style="text-align:right;">'.number_format($d->cicilan).' <input id="input_cicilan_'.$d->id.'" type="hidden" class="form-control" value="'.$d->cicilan.'"></td>';
            $html .= '<td style="text-align:right;"><span id="text_jumlah_dibayar_'.$d->id.'">'.number_format($d->jumlah_dibayar).'</span><input readonly style="display:none;" id="input_jumlah_dibayar_'.$d->id.'" type="number" class="form-control"></td>';
            $html .= '<td style="text-align:right;">'.number_format($saldo).'</td>';
            $html .= '<td>'.$d->cicilan_ke.'</td>';
            $html .= '<td style="text-align:center;">'.date('d-m-Y', strtotime($d->tanggal_pembayaran)).'</td>';
            $html .= '<td>'.$d->keterangan.'</td>';
            $html .= '<td><center><a onclick="bayar('.$d->id.')" id="btn_bayar_'.$d->id.'" title="Bayar" class="btn-me bg-green"><i class="fa fa-dollar"></i></a><a onclick="cancel('.$d->id.')" title="Cancel" id="btn_cancel_'.$d->id.'" style="display:none;" class="btn-me bg-red"><i class="fa fa-remove"></i></a><a onclick="simpan('.$d->id.')" title="Simpan" id="btn_simpan_'.$d->id.'" style="display:none;" class="btn-me bg-blue"><i class="fa fa-check"></i></a></center></td>';
            $html .= '</tr>';
        }
        
        $html .= '</tbody>';
        $html .= '</table>';
        
        return $html;
        
    }
    
    
    public function bayarCicilan(Request $request) {
        $input = $request->all();
        $data = Angsuran::findorFail($input['id']);
        $data->jumlah_dibayar = $input['jumlah'];
        $data->tanggal_pembayaran = date('Y-m-d');
        $data->keterangan = 'lunas';
        $data->save();
        return $data;
    }
    
    
    public function countAge($id) {
        $cust = Customer::findorFail($id);
        return response()->json($this->hitung_umur($cust->tanggal_lahir));
        
    }
    
    
    function hitung_umur($tanggal_lahir){
    	$birthDate = new DateTime($tanggal_lahir);
    	$today = new DateTime("today");
    	if ($birthDate > $today) { 
    	    exit("0 tahun 0 bulan 0 hari");
    	}
    	$y = $today->diff($birthDate)->y;
    	$m = $today->diff($birthDate)->m;
    	$d = $today->diff($birthDate)->d;
    	return $y." tahun ".$m." bulan ".$d." hari";
    }
    
    
    public function uploadFinancing()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->pembiayaan != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-upload-financing';
        $setting = Setting::findorFail(1);
        $upload = DB::table('loans')->get();
        return view('backend.upload_financing', compact('view','setting', 'upload'));
    }
    
    
    public function importDataFinancing(Request $request) {
        try {
            $file = $request->file('file');
            $fileContents = file($file->getPathname());
            foreach ($fileContents as $line) {
                $data = str_getcsv($line);
                
                
                $insert = [
                  "customer_id_pinjaman" => $data[1],
                  "umur" => $data[2],
                  "tanggal_pensiun" => date('Y-m-d', strtotime($data[3])),
                  "tanggal_masuk_kerja" => date('Y-m-d', strtotime($data[4])),
                  "telepon" => $data[5],
                  "no_rekening" => $data[6],
                  "gaji_pokok" => $data[7],
                  "tunjangan_posisi" => $data[8],
                  "tunjangan_manajemen" => $data[9],
                  "tunjangan_daerah" => $data[10],
                  "shift_premium" => $data[11],
                  "tunjangan_lain" => $data[12],
                  "pajak_penghasilan" => $data[13],
                  "iuran_pensiun"=> $data[14],
                  "jamsostek" => $data[15],
                  "potongan_kssas" => $data[16],
                  "potongan_selain_kssas" => $data[17],
                  "product_id" => $data[18],
                  "nilai_pengajuan" => $data[19],
                  "angsuran_pokok" => $data[20],
                  "periode" => $data[21],
                  "dp" => $data[22],
                  "angsuran_jasa" => $data[23],
                  "potongan_baru" => $data[24],
                  "pembiayaan_lama" => $data[25],
                  "persentase" => $data[26],
                  "saldo_gaji_netto" => $data[27],
                  "keterangan" => $data[28],
                  "komentar" => $data[29],
                  "status_loan" => $data[30],
                  "total_harga" => $data[31],
                  "sisa_dibayar" => $data[32],
                  "total_tunjangan" => $data[33],
                  "total_potongan" => $data[34],
                  "created_at" => date('Y-m-d', strtotime($data[35])),
                ];
                
                $id = DB::table('loans')->insertGetId($insert);
              
                if($id) {
                    $status = $data[30];
                    $sudah_bayar = $data[36];
                    $lama = $data[21];
                    
                    if($status == 3) {
                        for($i=1; $i <= $lama; $i++) {
                            $masuk = [
                              "customer_id" => $insert['customer_id_pinjaman'], 
                              "pinjaman_id" => $id,
                              "jumlah_pinjaman" => $insert['nilai_pengajuan'], 
                              "harga_kssas" => $insert['total_harga'],
                              "dp" => $insert['dp'],
                              "harus_dibayar" => $insert['sisa_dibayar'],
                              "periode" => $insert['periode'],
                              "cicilan" => $insert['angsuran_pokok'],
                              "cicilan_ke" => $i,
                              "jumlah_dibayar" => 0,
                              "tanggal_pembayaran" => null, 
                              "keterangan" => "lunas",
                              "created_at" => date('Y-m-d H:i:s'),
                              "updated_at" => date('Y-m-d H:i:s'),
                            ];
                            
                            if($sudah_bayar >= $i) {
                                $masuk['jumlah_dibayar'] = $insert['angsuran_pokok'];
                                $masuk['tanggal_pembayaran'] = date('Y-m-d');
                            }
                            
                            DB::table('angsurans')->insert($masuk);
                        }
                        
                    }
                }
                
                
            }
            
            Session::flash('sukses','CSV file Sukses Diupload...');
		    return redirect('upload_financing');
        } catch(\Exception $e) {
            Session::flash('gagal',$e->getMessage());
		    return redirect('upload_financing');
        }
        
    }
    
}

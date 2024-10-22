<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 
use App\Mail\MyEmail;
use App\Mail\LupaEmail;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Str;
use Validator;
use DataTables;
use DateTime;
use App\Models\Setting;
use DB;
use Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function upload_pendaftaran(Request $request) {
        $input = $request->all();
        
        $rules = array(
            "foto" => "required"
        );
        
        $validator = Validator::make($input, $rules);
        if($validator->fails()){
            Session::flash('error', $validator->errors());
            return response()->Json([
                "success" => false,
            ]);
            
        }
        
        $input['foto'] = null;

        if($request->hasFile('foto')){
            $input['foto'] = Str::slug(time().'-'.uniqid(), '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/template/frontend/images/form-pendaftaran'), $input['foto']);
        }

        DB::table('form_pendaftaran_anggota')->insert([
                'foto' => $input['foto'],
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
        ]);

        Session::flash("success", "Form Berhasil ditambahkan!");
        return response()->Json([
            "success" => true,
        ]);
    } 
     
    public function daftar()
    {
        $view = 'register';
        $setting = Setting::findorFail(1);
        return view('frontend.register', compact('view', 'setting'));
    }
    
    
    public function upload_anggota_baru() {
        $view = "upload-baru";
        $setting = Setting::findorFail(1);
        return view('frontend.upload', compact('view', 'setting'));
    }
    
    
    function random_digits($length) {
        $result = '';
    
        for ($i = 0; $i < $length; $i++) {
            $result .= random_int(0, 9);
        }
    
        return $result;
    }
    
    
    public function register(Request $request) {
        $input = $request->all();
        
        try {
            $input['jabatan'] = 1;
            $query = Customer::create($input);
            $id = $query->id;
            
            $password = $this->random_digits(8); 
            
            $cust = Customer::findorfail($id);
            $cust->password = SHA1($password);
            $cust->save();
            
            
            $details = [
                'title' => 'Terima Kasih Telah Mendaftar Sebagai Anggota Kopsya Setia Amanah Sejahtera (KSSAS)',
                'body' => 'Silahkan Tunggu konfirmasi dari Kami untuk bisa login ke Akun Anda, Password Anda adalah: '.$password,
                'pengirim' => 'KSSAS Customer Center'
            ];
    
            \Mail::to($input['email'])->send(new MyEmail($details));
            return response()->json([
               "success" => true,
               "message" => "Pendaftaran Berhasil. Password Login anda sudah terkirim ke email Anda..."
            ]);

        }
        catch(\Exception $e) {
            return response()->json([
               "success" => false,
               "message" => "Periksa data Anda Kembali atau No Telepon/NIP/Email Anda Sudah Terdaftar"
                // "message" => $e->getMessage()
            ]);
        } 
                
    }
    
    
    public function login(Request $request) {
        $input = $request->all();
        $password = SHA1($input['login-password']);
        $cek = Customer::where('email', $input['login-username'])
                ->where('password', $password);
        if($cek->get()->count() == 1) {
           $data = $cek->first(); 
           
           if($data->is_active == 1) {
                Session::put('session_id_frontend', $data->id);
                Session::put('session_nama_frontend', $data->nama);
                Session::put('session_nip_frontend', $data->nip);
                Session::put('session_email_frontend', $data->email);
                Session::put('session_telepon_frontend', $data->telepon);
                Session::put('session_image_frontend', $data->file_image);
               
                return response()->json([
                    "success" => true,
                    "message" => $data
               ]);
           } else {
               return response()->json([
                    "success" => false,
                    "message" => 'Maaf Akun anda belum Aktif, Silahkan Hub CS Kami..., Terima kasih'
               ]);
           }
           
           
        }  else {
           return response()->json([
                "success" => false,
                "message" => 'Username atau password masih salah...!'
           ]);
        }
        
    }
    
    
    public function profil() {
        if(!Session::has('session_id_frontend')) {
            return redirect('/daftar');
        }
        
        $view = 'profil';
        $customer_id = Session::get('session_id_frontend');
        $customer = Customer::findorFail($customer_id);
        $setting = Setting::findorFail(1);
        return view('frontend.profil', compact('view', 'customer','setting'));
    }
    
    
    public function logout() {
        Session::flush();
        return redirect('/');
    }
    
    
    public function update_profile_image(Request $request) {
        $input = $request->all();
        $input['file_image'] = null;
        $unik = uniqid();

        if($request->hasFile('file_image')){
            $input['file_image'] = Str::slug($unik, '-').'.'.$request->file_image->getClientOriginalExtension();
            $request->file_image->move(public_path('/template/frontend/images/customer'), $input['file_image']);
        }
        try {
            $cust = Customer::findorFail($input['id']);
            $cust->file_image = $input['file_image'];
            $cust->save();
            return response()->json([
                'success'=>true,
                "message" => "Ubah Gambar Profil Berhasil...!"
            ]);    
        }catch(\Exception $e) {
            return response()->json([
                'success'=>false,
                "message" => $e->getMessage()
            ]);
        }
    
    }
    
    
    public function change_password() {
        if(!Session::has('session_id_frontend')) {
            return redirect('/daftar');
        }
        $view = 'change-password';
        $setting = Setting::findorFail(1);
        return view('frontend.change_password', compact('view','setting'));
    }
    
    
    public function update_password(Request $request) {
        $input = $request->all();
        $rules = array(
          "password_lama"=> "required" ,
          "password_baru" => "required",
          "password_konfirmasi" => "required"
        );
        
        $validator = Validator::make($input, $rules);
        if($validator->fails()) {
            return response()->json([
               "success" => false,
               "message" => $validator->errors()
            ]);
        }
        
        
        if($input['password_baru'] != $input['password_konfirmasi']) {
            return response()->json([
               "success" => false,
               "message" => "password tidak cocok...!"
            ]);
        }
        
        
        $user_id = Session::get('session_id_frontend');
        $password = SHA1($input['password_lama']);
        $cek = Customer::where('id', $user_id)
                ->where('password', $password)->get();
        
        if($cek->count() == 1) {
            $c = Customer::findorFail($user_id);
            $c->password = SHA1($input['password_baru']);
            $c->save();
            
            return response()->json([
                   "success" => true,
                   "message" => "sukses update password...!"
            ]);
        } else {
            return response()->json([
                   "success" => false,
                   "message" => "password lama masih salah...!"
            ]);
        }       
                
    }
    
    
    public function keanggotaan() {
        if(!Session::has('session_id_frontend')) {
            return redirect('/daftar');
        }
        $view = 'keanggotaan';
        $customer = Customer::findorFail(Session::get('session_id_frontend'));
        $saving = \App\Models\Saving::where('customer_id', Session::get('session_id_frontend'))->get();
        $product = \App\Models\Product::where('product_category', 2)->get();
        $simp = \App\Models\Product::where('product_name', 'Simpanan Sukarela')->get();
        $periode = \App\Models\Periode::all();
        $umur = $this->hitung_umur($customer->tanggal_lahir);
        $setting = Setting::findorFail(1);
        return view('frontend.keanggotaan', compact('view','customer', 'saving', 'product', 'periode', 'umur','setting','simp'));
    }
    
    
    public function periode_by_product($id) {
        $data = \App\Models\ProductDetail::where('product_id', $id)->get();
        return response()->json($data);
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
    
    
    public function table_simpanan(){
        $id = Session::get('session_id_frontend');
        $data = \App\Models\Simpanan::where('customer_id', $id)->get();

        return Datatables::of($data)
            ->addColumn('status', function($data){
                if($data->status == 1) {
                    return '<center style="color:red;"><span class="btn-action">diajukan</span></center>';
                }
                else if($data->status == 2) {
                    return '<center style="color:blue;"><span class="btn-action">diproses</span></center>';
                }
                else if($data->status == 3) {
                    return '<center style="color:green;"><span class="btn-action">selesai</span></center>';
                }
            })
            ->addColumn('amount', function($data){
                return '<div style="text-align:right;">'.number_format($data->amount).'</div>';
            })
            ->addColumn('created_at', function($data){
                return '<center>'.date('d-m-Y', strtotime($data->created_at)).'</center>';
            })
            ->addColumn('type', function($data){
                if($data->type == 1) {
                    return 'Simpanan Pokok';
                } else if($data->type == 2) {
                    return 'Simpanan Wajib';
                } else if($data->type == 3) {
                    return 'Simpanan Sukarela';
                }
            })
            ->addColumn('customer_id', function($data){
                $customer = \App\Models\Customer::findorFail($data->customer_id);
                return $customer->nama;
            })->rawColumns(['customer_id', 'created_at', 'type', 'amount','status'])->make(true);
    }
    
    
    public function tambah_penarikan(Request $request) {
        $input = $request->all();
        \App\Models\Simpanan::create($input);
        return response()->json([
            "success" => true,
            "message" => "success"
            ]);
     }
     
     
    public function tambah_pembuatan(Request $request) {
        $input = $request->all();
        
        $input['upload_bukti'] = null;

        if($request->hasFile('upload_bukti')){
            $input['upload_bukti'] = Str::slug(uniqid(), '-').'.'.$request->upload_bukti->getClientOriginalExtension();
            $request->upload_bukti->move(public_path('/template/frontend/files/bukti_transfer/'), $input['upload_bukti']);
        }
        
        $input['status'] = $input['status_simpanan'];
        \App\Models\Saving::create($input);
        return response()->json([
            "success" => true,
            "message" => "success"
            ]);
    }
     
     
    public function table_pinjaman(){
        $id = Session::get('session_id_frontend');
        $data = \App\Models\Loan::where('customer_id_pinjaman', $id)->get();
        return Datatables::of($data)
        ->addColumn('status_loan', function($data){
            if($data->status_loan == 1) {
                return '<center style="color:red;"><span class="btn-action">diajukan</span></center>';
            }
            else if($data->status_loan == 2) {
                return '<center style="color:blue;"><span class="btn-action">diproses</span></center>';
            }
            else if($data->status_loan == 3) {
                return '<center style="color:green;"><span class="btn-action">selesai</span></center>';
            }
        })
        ->addColumn('action', function($data) {
            if($data->status_loan == 1) {
                return '<center><div class="btn-group">
								<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									more
								</button>
								<div class="dropdown-menu" style="">
									<a onclick="lihat_pinjaman('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Lihat</a>
									<a onclick="edit_pinjaman('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Edit</a>
									<a onclick="delete_pinjaman('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Hapus</a>
								</div>
							</div></center>';
            } else {
                 return '<center><div class="btn-group">
								<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									more
								</button>
								<div class="dropdown-menu" style="">
									<a onclick="lihat_pinjaman('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Lihat</a>
								</div>
							</div></center>';
            }
           
        })
        ->addColumn('product_id', function($data){
            
            $produk = \App\Models\Product::findorFail($data->product_id);
            return $produk->product_name;
        })
        ->addColumn('customer_id_pinjaman', function($data){
            
            $customer = \App\Models\Customer::findorFail($data->customer_id_pinjaman);
            return $customer->nama;
        })
        ->addColumn('created_at', function($data){
            return '<center>'.date('d-m-Y', strtotime($data->created_at)).'</center>';
        })
        ->addColumn('nilai_pengajuan', function($data){
            return '<div style="text-align:right";>'.number_format($data->nilai_pengajuan).'</div>';
        })
        ->addColumn('dp', function($data){
            return '<div style="text-align:right";>'.number_format($data->dp).'</div>';
        })
       
        ->addColumn('sisa_dibayar', function($data){
            return '<div style="text-align:right";>'.number_format($data->sisa_dibayar).'</div>';
        })
        ->addColumn('angsuran_pokok', function($data){
            return '<div style="text-align:right";>'.number_format($data->angsuran_pokok).'</div>';
        })
        ->addColumn('total_harga', function($data){
            return '<div style="text-align:right";>'.number_format($data->total_harga).'</div>';
        })
        ->rawColumns(['status_loan', 'action', 'customer_id_pinjaman','product_id','created_at','nilai_pengajuan','dp', 'sisa_dibayar','angsuran_pokok','total_harga'])->make(true);
    }
    
    
    public function kalkulasi_pinjaman(Request $request) {
        $input = $request->all();
        $detail = \App\Models\ProductDetail::where('product_id', $input['productId'])->where('product_term', $input['lama'])->first();
        $rate = $detail->product_rate;
        $total_persen_rate = $rate * $input['lama'];
        $total_persen_value = round($total_persen_rate * $input['nilaiPengajuan'] / 100);
        $total_harga = (int)$total_persen_value + $input['nilaiPengajuan'];
        $sisa = $total_harga - $input['dp'];
        $angsuran = round($sisa / $input['lama']);
        
        
        
        return response()->json([
            "persentase"=> number_format($total_persen_rate, 2),
            "total_harga" => $total_harga,
            "sisa" => $sisa,
            "angsuran" => $angsuran
        ]);
    }
    
    
    public function submit_pinjaman(Request $request) {
        $input = $request->all();
        try{
            $unik = uniqid();
            
            $input['upload_pembiayaan'] = null;
            if($request->hasFile('upload_pembiayaan')){
                $input['upload_pembiayaan'] = Str::slug('1'.$unik, '-').'.'.$request->upload_pembiayaan->getClientOriginalExtension();
                $request->upload_pembiayaan->move(public_path('/template/frontend/images/pinjaman'), $input['upload_pembiayaan']);
            }
            
            
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
               "message" => 'Pengajuan anda Berhasil ditambahkan harap tunggu proses verifikasi oleh admin..!'
            ]);
        }catch(\Exception $e) {
            return response()->json([
               "success" => false,
               "message" => $e->getMessage()
            ]);
        }
    }
    
    
    public function update_pinjaman(Request $request) {
        $input = $request->all();
        try{
            $data = \App\Models\Loan::findorFail($input['pinjaman_id']);
            
            $unik = uniqid();
            
            $input['upload_pembiayaan'] = $data->upload_pembiayaan;
            if($request->hasFile('upload_pembiayaan')){
                $input['upload_pembiayaan'] = Str::slug('1'.$unik, '-').'.'.$request->upload_pembiayaan->getClientOriginalExtension();
                $request->upload_pembiayaan->move(public_path('/template/frontend/images/pinjaman'), $input['upload_pembiayaan']);
            }
            
            $input['image1'] = $data->image1;
            if($request->hasFile('image1')){
                $input['image1'] = Str::slug('1'.$unik, '-').'.'.$request->image1->getClientOriginalExtension();
                $request->image1->move(public_path('/template/frontend/images/pinjaman'), $input['image1']);
            }
            
            $input['image2'] = $data->image2;
            if($request->hasFile('image2')){
                $input['image2'] = Str::slug('2'.$unik, '-').'.'.$request->image2->getClientOriginalExtension();
                $request->image2->move(public_path('/template/frontend/images/pinjaman'), $input['image2']);
            }
            
            $input['image3'] = $data->image3;
            if($request->hasFile('image3')){
                $input['image3'] = Str::slug('3'.$unik, '-').'.'.$request->image3->getClientOriginalExtension();
                $request->image3->move(public_path('/template/frontend/images/pinjaman'), $input['image3']);
            }
            
            
            $data->update($input);
            return response()->json([
               "success" => true,
               "message" => 'Pengajuan anda Berhasil diupdate harap tunggu proses verifikasi oleh admin..!'
            ]);
        }catch(\Exception $e) {
            return response()->json([
               "success" => false,
               "message" => $e->getMessage()
            ]);
        }
    }
    
    
    public function pinjaman_edit($id) {
        $data = \App\Models\Loan::findorFail($id);
        return $data;
    }
    
    
    public function delete_pinjaman(Request $request) {
        $input = $request->all();
        $query = \App\Models\Loan::destroy($input['id']);
        return $query;
    }
    
    
    public function lihat_pinjaman($id) {
        $data = \App\Models\Loan::findorFail($id);
        $customer = \App\Models\Customer::findorFail($data->customer_id_pinjaman);
        $product = \App\Models\Product::findorFail($data->product_id);
        $HTML = '';
        $HTML .= '<table class="table table-bordered table-striped">';
        $HTML .= '<tr>';
        $HTML .= '<th width="50%">Nama Lengkap </th>';
        $HTML .= '<td width="50%">'.$customer->nama.'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>Alamat </th>';
        $HTML .= '<td>'.$customer->alamat.'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>NIP </th>';
        $HTML .= '<td>'.$customer->nip.'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>Umur </th>';
        $HTML .= '<td>'.$data->umur.'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>Tanggal Pensiun </th>';
        $HTML .= '<td>'.date('d-m-Y', strtotime($data->tanggal_pensiun)).'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>Tanggal Masuk Kerja </th>';
        $HTML .= '<td>'.date('d-m-Y', strtotime($data->tanggal_masuk_kerja)).'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>Telepon </th>';
        $HTML .= '<td>'.$data->telepon.'</td>';
        $HTML .= '</tr>';
        $HTML .= '<tr>';
        $HTML .= '<th>No Rekening </th>';
        $HTML .= '<td>'.$data->no_rekening.'</td>';
        $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Gaji Pokok </th>';
        // $HTML .= '<td>Rp. '.number_format($data->gaji_pokok).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Tunjangan Posisi </th>';
        // $HTML .= '<td>Rp. '.number_format($data->tunjangan_posisi).'</td>';
        // $HTML .= '</tr>'; 
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Tunjangan Manajemen </th>';
        // $HTML .= '<td>Rp. '.number_format($data->tunjangan_manajemen).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Tunjangan Daerah </th>';
        // $HTML .= '<td>Rp. '.number_format($data->tunjangan_daerah).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Shift Premium </th>';
        // $HTML .= '<td>Rp. '.number_format($data->shift_premium).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Tunjangan Lain </th>';
        // $HTML .= '<td>Rp. '.number_format($data->tunjangan_lain).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Total Tunjangan </th>';
        // $HTML .= '<td>Rp. '.number_format($data->total_tunjangan).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Pajak Penghasilan </th>';
        // $HTML .= '<td>Rp. '.number_format($data->pajak_penghasilan).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Iuran Pensiun </th>';
        // $HTML .= '<td>Rp. '.number_format($data->iuran_pensiun).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Jamsostek </th>';
        // $HTML .= '<td>Rp. '.number_format($data->jamsostek).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Potongan KSSAS </th>';
        // $HTML .= '<td>Rp. '.number_format($data->potongan_kssas).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Potongan Selain KSSAS </th>';
        // $HTML .= '<td>Rp. '.number_format($data->potongan_selain_kssas).'</td>';
        // $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Total Potongan </th>';
        // $HTML .= '<td>Rp. '.number_format($data->total_potongan).'</td>';
        // $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Produk </th>';
        $HTML .= '<td>'.$product->product_name.'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Nilai Pengajuan </th>';
        $HTML .= '<td>Rp. '.number_format($data->nilai_pengajuan).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Angsuran Pokok </th>';
        $HTML .= '<td>Rp. '.number_format($data->angsuran_pokok).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Periode </th>';
        $HTML .= '<td>'.$data->periode.' bulan</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Total Harga </th>';
        $HTML .= '<td>Rp. '.number_format($data->total_harga).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>DP </th>';
        $HTML .= '<td>Rp. '.number_format($data->dp).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Sisa Dibayar </th>';
        $HTML .= '<td>Rp. '.number_format($data->sisa_dibayar).'</td>';
        $HTML .= '</tr>';
        
        
        
        $HTML .= '<tr>';
        $HTML .= '<th>Angsuran Jasa </th>';
        $HTML .= '<td>Rp. '.number_format($data->angsuran_jasa).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Potongan Baru </th>';
        $HTML .= '<td>Rp. '.number_format($data->potongan_baru).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Pembiayaan Lama </th>';
        $HTML .= '<td>Rp. '.number_format($data->pembiayaan_lama).'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Persentase </th>';
        $HTML .= '<td>'.$data->persentase.'%</td>';
        $HTML .= '</tr>';
        
        // $HTML .= '<tr>';
        // $HTML .= '<th>Saldo Gaji Netto </th>';
        // $HTML .= '<td>Rp. '.number_format($data->saldo_gaji_netto).'</td>';
        // $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Foto Pendukung </th>';
        $HTML .= '<td></td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th colspan="2"><div class="row">';
        if($data->image1 == null || $data->image1 == '') {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/noimage.png').'"></div>';    
        } else {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/pinjaman/'.$data->image1).'"></div>';
        }
        
        if($data->image2 == null || $data->image2 == '') {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/noimage.png').'"></div>';    
        } else {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/pinjaman/'.$data->image2).'"></div>';
        }
        
        if($data->image3 == null || $data->image3 == '') {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/noimage.png').'"></div>';    
        } else {
            $HTML .= '<div class="col-md-4 col-sm-12"><img class="image-display-pinjaman" src="'.asset('template/frontend/images/pinjaman/'.$data->image3).'"></div>';
        }
            
        $HTML .= '</div></th>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Keterangan </th>';
        $HTML .= '<td>'.$data->keterangan.'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Komentar </th>';
        $HTML .= '<td>'.$data->komentar.'</td>';
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Status </th>';
        
        if($data->status_loan == 1) {
            $HTML .= '<td><center style="color:red;"><span class="btn-action">diajukan</span></center></td>';    
        }
        else if($data->status_loan == 2) {
            $HTML .= '<td><center style="color:blue;"><span class="btn-action">diproses</span></center></td>';    
        }
        else if($data->status_loan == 3) {
            $HTML .= '<td><center style="color:green;"><span class="btn-action">selesai</span></center></td>';    
        }
        
        $HTML .= '</tr>';
        
        $HTML .= '<tr>';
        $HTML .= '<th>Tanggal Dibuat </th>';
        $HTML .= '<td>'.date('d-m-Y', strtotime($data->created_at)).'</td>';
        $HTML .= '</tr>';
        
        
        $HTML .= '</table>';
        
        return $HTML;
    }
    
    
    
    
    public function table_saldo_pinjaman(){
        $id = Session::get('session_id_frontend');
        $data = \App\Models\Loan::where('customer_id_pinjaman', $id)->where('status_loan', 3)->get();
        return Datatables::of($data)
        
        ->addColumn('sudah_bayar', function($data){
            $sudah = \App\Models\Angsuran::where('pinjaman_id', $data->id)->sum('jumlah_dibayar');
            return '<div style="text-align:right;">'.number_format($sudah).'</div>';
        })
        ->addColumn('sisa', function($data){
            $sudah = \App\Models\Angsuran::where('pinjaman_id', $data->id)->sum('jumlah_dibayar');
            $sisa = $data->sisa_dibayar - $sudah;
            return '<div style="text-align:right;">'.number_format($sisa).'</div>';
        })
        ->addColumn('action', function($data) {
            if($data->status_loan != 3 ) {
                return '';
            } else {
                 return '<center><div class="btn-group">
						<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							more
						</button>
						<div class="dropdown-menu" style="">
							<a onclick="lihat_pinjaman('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Lihat Detail</a>
							<a onclick="lihat_history('.$data->id.')" class="dropdown-item" href="javascript:void(0);">History Transaksi</a>
						</div>
						</div></center>';
            }
           
        })
        ->addColumn('product_id', function($data){
            
            $produk = \App\Models\Product::findorFail($data->product_id);
            return $produk->product_name;
        })
        ->addColumn('customer_id_pinjaman', function($data){
            
            $customer = \App\Models\Customer::findorFail($data->customer_id_pinjaman);
            return $customer->nama;
        })
        ->addColumn('created_at', function($data){
            return '<center>'.date('d-m-Y', strtotime($data->created_at)).'</center>';
        })
        ->addColumn('nilai_pengajuan', function($data){
            return '<div style="text-align:right";>'.number_format($data->nilai_pengajuan).'</div>';
        })
        ->addColumn('dp', function($data){
            return '<div style="text-align:right";>'.number_format($data->dp).'</div>';
        })
       
        ->addColumn('sisa_dibayar', function($data){
            return '<div style="text-align:right";>'.number_format($data->sisa_dibayar).'</div>';
        })
        ->addColumn('angsuran_pokok', function($data){
            return '<div style="text-align:right";>'.number_format($data->angsuran_pokok).'</div>';
        })
        ->addColumn('total_harga', function($data){
            return '<div style="text-align:right";>'.number_format($data->total_harga).'</div>';
        })
        ->rawColumns(['sudah_bayar', 'sisa', 'action', 'customer_id_pinjaman','product_id','created_at','nilai_pengajuan','dp', 'sisa_dibayar','angsuran_pokok','total_harga'])->make(true);
    }
    
    
    public function cek_saldo_pinjaman($id) {
        $data = \App\Models\Angsuran::where('pinjaman_id', $id)->orderBy('cicilan_ke', 'asc')->get();
        $cust = \App\Models\Customer::findorFail($data[0]->customer_id);
        
        $HTML = '';
        $HTML .= '<table class="table table-bordered table-striped ctable" id="table-angsuran">';
        $HTML .= '<thead>';
        $HTML .= '<tr>';
        
        $HTML .= '<th>#</th>';
        $HTML .= '<th>Nama</th>';
        $HTML .= '<th>ID</th>';
        $HTML .= '<th>Jumlah</th>';
        $HTML .= '<th>Harga KSSAS</th>';
        $HTML .= '<th>DP</th>';
        $HTML .= '<th>Harus Dibayar</th>';
        $HTML .= '<th>Term</th>';
        $HTML .= '<th>Cicilan</th>';
        $HTML .= '<th>Dibayar</th>';
        $HTML .= '<th>SALDO</th>';
        $HTML .= '<th>Ke</th>';
        $HTML .= '<th>Tgl Bayar</th>';
        $HTML .= '<th>Keterangan</th>';
        $HTML .= '</tr>';
        $HTML .= '</thead>';
        $HTML .= '<tbody>';
        $nomor=0;
        
        $harus_dibayar = $data[0]->harus_dibayar;
        foreach($data as $d) {
            $nomor++;
            $harus_dibayar = $harus_dibayar - $d->jumlah_dibayar; 
            
            $HTML .= '<tr>';
            $HTML .= '<td>'.$nomor.'</td>';
            
            $HTML .= '<td>'.$cust->nama.'</td>';
            $HTML .= '<td>'.$d->pinjaman_id.'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->jumlah_pinjaman).'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->harga_kssas).'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->dp).'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->harus_dibayar).'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->periode).'</td>';
            $HTML .= '<td style="text-align:right;">'.number_format($d->cicilan).'</td>';
            $HTML .= '<td style="text-align:right;"><strong>'.number_format($d->jumlah_dibayar).'</strong></td>';
            $HTML .= '<td style="text-align:right;color:red;"><strong>'.number_format($harus_dibayar).'</strong></td>';
            $HTML .= '<td style="text-align:right;">'.$d->cicilan_ke.'</td>';
            $HTML .= '<td style="text-align:center;">'.date('d-m-Y', strtotime($d->tanggal_pembayaran)).'</td>';
            $HTML .= '<td>'.$d->keterangan.'</td>';
            $HTML .= '</tr>';
        }
        $HTML .= '</tbody>';
        $HTML .= '</table>';
        return $HTML;
    }
    
    
    public function lupaPassword() {
        $view = 'lupa';
        $setting = Setting::findorFail(1);
        return view('frontend.lupa_password', compact('view', 'setting'));
    }
    
    
    public function resetPassword(Request $request) {
        $input = $request->all();
        $email = $input['email_anda'];
        $cek = Customer::where('email', $email)->count();
        if($cek == 1) {
            $password = $this->random_digits(8); 
            $cust = Customer::where('email', $email)->first();
            $cust->password = SHA1($password);
            $cust->save();
            
            $details = [
                'title' => 'Reset Password',
                'body' => 'Terima Kasih Karena Telah Mempercayai Kami, Password Baru Anda adalah: '.$password,
                'pengirim' => 'KSSAS Customer Center'
            ];
            
            \Mail::to($email)->send(new LupaEmail($details));
            
            Session::flash('sukses','Password Baru anda telah terkirim ke email anda.');
		    return redirect('/lupa_password');    
        
            
        } else {
            Session::flash('gagal','Email Tidak Terdaftar');
		    return redirect('/lupa_password');    
        }
        
    }
    
    
    
    public function table_pembayaran(){
        $id = Session::get('session_id_frontend');
        $data = DB::table('user_payments')->where('userid', $id)->get();
        
        return Datatables::of($data)
            ->addColumn('image', function($data){
                return '<a href="'.asset('template/frontend/files/bukti_transfer/'.$data->image).'" target="_blank"><img class="bukti-img" src="'.asset('template/frontend/files/bukti_transfer/'.$data->image).'"></a>';
            })
            
            ->addColumn('amount', function($data){
                return number_format($data->amount);
            })
            ->addColumn('pembiayaan', function($data){
                if($data->pembiayaan < 0 ) {
                    return 'Simpanan Wajib';
                } else {
                    $loan = DB::table('loans')->where('id', $data->pembiayaan)->first();
                    return 'Pembiayaan Rp. '.number_format($loan->total_harga);
                }
            })
            ->addColumn('type', function($data){
                if($data->type == 1) {
                    return 'Pembayaran Simpanan Wajib';    
                } else {
                    return 'Pembayaran Pembiayaan';
                }
                
            })
            ->addColumn('tanggal', function($data){
                return date('d-m-Y', strtotime($data->tanggal));
            })
            ->addColumn('action', function($data) {
                return '<center><div class="btn-group">
							<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								more
							</button>
							<div class="dropdown-menu" style="">
								<a onclick="hapusPembayaran('.$data->id.')" class="dropdown-item" href="javascript:void(0);">Delete</a>
							</div>
						</div></center>';
            })
            ->rawColumns(['action','amount','tanggal','image','type','pembiayaan'])
            ->make(true);
    }
    
    
    public function get_transaction_list($type) {
        $id = Session::get('session_id_frontend');
        
        if($type == 1) {
            $data = [];
        } else {
            $data = DB::table('loans')
                ->where('customer_id_pinjaman', $id)
                ->where('status_loan', 3)
                ->get();
        }     
        
        return $data;
        
    }
    
    
    public function payment_with_type(Request $request) {
        $input = $request->all();
        $id = Session::get('session_id_frontend');
        
        $input['payment_image'] = null;

        if($request->hasFile('payment_image')){
            $input['payment_image'] = Str::slug(uniqid(), '-').'.'.$request->payment_image->getClientOriginalExtension();
            $request->payment_image->move(public_path('/template/frontend/files/bukti_transfer/'), $input['payment_image']);
        }
        
        $data_insert = [
            "userid" => $id,
            "description" => $input['payment_description'],
            "type" => $input['payment_type'],
            "pembiayaan" => $input['payment_transaction_list'],
            "amount" => $input['payment_amount'],
            "tanggal" => date('Y-m-d H:i:s'),
            "image" => $input['payment_image'],
            "payment_status" => 0
            
        ];
        
        DB::table('user_payments')->insert($data_insert);
        return response()->json([
            "success" => true
        ]);
    }

    
    public function pembayaran_delete(Request $request) {
        $input = $request->all();
        return DB::table('user_payments')->where('id', $input['id'])->delete();
        
    } 
}

<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Setting;
use App\Models\Saving;
use App\Models\Loan;
use App\Models\Jabatan;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MembershipController extends Controller
{
    public function apiMembership() {
        $data = Customer::all();
        return DataTables::of($data)
            ->addColumn('is_active', function($data){
                if($data->is_active == 1) {
                    return '<span class="badge bg-green">active</span>';
                } else {
                    return '<span class="badge bg-red">not active</span>';
                }
            })
            ->addColumn('file_image', function($data){
                if($data->file_image == null) {
                    return '<img class="img-customer" src="'.asset('template/frontend/images').'/image_placeholder.png">';
                } else {
                    return '<img class="img-customer" src="'.asset('template/frontend/images/customer').'/'.$data->file_image.'">';
                }
                
            })
            ->addColumn('action', function($data){
                if($data->is_active == 1) {
                    return '<center><a title="Edit" onclick="editForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'.
                    '<br><a title="Hapus" onclick="deleteData('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>'.
                    
                    '<br><a href="'.url('membership').'/'.$data->id.'" title="Detail" style="width:25px;margin-bottom:3px;" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-th-list"></i></a>'.
                    
                    '<br><a title="Non aktifkan" onclick="displayDisactivate('. $data->id.')" style="width:25px;" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-floppy-remove"></i></a></center>';
                    
                } else {
                    return '<center><a title="Edit" onclick="editForm('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'.
                    '<br><a title="Hapus" onclick="deleteData('. $data->id.')" style="width:25px;margin-bottom:3px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>'.
                    
                    '<br><a href="'.url('membership').'/'.$data->id.'" title="Detail" style="width:25px;margin-bottom:3px;" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-th-list"></i></a>'.
                    
                    '<br><a title="Aktifkan" onclick="displayActivate('. $data->id.')" style="width:25px;" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-floppy-saved"></i></a></center>';
                }
                
                
                
               
                
                
            })->rawColumns(['file_image','is_active','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->daftar_anggota != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-membership';
        $setting = Setting::findorFail(1);
        $jabatan = Jabatan::all();
        return view('backend.membership', compact('view','setting','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['gambar'] = null;
        $unik = uniqid();
        
        if($request->hasFile('gambar')){
            $input['gambar'] = Str::slug($unik, '-').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('/template/frontend/images/slider'), $input['gambar']);
        }

        Slider::create($input);

        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = 'backoffice-membership';
        $setting = Setting::findorFail(1);
        $member = Customer::findorFail($id);
        $saving = Saving::where('customer_id', $id)->get();
        $loan = Loan::where('customer_id_pinjaman', $id)->get();
        
        return view('backend.membership_detail', compact('view','setting','member','saving','loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Customer::findorFail($id);
        $paths = public_path('/template/frontend/images/customer/'.$data->file_image);
        $path = public_path('/template/frontend/images/customer');
        $input = $request->all();
        $unik = uniqid();
        
        $input['file_image'] = $data->file_image;

        if($request->hasFile('file_image')){
            if($data->file_image != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['file_image'] = Str::slug($unik, '-').'.'.$request->file_image->getClientOriginalExtension();
            $request->file_image->move($path, $input['file_image']);
        }

        $data->update($input);
        
        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findorFail($id);
        $paths = public_path('/template/frontend/images/customer/'.$data->file_image);
        if($data->file_image != NULL && file_exists($paths)){
            unlink($paths);
        }

        Customer::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function registerActivate(Request $request) {
        $input = $request->all();
        $cust = Customer::findorFail($input['id']);
        $cust->is_active = 1;
        $cust->simpanan_pokok = 0;
        $cust->simpanan_wajib = 0;
        $cust->simpanan_sukarela = 0;
        $cust->save();
        return $cust;
    }
    
    
    public function registerUnactivate(Request $request) {
        $input = $request->all();
        $cust = Customer::findorFail($input['id']);
        $cust->is_active = 0;
        $cust->save();
        return $cust;
    } 
    
    
    public function uploadAnggota()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->daftar_anggota != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-upload-anggota';
        $setting = Setting::findorFail(1);
        $upload = DB::table('customers')->get();
        return view('backend.upload_anggota', compact('view','setting', 'upload'));
    }
    
    
    public function importDataAnggota(Request $request) {
        try {
            // $file = $request->file('file');
            // $fileContents = file($file->getPathname());
            // foreach ($fileContents as $line) {
            //     $data = str_getcsv($line);
                
                
            //     $insert = [
            //       "nama" => $data[1],
            //       "nip" => $data[2],
            //       "fungsi" => $data[3],
            //       "jenis_kelamin" => $data[4],
            //       "telepon" => $data[5],
            //       "email" => $data[6],
            //       "alamat" => $data[7],
            //       "istri" => $data[8],
            //       "password" => SHA1($data[10]),
            //       "tempat_lahir" => $data[11],
            //       "tanggal_lahir" => date('Y-m-d', strtotime($data[12])),
            //       "nama_ibu" => $data[13],
            //       "jabatan" => $data[14],
            //       "lama_pemotongan" => $data[16],
            //       "jumlah_potongan" => $data[17],
            //       "mulai_berlaku" => $data[18],
            //       "tahun" => $data[19],
            //       "is_active" => $data[20],
            //       "simpanan_pokok" => $data[21],
            //       "simpanan_wajib" => $data[22],
            //       "simpanan_sukarela" => $data[23],
            //       "created_at" => date("Y-m-d H:i:s"),
            //       "updated_at" => date("Y-m-d H:i:s"),
            //     ];
                
            //     DB::table('customers')->insert($insert);
                
            // }

            Excel::import(new CustomerImport, $request->file);
            Session::flash('sukses','Excel file Sukses Diupload...');
		    return redirect('upload_anggota');
        } catch(\Exception $e) {
            Session::flash('gagal',$e->getMessage());
		    return redirect('upload_anggota');
        }
        
    }
    
    public function register_user_download() {
        $view = 'register-user-download';
        $setting = Setting::findorFail(1);
        return view('backend.user_download', compact('view','setting'));
    }
    
    public function upload_form_download(Request $request) {
        $data = Setting::findorFail(1);
        $paths = public_path('/template/frontend/files/'.$data->form_pendaftaran_baru);
        $path = public_path('/template/frontend/files');
        $input = $request->all();
        $unik = uniqid();
        
        $input['image'] = $data->form_pendaftaran_baru;

        if($request->hasFile('image')){
            if($data->image != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['image'] = Str::slug($unik, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move($path, $input['image']);
        }

        $data->form_pendaftaran_baru = $input['image'];
        $data->save();
        
        Session::flash('sukses','Sukses Diupload...');
		return redirect('register_user_download');
        
    }
    
    
    public function register_user_upload() {
        $view = 'register-user-upload';
        $setting = Setting::findorFail(1);
        $data = DB::table('form_pendaftaran_anggota')->get();
        return view('backend.user_upload', compact('view', 'setting', 'data'));
    }
    
    public function form_upload_delete(Request $request) {
        $input = $request->all();
       
        $data =  DB::table('form_pendaftaran_anggota')->where('id', $input['id'])->delete();
        return $data;
    }
    
    public function form_upload_update(Request $request) {
        $input = $request->all();
       
        $data =  DB::table('form_pendaftaran_anggota')->where('id', $input['id'])->update(['status'=> 1]);
        return $data;
    }
}

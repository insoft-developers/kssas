<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function apiLevel() {
        $data = Jabatan::all();
        return Datatables::of($data)
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="editAccess('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-cog"></i> Setting</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->user_level != 1) {
            return Redirect('/backoffice');
        }
        $view = 'backoffice-level';
        $setting = Setting::findorFail(1);
        return view('backend.level', compact('view','setting'));
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
        Jabatan::create($input);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jabatan::findorFail($id);
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
        $data = Jabatan::findorFail($id);
        $input = $request->all();
        
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
        Jabatan::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function settingAkses($id) {
        $data = Jabatan::findorFail($id);
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="col-md-3">';
        $html .= '<div class="panel panel-success">';
        $html .= '<div class="panel-heading"><h4>Dashboard</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>Slider</label><select class="form-control dashboard" id="slider" name="slider">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        $html .= '<div class="form-group"><label>Topik Utama</label><select class="form-control dashboard" id="topik_utama" name="topik_utama">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Keuntungan Anggota</label><select class="form-control dashboard" id="keuntungan_anggota" name="keuntungan_anggota">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Staff & Pengurus</label><select class="form-control dashboard" id="staff_pengurus" name="staff_pengurus">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Mitra</label><select class="form-control dashboard" id="mitra" name="mitra">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        $html .= '<div class="panel panel-success">';
        $html .= '<div class="panel-heading"><h4>Setting</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>General Setting</label><select class="form-control setting" id="general_setting" name="general_setting">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
       
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        
        
        $html .= '</div>';
        // col-md-3       
        // ============================================================================
        
        $html .= '<div class="col-md-3">';
        $html .= '<div class="panel panel-danger">';
        $html .= '<div class="panel-heading"><h4>Tentang Kami</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>About</label><select class="form-control tentang" id="about" name="about">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Video</label><select class="form-control tentang" id="video" name="video">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>RAT</label><select class="form-control tentang" id="rat" name="rat">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>RAT GALLERY</label><select class="form-control tentang" id="rat_gallery" name="rat_gallery">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Legal</label><select class="form-control tentang" id="legal" name="legal">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Legal FAQ</label><select class="form-control tentang" id="legal_faq" name="legal_faq">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        $html .= '</div>';
        // col-md-3       
        
        // ============================================================================
        
        $html .= '<div class="col-md-3">';
        $html .= '<div class="panel panel-warning">';
        $html .= '<div class="panel-heading"><h4>Produk</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>Produk</label><select class="form-control produk" id="produk" name="produk">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Setting Pembiayaan</label><select class="form-control produk" id="setting_pembiayaan" name="setting_pembiayaan">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
       
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        $html .= '<div class="panel panel-warning">';
        $html .= '<div class="panel-heading"><h4>Berita</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>Produk</label><select class="form-control berita" id="berita" name="berita">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
       
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        $html .= '<div class="panel panel-warning">';
        $html .= '<div class="panel-heading"><h4>FAQ</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>FAQ</label><select class="form-control faq" id="faq" name="faq">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
       
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        $html .= '</div>';
        // col-md-3       
        
        // ============================================================================
        
        $html .= '<div class="col-md-3">';
        
        
        $html .= '<div class="panel panel-info">';
        $html .= '<div class="panel-heading"><h4>Keanggotaan</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>Daftar Anggota</label><select class="form-control keanggotaan" id="daftar_anggota" name="daftar_anggota">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Simpanan</label><select class="form-control keanggotaan" id="simpanan" name="simpanan">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Penarikan</label><select class="form-control keanggotaan" id="penarikan" name="penarikan">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>Pembiayaan</label><select class="form-control keanggotaan" id="pembiayaan" name="pembiayaan">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
       
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        $html .= '<div class="panel panel-info">';
        $html .= '<div class="panel-heading"><h4>User Management</h4></div>';
        
        $html .= '<div class="panel-body">';
        
        $html .= '<div class="form-group"><label>User List</label><select class="form-control user" id="user_list" name="user_list">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
        $html .= '<div class="form-group"><label>User Level</label><select class="form-control user" id="user_level" name="user_level">
        <option value="">Tidak</option>
        <option value="1">Ya</option>
        </select></div>';
        
      
        
        $html .= '</div>';
        // panel body
        $html .= '</div>';
        // panel
        
        
        
        
        $html .= '</div>';
        // col-md-3       
        
        // ============================================================================
        
        
        
        $html .= '</div>';
        // row
       
        return $html;
    }
    
    
    public function saveAccess(Request $request) {
        $input = $request->all();
        $d = Jabatan::findorFail($input['level_id']);
        $d->slider = $input['slider'];
        $d->topik_utama = $input['topik_utama'];
        $d->keuntungan_anggota = $input['keuntungan_anggota'];
        $d->staff_pengurus = $input['staff_pengurus'];
        $d->mitra = $input['mitra'];
        $d->about = $input['about'];
        $d->video = $input['video'];
        $d->rat = $input['rat'];
        $d->rat_gallery = $input['rat_gallery'];
        $d->legal = $input['legal'];
        $d->legal_faq = $input['legal_faq'];
        $d->produk = $input['produk'];
        $d->setting_pembiayaan = $input['setting_pembiayaan'];
        $d->berita = $input['berita'];
        $d->daftar_anggota = $input['daftar_anggota'];
        $d->simpanan = $input['simpanan'];
        $d->penarikan = $input['penarikan'];
        $d->pembiayaan = $input['pembiayaan'];
        $d->faq = $input['faq'];
        $d->user_list = $input['user_list'];
        $d->user_level = $input['user_level'];
        $d->general_setting = $input['general_setting'];
        $d->save();
        return $d;    
        
        
    }
    
    
    public function setAcessValue($id) {
        $data = Jabatan::findorFail($id);
        return $data;
    }
    
    
    
}

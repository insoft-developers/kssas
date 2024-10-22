<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function apiBerita() {
        $data = Berita::all();
        return Datatables::of($data)
            ->addColumn('is_popular', function($data){
                if($data->is_popular == 1) {
                    return '<center><span class="badge bg-green">Yes</span></center>';
                } else {
                    return '<center><span class="badge bg-red">No</span></center>';
                }
            })
            ->addColumn('tanggal', function($data){
                return '<center>'.date('d-m-Y', strtotime($data->tanggal)).'</center>';
            })
            ->addColumn('isi', function($data){
                return substr(strip_tags($data->isi), 0, 180).'...';
            })
            ->addColumn('image', function($data){
                return '<img class="img-master-slider" src="'.asset('template/frontend/images/berita/post').'/'.$data->image.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:40px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:40px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a></center>';
            })->rawColumns(['image','is_popular','isi','tanggal','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->berita != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-berita';
        $setting = Setting::findorFail(1);
        return view('backend.berita', compact('view','setting'));
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
        $input['image'] = null;
        $input['tanggal'] = date('Y-m-d');
        $unik = uniqid();
        
        
        if($request->hasFile('image')){
            $input['image'] = Str::slug($unik, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/template/frontend/images/berita/post'), $input['image']);
        }

        Berita::create($input);

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
        $data = Berita::findorFail($id);
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
        $data = Berita::findorFail($id);
        $paths = public_path('/template/frontend/images/berita/post/'.$data->image);
        $path = public_path('/template/frontend/images/berita/post');
        $input = $request->all();
        $unik = uniqid();
        
        $input['image'] = $data->image;

        if($request->hasFile('image')){
            if($data->image != NULL && file_exists($paths)){
                unlink($paths);
            }
            $input['image'] = Str::slug($unik, '-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move($path, $input['image']);
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
        $data = Berita::findorFail($id);
        $paths = public_path('/template/frontend/images/berita/post/'.$data->image);
        if($data->image != NULL && file_exists($paths)){
            unlink($paths);
        }

        Berita::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

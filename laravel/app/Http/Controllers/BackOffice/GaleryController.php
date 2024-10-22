<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RatGallery;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class GaleryController extends Controller
{
    
    public function apiGalery() {
        $data = RatGallery::all();
        return Datatables::of($data)
            ->addColumn('foto', function($data){
                return '<img class="img-mitra" src="'.asset('template/frontend/images/rat').'/'.$data->foto.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['foto','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->rat_gallery != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-galery';
        $setting = Setting::findorFail(1);
        return view('backend.galery', compact('view','setting'));
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
        $input['foto'] = null;
        $unik = uniqid();
        
        if($request->hasFile('foto')){
            $input['foto'] = Str::slug($unik, '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/template/frontend/images/rat'), $input['foto']);
        }

        RatGallery::create($input);

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
        $data = RatGallery::findorFail($id);
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
        $data  = RatGallery::findorFail($id);
        $paths = public_path('/template/frontend/images/rat/'.$data->foto);
        $path  = public_path('/template/frontend/images/rat');
        $input = $request->all();
        $unik  = uniqid();
        
        $input['foto'] = $data->foto;

        if($request->hasFile('foto')){
            if($data->foto != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['foto'] = Str::slug($unik, '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move($path, $input['foto']);
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
        $data = RatGallery::findorFail($id);
        $paths = public_path('/template/frontend/images/rat/'.$data->foto);
        if($data->foto != NULL && file_exists($paths)){
            unlink($paths);
        }

        RatGallery::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

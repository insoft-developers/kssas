<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class MitraController extends Controller
{
    public function apiMitra() {
        $data = Partner::all();
        return Datatables::of($data)
            ->addColumn('logo', function($data){
                return '<img class="img-mitra" src="'.asset('template/frontend/images/clients').'/'.$data->logo.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['logo','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->mitra != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-mitra';
        $setting = Setting::findorFail(1);
        $mitra = \App\Models\Partner::all();
        return view('backend.mitra', compact('view','setting','mitra'));
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
        $input['logo'] = null;
        $unik = uniqid();
        
        if($request->hasFile('logo')){
            $input['logo'] = Str::slug($unik, '-').'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('/template/frontend/images/clients'), $input['logo']);
        }

        Partner::create($input);

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
        $data = Partner::findorFail($id);
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
        $data  = Partner::findorFail($id);
        $paths = public_path('/template/frontend/images/clients/'.$data->logo);
        $path  = public_path('/template/frontend/images/clients');
        $input = $request->all();
        $unik  = uniqid();
        
        $input['logo'] = $data->logo;

        if($request->hasFile('logo')){
            if($data->logo != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['logo'] = Str::slug($unik, '-').'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move($path, $input['logo']);
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
        $data = Partner::findorFail($id);
        $paths = public_path('/template/frontend/images/clients/'.$data->logo);
        if($data->logo != NULL && file_exists($paths)){
            unlink($paths);
        }

        Partner::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

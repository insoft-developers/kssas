<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function apiSlider() {
        $data = Slider::all();
        return Datatables::of($data)
            ->addColumn('is_active', function($data){
                if($data->is_active == 1) {
                    return '<span class="badge bg-green">active</span>';
                } else {
                    return '<span class="badge bg-red">not active</span>';
                }
            })
            ->addColumn('gambar', function($data){
                return '<img class="img-master-slider" src="'.asset('template/frontend/images/slider').'/'.$data->gambar.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['gambar','is_active','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->slider != 1) {
            return Redirect('/backoffice');
        }
        $view = 'backoffice-slider';
        $setting = Setting::findorFail(1);
        return view('backend.slider', compact('view','setting'));
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
        $data = Slider::findorFail($id);
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
        $data = Slider::findorFail($id);
        $paths = public_path('/template/frontend/images/slider/'.$data->gambar);
        $path = public_path('/template/frontend/images/slider');
        $input = $request->all();
        $unik = uniqid();
        
        $input['gambar'] = $data->gambar;

        if($request->hasFile('gambar')){
            if($data->gambar != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['gambar'] = Str::slug($unik, '-').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move($path, $input['gambar']);
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
        $data = Slider::findorFail($id);
        $paths = public_path('/template/frontend/images/slider/'.$data->gambar);
        if($data->gambar != NULL && file_exists($paths)){
            unlink($paths);
        }

        Slider::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function apiVideo() {
        $data = Video::all();
        return Datatables::of($data)
            
            ->addColumn('is_home', function($data){
                if($data->is_home == 1) {
                    return '<center><span class="badge bg-green">Yes</span></center>';
                } else {
                    return '<center><span class="badge bg-red">No</span></center>';
                }
            })
            
            ->addColumn('is_active', function($data){
                if($data->is_active == 1) {
                    return '<center><span class="badge bg-green">active</span></center>';
                } else {
                    return '<center><span class="badge bg-red">not-active</span></center>';
                }
            })
            
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['is_home','is_active','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->video != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-video';
        $setting = Setting::findorFail(1);
        return view('backend.video', compact('view','setting'));
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
        Video::create($input);

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
        $data = Video::findorFail($id);
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
        $data = Video::findorFail($id);
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
        Video::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

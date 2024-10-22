<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function apiStaff() {
        $data = Staff::all();
        return Datatables::of($data)
            ->addColumn('staff_image', function($data){
                return '<img class="img-staff" src="'.asset('template/frontend/images/staff').'/'.$data->staff_image.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['staff_image','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->staff_pengurus != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-staff';
        $setting = Setting::findorFail(1);
        $staff = \App\Models\Staff::all();
        return view('backend.staff', compact('view','setting','staff'));
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
        $input['staff_image'] = null;
        $unik = uniqid();
        
        if($request->hasFile('staff_image')){
            $input['staff_image'] = Str::slug($unik, '-').'.'.$request->staff_image->getClientOriginalExtension();
            $request->staff_image->move(public_path('/template/frontend/images/staff'), $input['staff_image']);
        }

        Staff::create($input);

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
        $data = Staff::findorFail($id);
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
        $data  = Staff::findorFail($id);
        $paths = public_path('/template/frontend/images/staff/'.$data->staff_image);
        $path  = public_path('/template/frontend/images/staff');
        $input = $request->all();
        $unik  = uniqid();
        
        $input['staff_image'] = $data->staff_image;

        if($request->hasFile('staff_image')){
            if($data->staff_image != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['staff_image'] = Str::slug($unik, '-').'.'.$request->staff_image->getClientOriginalExtension();
            $request->staff_image->move($path, $input['staff_image']);
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
        $data = Staff::findorFail($id);
        $paths = public_path('/template/frontend/images/staff/'.$data->staff_image);
        if($data->staff_image != NULL && file_exists($paths)){
            unlink($paths);
        }

        Staff::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}

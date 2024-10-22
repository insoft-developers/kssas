<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Jabatan;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
class UserController extends Controller
{
    public function apiUser() {
        $data = User::all();
        return Datatables::of($data)
            ->addColumn('level', function($data){
                $jab = Jabatan::findorFail($data->level);
                return $jab->jabatan;
            })
            ->addColumn('profile_image', function($data){
                if($data->profile_image == null || $data->profile_image == '') {
                    return '<img class="img-customer" src="'.asset('template/frontend/images/image_placeholder.png').'">';
                }
                
                return '<img class="img-customer" src="'.asset('template/frontend/images/user').'/'.$data->profile_image.'">';
            })
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['profile_image','level','action'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->user_list != 1) {
            return Redirect('/backoffice');
        }
        
        
        $view = 'backoffice-user';
        $setting = Setting::findorFail(1);
        $jabatan = Jabatan::all();
        return view('backend.user', compact('view','setting','jabatan'));
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
        $input['profile_image'] = null;
        $unik = uniqid();
        
        
        if($request->hasFile('profile_image')){
            $input['profile_image'] = Str::slug($unik, '-').'.'.$request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('/template/frontend/images/user'), $input['profile_image']);
        }

        $input['password'] = bcrypt($input['password']);
        User::create($input);

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
        $data = User::findorFail($id);
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
        $data = User::findorFail($id);
        $paths = public_path('/template/frontend/images/user/'.$data->profile_image);
        $path = public_path('/template/frontend/images/user');
        $input = $request->all();
        $unik = uniqid();
        
        $input['profile_image'] = $data->profile_image;

        if($request->hasFile('profile_image')){
            if($data->profile_image != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['profile_image'] = Str::slug($unik, '-').'.'.$request->profile_image->getClientOriginalExtension();
            $request->profile_image->move($path, $input['profile_image']);
        }
        
        
        if(! empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input['password'] = $data->password;
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
        $data = User::findorFail($id);
        $paths = public_path('/template/frontend/images/user/'.$data->profile_image);
        if($data->profile_image != NULL && file_exists($paths)){
            unlink($paths);
        }

        User::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    public function myProfile() {
        $view = 'backoffice-profile';
        $setting = Setting::findorFail(1);
        $user = \App\Models\User::findorFail(Auth::user()->id);
        return view('backend.profile', compact('view','setting','user'));
    }
    
    
    public function updateProfile(Request $request) {
        
        try {
            $data = User::findorFail(Auth::user()->id);
            $paths = public_path('/template/frontend/images/user/'.$data->profile_image);
            $path = public_path('/template/frontend/images/user');
            
            $input = $request->all();
            $unik = uniqid();
            
            $input['profile_image'] = $data->profile_image;
    
            if($request->hasFile('profile_image')){
                if($data->profile_image != NULL && file_exists($paths)){
                    unlink($paths);
                }
    
                $input['profile_image'] = Str::slug($unik, '-').'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->move($path, $input['profile_image']);
            }
            
            if(! empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input['password'] = $data->password;
            }
    
            $data->update($input);
            Session::flash('sukses', 'Ubah Profil Sukses');
            return redirect('profile');
        }catch(\Exception $e) {
             Session::flash('gagal', $e->getMessage());
            return redirect('profile');
        }
        
        
        
        
    }
}

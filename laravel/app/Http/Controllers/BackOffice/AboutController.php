<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->about != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-about';
        $setting = Setting::findorFail(1);
        $about = About::findorFail(1);
        return view('backend.about', compact('view','setting','about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            $data = About::findorFail(1);
            $paths1 = public_path('/template/frontend/images/about/'.$data->visi_icon);
            $paths2 = public_path('/template/frontend/images/about/'.$data->misi_icon);
            $paths3 = public_path('/template/frontend/images/about/'.$data->tujuan_icon);
            $paths4 = public_path('/template/frontend/images/about/'.$data->about_header_image);
            
            $path = public_path('/template/frontend/images/about');
            
            $input = $request->all();
           
            $unik = uniqid();
            
            $input['visi_icon'] = $data->visi_icon;
            if($request->hasFile('visi_icon')){
                if($data->visi_icon != NULL && file_exists($paths1)){
                    unlink($paths1);
                }
    
                $input['visi_icon'] = Str::slug($unik, '1-').'.'.$request->visi_icon->getClientOriginalExtension();
                $request->visi_icon->move($path, $input['visi_icon']);
            }
            
            
            
            $input['misi_icon'] = $data->misi_icon;
            if($request->hasFile('misi_icon')){
                if($data->misi_icon != NULL && file_exists($paths2)){
                    unlink($paths2);
                }
    
                $input['misi_icon'] = Str::slug($unik, '2-').'.'.$request->misi_icon->getClientOriginalExtension();
                $request->misi_icon->move($path, $input['misi_icon']);
            }
            
            $input['tujuan_icon'] = $data->tujuan_icon;
            if($request->hasFile('tujuan_icon')){
                if($data->tujuan_icon != NULL && file_exists($paths3)){
                    unlink($paths3);
                }
    
                $input['tujuan_icon'] = Str::slug($unik, '3-').'.'.$request->tujuan_icon->getClientOriginalExtension();
                $request->tujuan_icon->move($path, $input['tujuan_icon']);
            }
            
            $input['about_header_image'] = $data->about_header_image;
            if($request->hasFile('about_header_image')){
                if($data->about_header_image != NULL && file_exists($paths3)){
                    unlink($paths3);
                }
    
                $input['about_header_image'] = Str::slug($unik, '4-').'.'.$request->about_header_image->getClientOriginalExtension();
                $request->about_header_image->move($path, $input['about_header_image']);
            }
            
    
            $data->update($input);
            Session::flash('sukses','Update About Berhasil');
		    return redirect('backabout');
        } catch(\Exception $e) {
            Session::flash('gagal', $e->getMessage());
		    return redirect('backabout');
        }
        
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
        $data = About::findorFail($id);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

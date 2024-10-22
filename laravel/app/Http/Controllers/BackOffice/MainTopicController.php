<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainTopic;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Auth;
class MainTopicController extends Controller
{
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->topik_utama != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-topic';
        $setting = Setting::findorFail(1);
        $topic = MainTopic::findorFail(1);
        return view('backend.topic', compact('view','setting','topic'));
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
            $data = MainTopic::findorFail(1);
            $paths1 = public_path('/template/frontend/images/topic/'.$data->gambar1);
            $paths2 = public_path('/template/frontend/images/topic/'.$data->gambar2);
            $paths3 = public_path('/template/frontend/images/topic/'.$data->gambar3);
            
            $path = public_path('/template/frontend/images/topic');
            
            $input = $request->all();
            $unik = uniqid();
            
            $input['gambar1'] = $data->gambar1;
            if($request->hasFile('gambar1')){
                if($data->gambar1 != NULL && file_exists($paths1)){
                    unlink($paths1);
                }
    
                $input['gambar1'] = Str::slug($unik, '1-').'.'.$request->gambar1->getClientOriginalExtension();
                $request->gambar1->move($path, $input['gambar1']);
            }
            
            $input['gambar2'] = $data->gambar2;
            if($request->hasFile('gambar2')){
                if($data->gambar2 != NULL && file_exists($paths2)){
                    unlink($paths2);
                }
    
                $input['gambar2'] = Str::slug($unik, '2-').'.'.$request->gambar2->getClientOriginalExtension();
                $request->gambar2->move($path, $input['gambar2']);
            }
            
            $input['gambar3'] = $data->gambar3;
            if($request->hasFile('gambar3')){
                if($data->gambar3 != NULL && file_exists($paths3)){
                    unlink($paths3);
                }
    
                $input['gambar3'] = Str::slug($unik, '3-').'.'.$request->gambar3->getClientOriginalExtension();
                $request->gambar3->move($path, $input['gambar3']);
            }
    
            $data->update($input);
            Session::flash('sukses','Update Topik Utama Berhasil');
		    return redirect('topic');
        } catch(\Exception $e) {
            Session::flash('gagal', $e->getMessage());
		    return redirect('topic');
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
        $data = MainTopic::findorFail(1);
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

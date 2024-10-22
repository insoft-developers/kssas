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
class SettingController extends Controller
{
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->general_setting != 1) {
            return Redirect('/backoffice');
        }
        $view = 'backoffice-setting';
        $setting = Setting::findorFail(1);
        return view('backend.setting', compact('view','setting'));
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
            $data = Setting::findorFail(1);
            $path_logo = public_path('/template/frontend/images/'.$data->logo);
            $path_footer_logo = public_path('/template/frontend/images/'.$data->footer_logo);
            $path_favicon = public_path('/template/frontend/images/'.$data->favicon);
            $path_product_header = public_path('/template/frontend/images/produk/'.$data->product_image_header);
            $path_berita_header = public_path('/template/frontend/images/berita/'.$data->berita_image_header);
            $path_faq_header = public_path('/template/frontend/images/faq/'.$data->faq_image_header);
            $path_contact_header = public_path('/template/frontend/images/contact/'.$data->contact_image_header);
            $path = public_path('/template/frontend/images');
            
            $input = $request->all();
           
            $unik = uniqid();
            
            $input['logo'] = $data->logo;
            if($request->hasFile('logo')){
                if($data->logo != NULL && file_exists($path_logo)){
                    unlink($path_logo);
                }
    
                $input['logo'] = Str::slug($unik, '1-').'.'.$request->logo->getClientOriginalExtension();
                $request->logo->move($path, $input['logo']);
            }
            
            $input['footer_logo'] = $data->footer_logo;
            if($request->hasFile('footer_logo')){
                if($data->footer_logo != NULL && file_exists($path_footer_logo)){
                    unlink($path_footer_logo);
                }
    
                $input['footer_logo'] = Str::slug($unik, '2-').'.'.$request->footer_logo->getClientOriginalExtension();
                $request->footer_logo->move($path, $input['footer_logo']);
            }
            
            $input['favicon'] = $data->favicon;
            if($request->hasFile('favicon')){
                if($data->favicon != NULL && file_exists($path_favicon)){
                    unlink($path_favicon);
                }
    
                $input['favicon'] = Str::slug($unik, '3-').'.'.$request->favicon->getClientOriginalExtension();
                $request->favicon->move($path, $input['favicon']);
            }
            
            $input['product_image_header'] = $data->product_image_header;
            if($request->hasFile('product_image_header')){
                if($data->product_image_header != NULL && file_exists($path_product_header)){
                    unlink($path_product_header);
                }
    
                $input['product_image_header'] = Str::slug($unik, '4-').'.'.$request->product_image_header->getClientOriginalExtension();
                $request->product_image_header->move($path.'/produk', $input['product_image_header']);
            }
            
            $input['berita_image_header'] = $data->berita_image_header;
            if($request->hasFile('berita_image_header')){
                if($data->berita_image_header != NULL && file_exists($path_berita_header)){
                    unlink($path_berita_header);
                }
    
                $input['berita_image_header'] = Str::slug($unik, '5-').'.'.$request->berita_image_header->getClientOriginalExtension();
                $request->berita_image_header->move($path.'/berita', $input['berita_image_header']);
            }
            
            $input['faq_image_header'] = $data->faq_image_header;
            if($request->hasFile('faq_image_header')){
                if($data->faq_image_header != NULL && file_exists($path_faq_header)){
                    unlink($path_faq_header);
                }
    
                $input['faq_image_header'] = Str::slug($unik, '6-').'.'.$request->faq_image_header->getClientOriginalExtension();
                $request->faq_image_header->move($path.'/faq', $input['faq_image_header']);
            }
            
            $input['contact_image_header'] = $data->contact_image_header;
            if($request->hasFile('contact_image_header')){
                if($data->contact_image_header != NULL && file_exists($path_contact_header)){
                    unlink($path_contact_header);
                }
    
                $input['contact_image_header'] = Str::slug($unik, '7-').'.'.$request->contact_image_header->getClientOriginalExtension();
                $request->contact_image_header->move($path.'/contact', $input['contact_image_header']);
            }
            
            $data->update($input);
            Session::flash('sukses','Update Setting Berhasil');
		    return redirect('setting');
        } catch(\Exception $e) {
            Session::flash('gagal', $e->getMessage());
		    return redirect('setting');
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
        $data = Setting::findorFail(1);
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

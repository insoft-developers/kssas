<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function apiProduk() {
        $data = Product::all();
        return Datatables::of($data)
            ->addColumn('product_image', function($data){
                return '<img class="img-master-slider" src="'.asset('template/frontend/images/produk').'/'.$data->product_image.'">';
            })
            ->addColumn('product_description', function($data){
                return $data->product_description;
            })
            
            ->addColumn('product_category', function($data){
                $cat = \App\Models\ProductCategory::findorFail($data->product_category);
                return $cat->category_name;
            })
            
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['product_category','product_image','product_description','action'])->make(true); 
    }
    
    
    public function index()
    {
        
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->produk != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-product';
        $setting = Setting::findorFail(1);
        $kategori = \App\Models\ProductCategory::all();
        return view('backend.product', compact('view','setting','kategori'));
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
        $input['product_image'] = null;
        $unik = uniqid();
        
        if($request->hasFile('product_image')){
            $input['product_image'] = Str::slug($unik, '-').'.'.$request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('/template/frontend/images/produk'), $input['product_image']);
        }

        Product::create($input);

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
        $data = Product::findorFail($id);
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
        $data = Product::findorFail($id);
        $paths = public_path('/template/frontend/images/produk/'.$data->product_image);
        $path = public_path('/template/frontend/images/produk');
        $input = $request->all();
        $unik = uniqid();
        
        $input['product_image'] = $data->product_image;

        if($request->hasFile('product_image')){
            if($data->product_image != NULL && file_exists($paths)){
                unlink($paths);
            }

            $input['product_image'] = Str::slug($unik, '-').'.'.$request->product_image->getClientOriginalExtension();
            $request->product_image->move($path, $input['product_image']);
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
        $data = Product::findorFail($id);
        $paths = public_path('/template/frontend/images/produk/'.$data->product_image);
        if($data->product_image != NULL && file_exists($paths)){
            unlink($paths);
        }

        Product::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}
